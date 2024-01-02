<?php

namespace Modules\Api\Repositories;

use Illuminate\Support\Facades\Hash;
use Modules\Api\Models\UsersModel;
use Modules\Core\BaseRepository;

class UserRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function model()
    {
        return UsersModel::class;
    }
    /**
     * Lưu thông tin
     * @param $data Dữ liệu truyền vào
     * @return array $sql
     */
    public function _update($data)
    {
        // dd($data);
        // if(isset($data['order']) && !empty($data['order'])){
        //     $this->updateOrder($data);
        // }
        if(isset($data['id']) && !empty($data['id'])){
            $sql             = $this->model->where('id', $data['id'])->first();
            $sql->updated_at = date('Y-m-d H:i:s');
        }else{
            $sql             = new $this->model;
            $sql->id         = (string)\Str::uuid();
            $sql->created_at = date('Y-m-d H:i:s');
        }
        $sql->name              = $data['name'] ?? null;
        $sql->username          = $data['username'] ?? null;
        $sql->email             = $data['email'] ?? null;
        $sql->email_verified_at = $data['email_verified_at'] ?? date('Y-m-d H:i:s');
        $sql->password          = isset($data['password']) ? Hash::make($data['password']) : ($sql->password ?? null);
        $sql->remember_token    = $data['remember_token'] ?? null;
        $sql->birthday          = $data['birthday'] ?? null;
        $sql->phone             = $data['phone'] ?? null;
        $sql->gender            = $data['gender'] ?? null;
        $sql->avatar            = $data['avatar'] ?? 'user-default.png';
        $sql->city              = $data['city'] ?? null;
        $sql->district          = $data['district'] ?? null;
        $sql->ward              = $data['ward'] ?? null;
        $sql->address           = $data['address'] ?? null;
        $sql->role              = $data['role'] ?? null;
        $sql->order             = $data['order'] ?? null;
        $sql->status            = isset($data['status']) && $data['status'] === 'on' ? 1 : 0;
        $sql->save();
        return $sql;
    }
}