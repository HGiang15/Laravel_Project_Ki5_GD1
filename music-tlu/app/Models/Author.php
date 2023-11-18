<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    protected $primaryKey = 'idAuthor';

    protected $fillable = [
        'idAuthor',
        'nameAuthor',
        'imgAuthor',
    ];
    public $timestamps = false;

    use HasFactory;

    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
