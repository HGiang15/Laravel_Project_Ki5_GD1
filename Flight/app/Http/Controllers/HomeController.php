<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airplane;
use App\Models\Flight;
use App\Models\Passenger;
use App\Models\Booking;
class HomeController extends Controller
{

    public function index()
    {
        //
    }

    public function admin()
    {
        $airplane = Airplane::count();
        $flight = Flight::count();
        $passenger = Passenger::count();

        return view('admin.index', compact('airplane', 'flight','passenger'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
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
        //
    }
}
