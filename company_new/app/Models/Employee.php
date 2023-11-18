<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'Name',
        'Address',
        'Gender',
        'DateOfBirth',
        'DateOfJob',
        'idDepartment'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'idDepartment');
    }
    
    public function manager()
    {
        return $this->hasOne(Manager::class, 'idEmployee');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'idEmployee');
    }

    public function dependents()
    {
        return $this->hasMany(Dependent::class, 'idEmployee');
    }

    use HasFactory;
}
