<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

    protected $fillable = [
        'id',
        'flower_id',
        'region_name',
        'image_url',
        'created_at',
        'updated_at',
    ];

    use HasFactory;

    public function flower()
    {
        return $this->belongsTo(Flower::class);
    }
}
