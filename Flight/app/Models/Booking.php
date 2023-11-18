<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'idFlight',
        'idPassenger',
    ];
    public $timestamps = false;

    // Ràng buộc với bảng Flight
    public function flight()
    {
        return $this->belongsTo(Flight::class, 'idFlight', 'FlightNumber');
    }

    // Ràng buộc với bảng Passenger
    public function passenger()
    {
        return $this->belongsTo(Passenger::class, 'idPassenger');
    }

    use HasFactory;
}
