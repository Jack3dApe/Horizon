<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TipoObraController;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('home');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/client/dashboard', function () {
    return view('client.dashboard');
});

Route::resource('genres', \App\Http\Controllers\GenreController::class);


Route::resource('publishers', \App\Http\Controllers\PublisherController::class)
    ->parameters(['publishers' => 'publisher']);
