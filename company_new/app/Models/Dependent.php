<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'D_name',
        'Gender',
        'Relationship',
        'idEmployee'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'idEmployee');
    }

    use HasFactory;
}
