<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class DefaultModel extends Model
{
    protected $table = 'table';
    public $incrementing = false;

    public $sortable = ['order'];
    protected $fillable = [
        
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