<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    public $timestamps = false;

    protected $primaryKey = 'P_No';

    protected $fillable = [
        'P_No',
        'Name',
        'Location',
        'idDepartment',
        'idEmployee'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'idDepartment');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'idEmployee');
    }

    use HasFactory;
}
