<?php

namespace Modules\Backend\Repositories;

use Modules\Core\BaseRepository;
use Modules\Backend\Models\ListModel;

class ListRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function model()
    {
        return ListModel::class;
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
        $sql->listtype_id   = $data['listtype_id'] ?? null;
        $sql->listtype_code = $data['listtype_code'] ?? null;
        $sql->code          = strtoupper($data['code']) ?? null;
        $sql->name          = $data['name'] ?? null;
        $sql->note          = $data['note'] ?? null;
        $sql->order         = $data['order'] ?? null;
        $sql->status        = isset($data['status']) && $data['status'] === 'on' ? 1: 0;
        $sql->save();
        return $sql;
    }
    /**
     * Cập nhật STT
     * @param $data Dữ liệu truyền vào
     */
    public function updateOrder($data)
    {
        $query = $this->model->where('listtype_id', $data['listtype_id'])->where('order', '>=', $data['order']);
        if(isset($data['id']) && !empty($data['id'])){
            $list = $this->model->where('id', $data['id'])->first();
            $query = $query->where('id', '<>', $list->id);
        }
        $query = $query->orderBy('order')->get();
        $i = $data['order'];
        foreach($query as $key => $value){
            $value->update(['order' => ++$i]);
        }
    }
}