<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'idDepartment',
        'idEmployee',
        'Since',
    ];

    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class, 'idDepartment');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'idEmployee');
    }
}
