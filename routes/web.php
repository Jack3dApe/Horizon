<?php

use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PublisherController;
use \App\Http\Controllers\UserControler;
use \App\Http\Controllers\ReviewController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');


Route::get('/clients/dashboard', function () {
    return view('clients.dashboard');
})->middleware('auth')->name('clients.dashboard');



Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::get('/register', [RegisterController::class, 'showSignup'])->name('register.form')
    ->middleware('guest');

Route::post('/register', [RegisterController::class, 'register'])->name('register');



//Resources
Route::resource('genres', \App\Http\Controllers\GenreController::class)->except(['show']);

Route::resource('users', \App\Http\Controllers\UserControler::class);

Route::resource('reviews', \App\Http\Controllers\ReviewController::class);

Route::resource('publishers', \App\Http\Controllers\PublisherController::class);

