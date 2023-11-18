<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::orderBy('D_No', 'desc')->paginate(5);
        return view('admin.department.index', compact('departments'))->with('i', (request()->input('page', 1) - 1) *5);
    }


    public function create()
    {
        return view('admin.department.create');
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'Name' => 'required|alpha_spaces',
            'Location' => 'required',
        ]);

        // $department = Department::create([
        //     'Name' => $request->Name,
        //     'Location' => $request->Location,
        // ]);
    
        $department = Department::create($validate);

        return redirect()->route('departments.index')->with('information', 'Added department successfully!');
    }

 
    public function show(string $id)
    {
        $department = Department::where('D_No', $id)->first();

        return view('admin.department.show', compact('department'));
    }

 
    public function edit(string $id)
    {
        $department = Department::where('D_No', $id)->first();
        return view('admin.department.edit', compact('department'));
    }

  
    public function update(Request $request, string $id)
    {
        $department = Department::where('D_No', $id)->first();
        
        $validate = $request->validate([
            'Name' => 'required|alpha_spaces',
            'Location' => 'required',
        ]);

        // $department->update([
        //     'Name' => $request->Name,
        //     'Location' => $request->Location,
        // ]);

        $department->update($validate);

        return redirect()->route('departments.show', $department->D_No)->with('information', 'Updated department successfully!');

    }


    public function destroy(string $id)
    {
        Department::where('D_No', $id)->delete();
        
        return redirect()->route('departments.index')->with('information', 'Removed department successfully !');
    }
}
