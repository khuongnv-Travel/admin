<?php

namespace Modules\Api\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UsersModel extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'users';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'username',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'birthday',
        'phone',
        'gender',
        'avatar',
        'city',
        'district',
        'ward',
        'address',
        'role',
        'order',
        'status',
        'created_at',
        'updated_at',
    ];
    
    protected $hidden = [
        'password',
    ];
    
}