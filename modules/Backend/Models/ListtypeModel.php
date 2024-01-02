<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class ListtypeModel extends Model
{
    protected $table = 'listtype';
    public $incrementing = false;

    public $sortable = ['order'];
    protected $fillable = [
        'id',
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
            case 'txt_search':
                $query->where(function($sql) use($value){
                    $sql->where('code', 'like', "%$value%")->orWhere('name', 'like', "%$value%");
                });
                return $query;
            default: return $query;
        }
    }
}