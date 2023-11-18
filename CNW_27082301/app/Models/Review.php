<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $primaryKey = 'ReviewID';

    protected $fillable = [
        'BookID',
        'UserID',
        'Rating',
        'ReviewText',
        'ReviewDate'
    ];

    public $timestamps = false;


    public function book()
    {
        return $this->belongsTo(Book::class, 'BookID', 'BookID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'id');
    }

}
