<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class showrooms extends Model
{
    protected $primaryKey = 'id';
    protected $table = "showrooms";
    protected $fillable = [
        'user_id',
        'name',
        'owner', 
        'brand',
        'purchase_date',
        'description',
        'image',
        'status',
        'created_at',
        'updated_at',
    ];
}
