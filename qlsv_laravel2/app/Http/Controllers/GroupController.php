<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    public function index()
    {
        // SELECT * FROM groups LIMIT 5 OFFSET ((page_number - 1) * 5)
        $groups = Group::paginate(5);
        return view('admin.group.index', compact('groups'))->with('i', (request()->input('page', 1) - 1) *5);
    }

    public function create()
    {
        return view('admin.group.create');
    }

    public function store(Request $request)
    {
        $groups = Group::create([
            'nameGroup' => $request->nameGroup
        ]);

        // $categories = new Category();
        // $categories->nameCategory = $request->nameCategory;
        // $categories->save();
    
        return redirect()->route('groups.index')->with('information', 'Thêm lớp học thành công !');
    }

    public function show(Group $group)
    {
        return view('groups.show', compact('group'));
    }

    public function edit(string $id)
    {
        $group = Group::where('id',$id)->first();
        return view('admin.group.edit', compact('group'));
    }

    public function update(Request $request, string $id)
    {
        Group::where('id', $id)->update([
            'nameGroup' => $request->input('nameGroup')
        ]);

        return redirect()->route('groups.index')->with('information', 'Cập nhật lớp học thành công!');
    }

    public function destroy(string $id)
    {
        Group::where('id', $id)->delete();
        return redirect()->route('groups.index')->with('information', 'Xóa lớp học thành công');
    }
}
