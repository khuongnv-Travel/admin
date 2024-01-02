<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriesModel extends Model
{
    protected $table = 'categories';
    public $incrementing = false;

    public $sortable = ['order'];
    protected $fillable = [
        'id',
        'parent_id',
        'code',
        'name',
        'slug',
        'layout',
        'type',
        'icon',
        'images',
        'is_display_menu',
        'note',
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