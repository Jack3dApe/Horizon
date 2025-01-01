<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserControler;
use \App\Http\Controllers\ReviewController;
use \App\Http\Controllers\SupportTicketController;
use \App\Http\Controllers\PublisherController;
use \App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
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

Route::prefix('deleted')->middleware(['auth', 'role:admin'])->group(function (){
    Route::get('/users', [UserControler::class, 'deleted'])->name('users.deleted');
    Route::get('/reviews', [ReviewController::class, 'deleted'])->name('reviews.deleted');
    Route::get('/support-tickets', [SupportTicketController::class, 'deleted'])->name('support_tickets.deleted');
    Route::get('/publishers', [PublisherController::class, 'deleted'])->name('publishers.deleted');
    Route::get('/games', [GameController::class, 'deleted'])->name('games.deleted');
    Route::get('/genres', [GenreController::class, 'deleted'])->name('genres.deleted');

    //Rotas Restore
    Route::post('/users/{id}/restore', [UserControler::class, 'restore'])->name('users.restore');
    Route::post('/reviews/{id}/restore', [ReviewController::class, 'restore'])->name('reviews.restore');
    Route::post('/support-tickets/{id}/restore', [SupportTicketController::class, 'restore'])->name('support_tickets.restore');
    Route::post('/publishers/{id}/restore', [PublisherController::class, 'restore'])->name('publishers.restore');
    Route::post('/games/{id}/restore', [GameController::class, 'restore'])->name('games.restore');
    Route::post('/genres/{id}/restore', [GenreController::class, 'restore'])->name('genres.restore');

    //Rotas Permanent Delete
    Route::delete('/users/{id}/force-delete', [UserControler::class, 'forceDelete'])->name('users.forceDelete');
    Route::delete('/reviews/{id}/force-delete', [ReviewController::class, 'forceDelete'])->name('reviews.forceDelete');
    Route::delete('/support-tickets/{id}/force-delete', [SupportTicketController::class, 'forceDelete'])->name('support_tickets.forceDelete');
    Route::delete('/publishers/{id}/force-delete', [PublisherController::class, 'forceDelete'])->name('publishers.forceDelete');
    Route::delete('/games/{id}/force-delete', [GameController::class, 'forceDelete'])->name('games.forceDelete');
    Route::delete('/genres/{id}/force-delete', [GenreController::class, 'forceDelete'])->name('genres.forceDelete');
});


//Resources
Route::resource('genres', \App\Http\Controllers\GenreController::class);//->except(['show']);

Route::resource('users', \App\Http\Controllers\UserControler::class);

Route::resource('reviews', \App\Http\Controllers\ReviewController::class);

Route::resource('publishers', \App\Http\Controllers\PublisherController::class);

