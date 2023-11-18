<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Airplane;

class FlightController extends Controller
{

    public function index()
    {
        $flights = Flight::orderBy('FlightNumber', 'desc')->paginate(5);
        return view('admin.flight.index', compact('flights'))->with('i', (request()->input('page', 1) - 1) *5);
    }

    public function search(Request $request) {
        $search = $request->search;

        $flights = Flight::where(function($query) use ($search) {
            $query->where('From', 'like', "%$search%")
            ->orWhere('To', 'like', "%$search%");
        })->paginate(10);;

        return view('admin.flight.index', compact('flights', 'search'));
    }

    public function create()
    {
        $airplanes = Airplane::all();

        return view('admin.flight.create' , compact('airplanes'));
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'From' => 'required|alpha_spaces',
            'To' => 'required|alpha_spaces',
            'DepartureDate' => 'required|date',
            'DepartureTime' => 'required',
            'ArrivalDate' => 'required|date',
            'ArrivalTime' => 'required',
            'idAirplane' => 'required',
        ]);

        // C1
        // $flight = Flight::create([
        //     'From' => $request->From,
        //     'To' => $request->To,
        //     'DepartureDate' => $request->DepartureDate,
        //     'DepartureTime' => $request->DepartureTime,
        //     'ArrivalDate' => $request->ArrivalDate,
        //     'ArrivalTime' => $request->ArrivalTime,
        //     'idAirplane' => $request->idAirplane,
        // ]);
        
        // C2
        $flight = Flight::create($validate);

        return redirect()->route('flights.index')->with('information', 'Added flight successfully !');
    }

    public function show(string $id)
    {
        $flight = Flight::where('FlightNumber', $id)->first();
        $airplane = $flight->airplane;

        return view('admin.flight.show', compact('flight', 'airplane'));

    }


    public function edit(string $id)
    {
        $flight = Flight::where('FlightNumber', $id)->first();
        $airplanes = Airplane::all();

        return view('admin.flight.edit', compact('flight','airplanes'));
    }

    public function update(Request $request, string $id)
    {
        $flight = Flight::where('FlightNumber', $id)->first();

        $validate = $request->validate([
            'From' => 'required|alpha_spaces',
            'To' => 'required|alpha_spaces',
            'DepartureDate' => 'required|date',
            'DepartureTime' => 'required',
            'ArrivalDate' => 'required|date',
            'ArrivalTime' => 'required',
            'idAirplane' => 'required',
        ]);

        // $flight->update([
        //     'From' => $request->input('From'),
        //     'To' => $request->input('To'),
        //     'DepartureDate' => $request->input('DepartureDate'),
        //     'DepartureTime' => $request->input('DepartureTime'),
        //     'ArrivalDate' => $request->input('ArrivalDate'),
        //     'ArrivalTime' => $request->input('ArrivalTime'),
        //     'idAirplane' => $request->input('idAirplane'),
        // ]);

        $flight->update($validate);

        return redirect()->route('flights.index')->with('information', 'Updated flight successfully !');
    }


    public function destroy(string $id)
    {
        Flight::where('FlightNumber', $id)->delete();
        
        return redirect()->route('flights.index')->with('information', 'Removed flight successfully !');
    }
}
