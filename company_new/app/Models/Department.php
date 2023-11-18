<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'D_No';
    protected $fillable = ['D_No', 'Name', 'Location'];

    use HasFactory;


    public function employees()
    {
        return $this->hasMany(Employee::class, 'idDepartment');
    }

    public function manager()
    {
        return $this->hasOne(Manager::class, 'idDepartment');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'idDepartment');
    }


}
