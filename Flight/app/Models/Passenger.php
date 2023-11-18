<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $fillable = [
        'EmailAddress',
        'GivenNames',
        'Surname',
        'created_at',
        'updated_at'
    ];
    // public $timestamps = false;

    // Ràng buộc với bảng Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'idPassenger');
    }

    use HasFactory;
}
