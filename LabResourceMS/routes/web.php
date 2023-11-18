<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputerLabController;
use App\Http\Controllers\ComputerController;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('/computerlabs', ComputerLabController::class);
Route::resource('/computers', ComputerController::class);

