<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class ApartmentModel extends Model
{
    protected $table = 'apartments';
    public $incrementing = false;

    public $sortable = ['order'];
    protected $fillable = [
        'id',
        'list_id',
        'code',
        'name',
        'slug',
        'images',
        'city',
        'district',
        'ward',
        'address',
        'content',
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