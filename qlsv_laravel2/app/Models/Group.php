<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'id',
        'nameGroup',
    ];

    public $timestamps = false;

    public function student()
    {
        return $this->hasMany(SinhVien::class, 'idGroup');
    }

    use HasFactory;
}
