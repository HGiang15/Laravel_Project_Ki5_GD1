<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $majors = Major::paginate(10);
        $latestItem = Major::orderBy('created_at', 'desc')->first();
        return view('major.index', compact('majors','latestItem'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('major.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Major::create([
            'name' => $request->name,
            'description' => $request->description,
            'duration' => $request->duration,
            'updated_at' => null
        ]);

        return redirect()->route('majors.index')->with('information', 'ADD SUCCESS !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        //
        return view('major.show', compact('major'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {
        //
        return view('major.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Major $major)
    {
        //
        $major->update([
            'name' => $request->name,
            'description' => $request->description,
            'duration' => $request->duration,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('majors.index')->with('information', 'UPDATED SUCCESS!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        //
        $major->delete();
        
        return redirect()->route('majors.index')->with('information', 'REMOVE SUCCESS');
    }
}
