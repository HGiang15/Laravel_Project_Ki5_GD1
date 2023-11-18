<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;

class PassengerController extends Controller
{

    public function index()
    {
        $passengers = Passenger::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.passenger.index', compact('passengers'))->with('i', (request()->input('page', 1) - 1) *5);
    }

    public function create()
    {   
        return view('admin.passenger.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'EmailAddress' => 'required|email',
            'GivenNames' => 'required|alpha_spaces',
            'Surname' => 'required|alpha_spaces',
        ]);

        $passengers = Passenger::create([
            'EmailAddress' => $request->EmailAddress,
            'GivenNames' => $request->GivenNames,
            'Surname' => $request->Surname,
        ]);
    
        return redirect()->route('passengers.index')->with('information', 'Added passenger successfully !');
    }

    public function show(string $id)
    {
        $passenger = Passenger::where('EmailAddress', $id)->first();

        return view('admin.passenger.show', compact('passenger'));
    }


    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        Passenger::where('EmailAddress', $id)->delete();
        
        return redirect()->route('passengers.index')->with('information', 'Removed passenger successfully !');
        
    }
}
