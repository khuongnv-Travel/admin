<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    protected $table = 'blogs';
    public $incrementing = false;

    public $sortable = ['order'];
    protected $fillable = [
        'id',
        'categories_id',
        'title',
        'slug',
        'quotation',
        'author',
        'source',
        'date_create',
        'images',
        'images_note',
        'content',
        'blog_type',
        'current_status',
        'related_keywords',
        'is_comment',
        'is_hide_relate_blog',
        'view',
        'like',
        'rating',
        'order',
        'status',
        'created_at',
        'updated_at',
    ];

    public function filter($query, $param, $value)
    {
        switch($param){
            case 'id':
                $query->where('id', $value);
                return $query;
            case 'txt_search':
                $query->where(function($sql) use($value){
                    $sql->where('code', 'like', "%$value%")->orWhere('name', 'like', "%$value%");
                });
                return $query;
            default: return $query;
        }
    }
}