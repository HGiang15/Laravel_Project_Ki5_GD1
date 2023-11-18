<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Project;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::orderBy('P_No', 'desc')->paginate(5);
        return view('admin.project.index', compact('projects'))->with('i', (request()->input('page', 1) - 1) *5);
    }


    public function create()
    {
        $departments = Department::all();
        $employees = Employee::all();
        return view('admin.project.create', compact('departments', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'Name' => 'required|alpha_spaces',
            'Location' => 'required',
            'idDepartment' => 'required',
            'idEmployee' => 'required',
        ]);

        // $project = Project::create([
        //     'Name' => $request->Name,
        //     'Location' => $request->Location,
        //     'idDepartment' => $request->idDepartment,
        //     'idEmployee' => $request->idEmployee,
        // ]);
    
        $project = Project::create($validate);

        return redirect()->route('projects.index')->with('information', 'Added project successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::where('P_No', $id)->first();
        $department = $project->department;
        $employee = $project->employee;

        return view('admin.employee.show', compact('project', 'department', 'employee'));
    }


    public function edit(string $id)
    {
        $project = Project::where('P_No', $id)->first();
        $departments = Department::all();
        $employees = Employee::all();
        
        return view('admin.project.edit', compact('project', 'departments', 'employees'));
        
    }


    public function update(Request $request, string $id)
    {
        $project = Project::where('P_No', $id)->first();

        $validate = $request->validate([
            'Name' => 'required|alpha_spaces',
            'Location' => 'required',
            'idDepartment' => 'required',
            'idEmployee' => 'required',
        ]);

        // $project->update([
        //     'Name' => $request->Name,
        //     'Location' => $request->Location,
        //     'Gender' => $request->Gender,
        //     'idDepartment' => $request->idDepartment,
        //     'idEmployee' => $request->idEmployee,
        // ]);

        $project->update($validate);

        return redirect()->route('projects.index')->with('information', 'Updated project successfully!');
    }


    public function destroy(string $id)
    {
        Project::where('P_No', $id)->delete();
        
        return redirect()->route('projects.index')->with('information', 'Removed project successfully !');
    }
}
