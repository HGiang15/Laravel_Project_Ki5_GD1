<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'image_url',
        'created_at',
        'updated_at',
    ];
    
    use HasFactory;

    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}
