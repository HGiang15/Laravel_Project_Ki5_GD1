<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Group;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // SELECT * FROM students LIMIT 5 OFFSET ((page_number - 1) * 5)
        $students = Student::paginate(5);
        return view('admin.student.index', compact('students'))->with((request()->input('page', 1) - 1) *5);
    }

    public function create()
    {
        $groups = Group::all();
        return view('admin.student.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $students = Student::create([
            'nameStudent' => $request->nameStudent,
            'email' => $request->email,
            'DateOfBirth' => $request->DateOfBirth,
            'idGroup' => $request->idGroup,

        ]);

        // $categories = new Category();
        // $categories->nameCategory = $request->nameCategory;
        // $categories->save();
    
        return redirect()->route('students.index')->with('information', 'Thêm sinh viên thành công !');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $student = Student::where('id', $id)->first();
        $groups = Group::all();

        return view('admin.student.edit', compact('student','groups'));
    }

    public function update(Request $request, string $id)
    {
        $student = Student::where('id', $id)->first();

        Student::where('id', $id)->update([
            'nameStudent' => $request->input('nameStudent'),
            'email' => $request->input('email'),
            'DateOfBirth' => $request->input('DateOfBirth'),
            'idGroup' => $request->input('idGroup'),
        ]);

        return redirect()->route('students.index')->with('information', 'Cập nhật sinh viên thành công!');
    }

    public function destroy(string $id)
    {
        Student::where('id', $id)->delete();
        return redirect()->route('students.index')->with('information', 'Xóa sinh viên thành công');
    }
}
