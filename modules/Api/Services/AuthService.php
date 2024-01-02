<?php

namespace Modules\Api\Services;

use Exception;
use Illuminate\Support\Facades\Hash;
use Modules\Api\Repositories\UserRepository;
use Modules\Backend\Services\FileService;
use Modules\Core\BaseService;
use Psy\Exception\ThrowUpException;

class AuthService
{
    private $userService;
    private $fileService;

    public function __construct(UserService $userService, FileService $fileService)
    {
        $this->userService = $userService;
        $this->fileService = $fileService;
    }
    public function repository()
    {
        return UserRepository::class;
    }
    /**
     * Đăng ký
     * @return array
     */
    public function register($input)
    {
        if($this->userService->where('username', $input['username'])->exists()){
            return array('status' => false, 'message' => 'Tên đăng nhập đã tồn tại');
        }elseif($this->userService->where('email', $input['email'])->exists()){
            return array('status' => false, 'message' => 'Email đã tồn tại');
        }
        $data = $this->userService->_update($input);
        return $data;
    }
    /**
     * Đăng nhập
     * @return array
     */
    public function login($input): array
    {
        $users = $this->userService->where('email', $input['username'])->orWhere('username', $input['username'])->first();
        if(!empty($users)){
            if(Hash::check($input['password'], $users->password)){
                $data['users'] = $users;
                $data['users']['token'] = $users->createToken('Token of ' . $users->name)->plainTextToken;
                return array('status' => true, 'message' => 'Đăng nhập thành công.', 'data' => $data);
            }else{
                return array('status' => false, 'message' => 'Mật khẩu không đúng!');
            }
        }else{
            return array('status' => false, 'message' => 'Tên đăng nhập hoặc email không đúng!');
        }
    }
    /**
     * Đăng xuất
     * @return array
     */
    public function logout(): array
    {
        if(auth('sanctum')->user()){
            auth('sanctum')->user()->currentAccessToken()->delete();
        }
        auth()->guard('web')->logout();
        return array('status' => true, 'message' => 'Đăng xuất thành công.');
    }
    /**
     * Cập nhật ảnh đại diện
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function uploads($input): array
    {
        if($_FILES != [] && isset($_FILES['uploads'])){
            $data = $this->fileService->upload($_FILES);
            $this->userService->where('id', $input['id'])->update(['avatar' => $data[0]['url']]);
            return array('status' => true, 'message' => 'Tải ảnh lên thành công.', 'data' => $data[0] ?? $data);
        }else{
            return array('status' => false, 'message' => 'Tải ảnh lên thất bại!');
        }
    }
    /**
     * Cập nhật thông tin
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function update($input): array
    {
        $input['status'] = 'on';
        try{
            $data = $this->userService->_update($input);
            $data['token'] = $data->createToken('Token of ' . $data->name)->plainTextToken;
            return array('status' => true, 'message' => 'Cập nhật thành công!', 'data' => $data);
        } catch(Exception $e){
            throw new \ErrorException($e->getMessage());
        }
    }
    /**
     * Đổi mật khẩu
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function changepass($input): array
    {
        // dd($input);
        if(!isset($input['id']) || (isset($input['id']) && empty($input['id']))){
            return array('status' => false, 'message' => 'Không tồn tại đối tượng');
        }
        $users = $this->userService->where('id', $input['id'])->first();
        if(!empty($users)){
            if(password_verify($input['password'], $users->password)){
                $password = Hash::make($input['passnew']);
                $users->update(['password' => $password]);
                return array('status' => true, 'message' => 'Cập nhật mật khẩu thành công');
            }else{
                return array('status' => false, 'message' => 'Mật khẩu cũ không chính xác');
            }
        }else{
            return array('status' => false, 'message' => 'Không tồn tại đối tượng');
        }
    }
}