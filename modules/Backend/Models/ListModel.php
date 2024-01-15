<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class ListModel extends Model
{
    protected $table = 'list';
    public $incrementing = false;

    public $sortable = ['order'];
    protected $fillable = [
        'id',
        'listtype_id',
        'code',
        'name',
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
            case 'listtype_id':
                $query->where('listtype_id', $value);
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