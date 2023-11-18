<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $primaryKey = 'idArticle';

    protected $fillable = [
        'idArticle',
        'title',
        'nameSong',
        'idCategory',
        'summary',
        'content',
        'idAuthor',
        'dateW',
        'imgArticle'
    ];
    public $timestamps = false;

    use HasFactory;

    public function author()
    {
        return $this->belongsTo(Author::class,'idAuthor','idAuthor');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'idCategory','idCategory');
    }
}
