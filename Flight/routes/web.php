<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AirplaneController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'admin'])->name('home.admin');
Route::get('/search', [AirplaneController::class, 'search']);
// Route::get('/search', [FlightController::class, 'search']);
// Route::get('/search/airplanes', [AirplaneController::class, 'search']);
// Route::get('/search/flights', [FlightController::class, 'search']);

// Route::get('/search', [PassengerController::class, 'search']);
// Route::get('/search', [BookingController::class, 'search']);

Route::resource('/airplanes', AirplaneController::class);
Route::resource('/flights', FlightController::class);
Route::resource('/passengers', PassengerController::class);
Route::resource('/bookings', BookingController::class);
