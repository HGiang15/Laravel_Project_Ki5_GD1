<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/search', [CategoryController::class, 'search']);
Route::get('/search', [AuthorController::class, 'search']);
Route::get('/search', [ArticleController::class, 'search']);


// admin
Route::get('/home', [HomeController::class, 'admin'])->name('home.admin');

Route::resource('/categories', CategoryController::class);

Route::resource('/authors', AuthorController::class);

Route::resource('/articles', ArticleController::class);


// homepage
Route::resource('homepage', HomeController::class);

Route::resource('/users',UserController::class);

Route::get('/signup', [UserController::class, 'signup'])->name('users.signup');

Route::post('/login', [UserController::class, 'login'])->name('users.login');


