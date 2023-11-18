<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $primaryKey = 'BookID';

    protected $fillable = [
        'Title',
        'Author',
        'Genre',
        'PublicationYear',
        'ISBN',
        'ConvertImageURL'
    ];
    public $timestamps = false;

    public function reviews()
    {
        return $this->hasMany(Review::class, 'BookID', 'BookID');
    }
}
