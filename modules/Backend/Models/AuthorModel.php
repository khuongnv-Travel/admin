<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class AuthorModel extends Model
{
    protected $table = 'authors';
    public $incrementing = false;

    public $sortable = ['order'];
    protected $fillable = [
        'id',
        'name',
        'slug',
        'birthday',
        'phone',
        'email',
        'address',
        'status',
        'order',
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