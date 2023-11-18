<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $primaryKey = 'ComputerID';

    protected $fillable = [
        'ComputerID',
        'LabID',
        'ComupterName',
        'Configuration',
        'ComputerStatus',
    ];
    public $timestamps = false;


    use HasFactory;
}
