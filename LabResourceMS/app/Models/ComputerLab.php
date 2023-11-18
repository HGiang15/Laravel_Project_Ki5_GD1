<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComputerLab extends Model
{

    protected $primaryKey = 'LabID';

    protected $fillable = [
        'LabID',
        'LabName',
        'NumberOfComputers',
        'Status',
        'Description',
    ];
    public $timestamps = false;
    
    use HasFactory;
}
