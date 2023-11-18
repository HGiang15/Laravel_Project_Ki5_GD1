<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlowerController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;




// -----
Route::resource('/flowers', FlowerController::class);
Route::get('/search', [FlowerController::class, 'search']);

Route::get('/searchRegions', [FlowerController::class, 'searchRegions'])->name('flowers.searchRegions');
Route::resource('/regions', RegionController::class);




// ------
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

