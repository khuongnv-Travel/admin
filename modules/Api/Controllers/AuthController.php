<?php

namespace Modules\Api\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Api\Services\AuthService;

class AuthController extends Controller
{
    private $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    /**
     * Đăng ký
     */
    public function register(Request $request)
    {
        $data = $this->authService->register($request->all());
        if(isset($data['status']) && $data['status'] === false){
            return response()->json(['status' => false, 'message' => $data['message']]);
        }
        return response()->json(['status' => true, 'data' => $data]);
    }
    /**
     * Đăng nhập
     */
    public function login(Request $request)
    {
        $data = $this->authService->login($request->all());
        return response()->json($data);
    }
    /**
     * Đăng nhập
     */
    public function logout(Request $request)
    {
        $data = $this->authService->logout($request->all());
        return response()->json(['status' => true, 'data' => $data]);
    }
    /**
     * Cập nhật ảnh đại diện
     */
    public function uploads(Request $request)
    {
        $data = $this->authService->uploads($request->all());
        return response()->json(['status' => true, 'data' => $data]);   
    }
    /**
     * Cập nhật thông tin
     */
    public function update(Request $request)
    {
        $data = $this->authService->update($request->all());
        return response()->json(['status' => true, 'data' => $data]);
    }
    /**
     * Đổi mật khẩu
     */
    public function changepass(Request $request)
    {
        $data = $this->authService->changepass($request->all());
        return response()->json($data);
    }
}