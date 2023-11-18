<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComputerLab;
use App\Models\Computer;
class ComputerController extends Controller
{

    public function index()
    {
        $computers = Computer::orderBy('ComputerID', 'desc')->paginate(5);
        return view('admin.computer.index', compact('computers'))->with('i', (request()->input('page', 1) - 1) *5);
    }


    public function create()
    {
        $computerlabs = ComputerLab::all();
        return view('admin.computer.create', compact('computerlabs'));
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'LabID' => 'required',
            'ComupterName' => 'required',
            'Configuration' => 'required',
            'ComputerStatus' => 'required',
        ]);

        $computer = Computer::create($validate);

        return redirect()->route('computers.index')->with('information', 'Added computer successfully !');
    }
    

   
    public function show(string $id)
    {
        $computer = Computer::where('ComputerID', $id)->first();
        // $computerlabs = ComputerLab::all();
        $computerlab = $computer->computerlab;
        return view('admin.computer.show', compact('computer', 'computerlab'));
    }

    
    public function edit(string $id)
    {
        $computer = Computer::where('ComputerID', $id)->first();
        $computerlabs = ComputerLab::all();
        return view('admin.computer.edit', compact('computer','computerlabs'));

    }

    public function update(Request $request, string $id)
    {
        $computer = Computer::where('ComputerID', $id)->first();
        
        $validate = $request->validate([
            'LabID' => 'required',
            'ComupterName' => 'required',
            'Configuration' => 'required',
            'ComputerStatus' => 'required',
        ]);

        $computer->update($validate);

        return redirect()->route('computers.show', $computer->ComputerID)->with('information', 'Updated computer successfully !');
    }

    public function destroy(string $id)
    {
        Computer::where('ComputerID', $id)->delete();
        return redirect()->route('computers.index')->with('information', 'Removed computer successfully !');
    }
}
