<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    protected $primaryKey = 'RegistrationNumber';
    
    protected $fillable = [
        'ModeNumber',
        'Capacity'
    ];
    public $timestamps = false;
    
    public function flights()
    {
        return $this->hasMany(Flight::class, 'idAirplane', 'RegistrationNumber');
    }

    use HasFactory;
}
