<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $table = 'cars';
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
            default: return $query;
        }
    }
}