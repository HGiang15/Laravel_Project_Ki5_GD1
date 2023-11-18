<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'id',
        'nameStudent',
        'email',
        'DateOfBirth',
        'idGroup'
    ];

    public $timestamps = false;

    public function group()
    {
        return $this->belongsTo(Group::class, 'idGroup');
    }

    use HasFactory;
}
