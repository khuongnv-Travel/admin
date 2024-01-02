<?php

namespace Modules\Api\Repositories;

use Modules\Api\Models\BlogModel;
use Modules\Core\BaseRepository;

class BlogsRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function model()
    {
        return BlogModel::class;
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
        $sql->categories_id       = $data['categories_id'] ?? null;
        $sql->title               = $data['title'] ?? null;
        $sql->slug                = $data['slug'] ?? null;
        $sql->quotation           = $data['quotation'] ?? null;
        $sql->author              = $data['author'] ?? null;
        $sql->source              = $data['source'] ?? null;
        $sql->date_create         = $data['date_create'] ?? null;
        $sql->images              = $data['images'] ?? ($sql->images ?? null);
        $sql->images_note         = $data['images_note'] ?? null;
        $sql->content             = $data['content'] ?? null;
        $sql->blog_type           = isset($data['blog_type']) ? trim(implode(',', $data['blog_type']), ',') : null;
        $sql->current_status      = $data['current_status'] ?? null;
        $sql->related_keywords    = $data['related_keywords'] ?? null;
        $sql->is_comment          = isset($data['is_comment']) && $data['is_comment'] === 'on' ? 1 : 0;
        $sql->is_hide_relate_blog = isset($data['is_hide_relate_blog']) && $data['is_hide_relate_blog'] === 'on' ? 1 : 0;
        $sql->view                = $data['view'] ?? null;
        $sql->like                = $data['like'] ?? null;
        $sql->rating              = $data['rating'] ?? null;
        $sql->order               = $data['order'] ?? null;
        $sql->status              = isset($data['status']) && $data['status'] === 'on' ? 1 : 0;
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
            $blogs = $this->model->where('id', $data['id'])->first();
            $query = $query->where('id', '<>', $blogs->id);
        }
        $query = $query->orderBy('order')->get();
        $i = $data['order'];
        foreach($query as $key => $value){
            $value->update(['order' => ++$i]);
        }
    }
}