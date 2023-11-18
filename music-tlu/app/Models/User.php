<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'user_id',
        'username',
        'password',
        'email',
        'role',
        'status'
    ];
    public $timestamps = false;

    use HasFactory;
}
