<?php

namespace Modules\Backend\Repositories;

use Modules\Core\BaseRepository;
use Modules\Backend\Models\CategoriesModel;

class CategoriesRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function model()
    {
        return CategoriesModel::class;
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
        $sql->code            = strtoupper($data['code']) ?? null;
        $sql->name            = $data['name'] ?? null;
        $sql->slug            = $data['slug'] ?? null;
        $sql->layout          = $data['layout'] ?? null;
        $sql->type            = $data['type'] ?? null;
        $sql->icon            = $data['icon'] ?? null;
        $sql->images          = $data['images'] ?? ($sql->images ?? null);
        $sql->is_display_menu = isset($data['is_display_menu']) && $data['is_display_menu'] === 'on' ? 1 : 0;
        $sql->note            = $data['note'] ?? null;
        $sql->order           = $data['order'] ?? null;
        $sql->status          = isset($data['status']) && $data['status'] === 'on' ? 1 : 0;
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
            $categories = $this->model->where('id', $data['id'])->first();
            $query = $query->where('id', '<>', $categories->id);
        }
        $query = $query->orderBy('order')->get();
        $i = $data['order'];
        foreach($query as $key => $value){
            $value->update(['order' => ++$i]);
        }
    }
}