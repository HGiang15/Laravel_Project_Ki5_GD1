<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;
use App\Models\Booking;
use App\Models\Flight;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::paginate(5);
        return view('admin.booking.index', compact('bookings'))->with('i', (request()->input('page', 1) - 1) *5);
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
