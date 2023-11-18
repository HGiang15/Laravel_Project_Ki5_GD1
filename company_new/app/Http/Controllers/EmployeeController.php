<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->paginate(5);
        return view('admin.employee.index', compact('employees'))->with('i', (request()->input('page', 1) - 1) *5);
    }


    public function create()
    {
        $departments = Department::all();
        return view('admin.employee.create', compact('departments'));
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'Name' => 'required|alpha_spaces',
            'Address' => 'required',
            'Gender' => 'required',
            'DateOfBirth' => 'required|date',
            'DateOfJob' => 'required|date',
            'idDepartment' => 'required',
        ]);

        // C1
        // $department = Department::create([
        //     'Name' => $request->Name,
        //     'Address' => $request->Address,
        //     'Gender' => $request->Gender,
        //     'DateOfBirth' => $request->DateOfBirth,
        //     'DateOfJob' => $request->DateOfJob,
        //     'idDepartment' => $request->idDepartment,
        // ]);
    
        // C2
        $employee = Employee::create($validate);

        return redirect()->route('employees.index')->with('information', 'Added employee successfully!');
    }

   
    public function show(string $id)
    {
        $employee = Employee::where('id', $id)->first();
        $department = $employee->department;

        return view('admin.employee.show', compact('employee', 'department'));
    }

    
    public function edit(string $id)
    {
        $employee = Employee::where('id', $id)->first();
        $departments = Department::all();

        return view('admin.employee.edit', compact('employee', 'departments'));
    }

    
    public function update(Request $request, string $id)
    {
        $employee = Employee::where('id', $id)->first();

        $validate = $request->validate([
            'Name' => 'required|alpha_spaces',
            'Address' => 'required',
            'Gender' => 'required',
            'DateOfBirth' => 'required|date',
            'DateOfJob' => 'required|date',
            'idDepartment' => 'required',
        ]);

        $employee->update([
            'Name' => $request->Name,
            'Address' => $request->Address,
            'Gender' => $request->Gender,
            'DateOfBirth' => $request->DateOfBirth,
            'DateOfJob' => $request->DateOfJob,
            'idDepartment' => $request->idDepartment,
        ]);

        // $employee->update($validate);

        return redirect()->route('employees.show', $employee->id)->with('information', 'Updated employee successfully!');

    }

    
    public function destroy(string $id)
    {
        Employee::where('id', $id)->delete();
        
        return redirect()->route('employees.index')->with('information', 'Removed employee successfully !');
    }
}
