<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $primaryKey = 'id';
    protected $table = "users";
    protected $fillable = [
        'name',
        'no_hp',
        'email', 
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];
}
