<?php

namespace Modules\Backend\Repositories;

use Modules\Backend\Models\CarModel;
use Modules\Core\BaseRepository;

class CarRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function model()
    {
        return CarModel::class;
    }
    /**
     * Lưu thông tin
     * @param $data Dữ liệu truyền vào
     * @return array $sql
     */
    public function _update($data)
    {
        if(isset($data['order']) && !empty($data['order'])){
            $this->updateOrder($data);
        }
        if(isset($data['id']) && !empty($data['id'])){
            $sql             = $this->model->where('id', $data['id'])->first();
            $sql->updated_at = date('Y-m-d H:i:s');
        }else{
            $sql             = new $this->model;
            $sql->id         = (string)\Str::uuid();
            $sql->created_at = date('Y-m-d H:i:s');
        }
        $sql->listtype_id = $data['listtype_id'] ?? null;
        $sql->code        = $data['code'] ?? null;
        $sql->name        = $data['name'] ?? null;
        $sql->images      = $data['images'] ?? ($sql->images ?? null);
        $sql->note        = $data['note'] ?? null;
        $sql->order       = $data['order'] ?? null;
        $sql->status      = isset($data['status']) && $data['status'] === 'on' ? 1 : 0;
        $sql->save();
        return $sql;
    }
    /**
     * Cập nhật STT
     * @param $data Dữ liệu truyền vào
     */
    public function updateOrder($data)
    {
        $query = $this->model->where('order', '>=', $data['order']);
        if(isset($data['id']) && !empty($data['id'])){
            $query = $query->where('id', '<>', $data['id']);
        }
        $query = $query->orderBy('order')->get();
        $i = $data['order'];
        foreach($query as $key => $value){
            $value->update(['order' => ++$i]);
        }
    }
}