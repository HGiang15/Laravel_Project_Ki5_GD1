<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'duration',
        'created_at',
        'updated_at',
    ] ;
}
