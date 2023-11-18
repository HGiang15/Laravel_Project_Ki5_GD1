<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airplane;

class AirplaneController extends Controller
{

    public function index()
    {
        $airplanes = Airplane::orderBy('RegistrationNumber', 'desc')->paginate(5);
        return view('admin.airplane.index', compact('airplanes'))->with('i', (request()->input('page', 1) - 1) *5);
    }

    public function search(Request $request) {
        // $search = $request->search;
        $search = $request->input('search');
        $airplanes = Airplane::where(function($query) use ($search) {
            $query->where('ModeNumber', 'like', "%$search%")
            ->orWhere('Capacity', 'like', "%$search%");
        })->paginate(10);;

        return view('admin.airplane.index', compact('airplanes', 'search'));
    }


    public function create()
    {
        return view('admin.airplane.create');
    }


    public function store(Request $request)
    {   
        $validate = $request->validate([
            'ModeNumber' => 'required',
            'Capacity' => 'required|numeric_spaces',
        ]);

        // C1
        // $airplane = Airplane::create([
        //     'ModeNumber' => $request->ModeNumber,
        //     'Capacity' => $request->Capacity,
        // ]);
    
        // C2
        $airplane = Airplane::create($validate);

        return redirect()->route('airplanes.index')->with('information', 'Added airplane successfully !');
    }


    public function show(string $id)
    {
        $airplane = Airplane::where('RegistrationNumber', $id)->first();

        return view('admin.airplane.show', compact('airplane'));
    }


    public function edit(string $id)
    {
        $airplane = Airplane::where('RegistrationNumber', $id)->first();
        return view('admin.airplane.edit', compact('airplane'));
    }


    public function update(Request $request, string $id)
    {
        $airplane = Airplane::where('RegistrationNumber', $id)->first();
    
        $validate = $request->validate([
            'ModeNumber' => 'required',
            'Capacity' => 'required|numeric_spaces',
        ]);

        // $airplane->update([
        //     'ModeNumber' => $request->input('ModeNumber'),
        //     'Capacity' => $request->input('Capacity'),
        // ]);

        $airplane->update($validate);

        return redirect()->route('airplanes.index')->with('information', 'Updated airplane successfully !');
    }

    public function destroy(string $id)
    {
        Airplane::where('RegistrationNumber', $id)->delete();
        
        return redirect()->route('airplanes.index')->with('information', 'Removed author successfully !');
    }
}
