<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\DependentController;
use App\Http\Controllers\HomeController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'admin'])->name('home.admin');

Route::resource('/departments', DepartmentController::class);
Route::resource('/employees', EmployeeController::class);
Route::resource('/projects', ProjectController::class);
Route::resource('/managers', ManagerController::class);
Route::resource('/dependents', DependentController::class);

