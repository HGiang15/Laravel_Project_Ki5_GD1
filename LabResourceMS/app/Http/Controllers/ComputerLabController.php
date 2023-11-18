<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComputerLab;

class ComputerLabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $computerlabs = ComputerLab::orderBy('LabID', 'desc')->paginate(5);
        return view('admin.computerlab.index', compact('computerlabs'))->with('i', (request()->input('page', 1) - 1) *5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.computerlab.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'LabName' => 'required',
            'NumberOfComputers' => 'required',
            'Status' => 'required',
            'Description' => 'required',
        ]);

        $computerlab = ComputerLab::create($validate);

        return redirect()->route('computerlabs.index')->with('information', 'Added computerlab successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
