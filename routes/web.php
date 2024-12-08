<?php

use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PublisherController;
use \App\Http\Controllers\UserControler;
use \App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/client/dashboard', function () {
    return view('client.dashboard');
});

Route::resource('genres', \App\Http\Controllers\GenreController::class)->except(['show']);

Route::resource('users', \App\Http\Controllers\UserControler::class);

Route::resource('reviews', \App\Http\Controllers\ReviewController::class);

Route::resource('publishers', \App\Http\Controllers\PublisherController::class);

