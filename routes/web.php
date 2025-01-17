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
use App\Http\Controllers\PasswordRecoveryController;

Route::get('/', function () {
    $gamesCarrousel = App\Models\Game::with('genres')->inRandomOrder()->take(10)->get();
    return view('home', compact('gamesCarrousel'));
})->name('home');


//Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');


Route::get('/clients/dashboard', function () {
    return view('clients.dashboard');
})->middleware('auth')->name('clients.dashboard');

Route::get('/admin/overview', function () {
    return view('adminoverview.show');
})->middleware(['auth', 'role:admin'])->name('admin.overview');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('forgot-password');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::get('/register', [RegisterController::class, 'showSignup'])->name('register.form')
    ->middleware('guest');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/switch-language/{locale}', [App\Http\Controllers\LanguageController::class, 'switchLanguage'])->name('switch.language');

Route::get('forgot-password', [LoginController::class, 'forgotPassword'])->name('password.request');
Route::post('password-recovery', [PasswordRecoveryController::class, 'recover'])->name('password.recovery');
Route::get('password/reset/{token}', [LoginController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [LoginController::class, 'resetPassword'])->name('password.update');



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

Route::get('/genres/all', [GenreController::class, 'listAllGenres'])->name('genres.listAll');


Route::get('/genres/{genre}/games', [GameController::class, 'gamesByGenre'])->name('genres.games');


Route::get('/games/{game}/mainpage', [GameController::class, 'showGame'])->name('games.show.mainpage');



//Resources
Route::resource('genres', \App\Http\Controllers\GenreController::class);//->except(['show']);

Route::resource('users', \App\Http\Controllers\UserControler::class);

Route::resource('games', \App\Http\Controllers\GameController::class);

Route::resource('reviews', \App\Http\Controllers\ReviewController::class);

Route::resource('publishers', \App\Http\Controllers\PublisherController::class);

