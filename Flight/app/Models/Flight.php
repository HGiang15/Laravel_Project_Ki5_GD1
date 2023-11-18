<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{

    protected $primaryKey = 'FlightNumber';

    protected $fillable = [
        'FlightNumber',
        'From',
        'To',
        'DepartureDate',
        'DepartureTime',
        'ArrivalDate',
        'ArrivalTime',
        'idAirplane'
    ];

    public $timestamps = false;

    // Ràng buộc với bảng Airplane
    public function airplane()
    {
        return $this->belongsTo(Airplane::class, 'idAirplane', 'RegistrationNumber');
    }

    // Ràng buộc với bảng Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'idFlight', 'FlightNumber');
    }

    use HasFactory;
}
