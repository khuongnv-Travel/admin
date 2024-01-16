<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    protected $table = 'rooms';
    public $incrementing = false;

    public $sortable = ['order'];
    protected $fillable = [
        'id',
        'home_id',
        'code',
        'name',
        'slug',
        'images',
        'type',
        'quantity',
        'people',
        'price',
        'sale',
        'VAT',
        'data_json',
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