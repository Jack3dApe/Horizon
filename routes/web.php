<?php

use App\Http\Controllers\DashboardOverviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
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
use Carbon\Carbon;
use App\Http\Controllers\OrderController;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\SocialAuthController;

Route::get('/', function () {
    // Pega 10 jogos alearoios
    $gamesCarrousel = Game::with('genres')->inRandomOrder()->take(10)->get();
    return view('home', compact('gamesCarrousel'));

})->name('home');

// Ve se o user esta logado
Route::get('/check-auth', function () {
    return response()->json(['authenticated' => Auth::check()]);
});


//Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');

/*
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');
*/

Route::get('/clients/dashboard', function () {
    return view('clients.dashboard');
})->middleware('auth')->name('clients.dashboard');

Route::get('/admin/dashboard', [DashboardOverviewController::class, 'overview'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');

Route::get('/admin/notifications', function () {
    return view('adminoverview.show-all-notifications');
})->middleware(['auth', 'role:admin'])->name('admin.notifications');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:5,1');;
    Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('forgot-password');

});

Route::get('/auth/github', [SocialAuthController::class, 'redirectToGitHub'])->name('auth.github');
Route::get('/auth/github/callback', [SocialAuthController::class, 'handleGitHubCallback']);

Route::get('/auth/google/redirect', [SocialAuthController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);


//Rota para o profile
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserControler::class, 'profile'])->name('profile');
    Route::put('/profile/update', [UserControler::class, 'updateProfile'])->name('profile.update');
});

Route::post('/support/email/send-activation', [ProfileController::class, 'sendActivationEmail'])->name('support.email.send');
Route::get('/support/email/activate/{user}/{token}', [ProfileController::class, 'activateEmail'])->name('support.email.activate');


//Rotas para a wishlist
Route::middleware('auth')->group(function () {
    Route::post('/wishlist/{id_game}/toggle', [WishlistController::class, 'toggleWishlist'])->name('wishlist.toggle');
});

Route::get('user/{id_user}/wishlist', [WishlistController::class, 'index'])->name('user.wishlist');



//ROtas do carrinho
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id_game}', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/remove/{id_game}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/session', function () {
    return session()->get('cart', []);
});

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('cart.checkout');
});


//Rotas pagamento
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::post('/paypal/validate', [PaymentController::class, 'processPayPalPayment'])->name('payment.process.paypal');




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
    Route::post('/reviews/{id_review}/restore', [ReviewController::class, 'restore'])->name('reviews.restore');
    Route::post('/support-tickets/{id}/restore', [SupportTicketController::class, 'restore'])->name('support_tickets.restore');
    Route::post('/publishers/{id}/restore', [PublisherController::class, 'restore'])->name('publishers.restore');
    Route::post('/games/{id}/restore', [GameController::class, 'restore'])->name('games.restore');
    Route::post('/genres/{id}/restore', [GenreController::class, 'restore'])->name('genres.restore');

    //Rotas Permanent Delete
    Route::delete('/users/{id}/force-delete', [UserControler::class, 'forceDelete'])->name('users.forceDelete');
    Route::delete('/reviews/{id_review}/force-delete', [ReviewController::class, 'forceDelete'])->name('reviews.forceDelete');
    Route::delete('/support-tickets/{id}/force-delete', [SupportTicketController::class, 'forceDelete'])->name('support_tickets.forceDelete');
    Route::delete('/publishers/{id}/force-delete', [PublisherController::class, 'forceDelete'])->name('publishers.forceDelete');
    Route::delete('/games/{id}/force-delete', [GameController::class, 'forceDelete'])->name('games.forceDelete');
    Route::delete('/genres/{id}/force-delete', [GenreController::class, 'forceDelete'])->name('genres.forceDelete');
});

Route::middleware(['auth', 'role:admin'])->prefix('deleted')->group(function () {
    Route::get('/users/search', [\App\Http\Controllers\SearchController::class, 'searchDeletedUsers'])->name('deleted.users.search');
    Route::get('/reviews/search', [\App\Http\Controllers\SearchController::class, 'searchDeletedReviews'])->name('deleted.reviews.search');
    Route::get('/publishers/search', [\App\Http\Controllers\SearchController::class, 'searchDeletedPublishers'])->name('deleted.publishers.search');
    Route::get('/games/search', [\App\Http\Controllers\SearchController::class, 'searchDeletedGames'])->name('deleted.games.search');
    Route::get('/genres/search', [\App\Http\Controllers\SearchController::class, 'searchDeletedGenres'])->name('deleted.genres.search');
});

Route::get('/genres/all', [GenreController::class, 'listAllGenres'])->name('genres.listAll');


Route::get('/genres/{genre}/games', [GameController::class, 'gamesByGenre'])->name('genres.games');


Route::get('/games/{game}/mainpage', [GameController::class, 'showGame'])->name('games.show.mainpage');

//Orders
Route::middleware('auth')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id_order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/place', [OrderController::class, 'placeOrder'])->name('orders.place');
    Route::post('/orders/place/paypal', [OrderController::class, 'placeOrderPaypal'])->name('orders.place.paypal');

    Route::get('/orders/success/{id_order}', [OrderController::class, 'success'])->name('orders.success');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/library', [LibraryController::class, 'index'])->name('library.index');
    Route::post('/library', [LibraryController::class, 'store'])->name('library.store');
    Route::get('/library/{id}', [LibraryController::class, 'show'])->name('library.show');
    Route::delete('/library/{id}', [LibraryController::class, 'destroy'])->name('library.destroy');
});

Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');
Route::get('/ai-search', [\App\Http\Controllers\SearchController::class, 'aiSearch'])->name('search.ai');


//Resources
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('genres', \App\Http\Controllers\GenreController::class);//->except(['show']);

    Route::resource('users', \App\Http\Controllers\UserControler::class);
    Route::get('/admin/search/users', [\App\Http\Controllers\SearchController::class, 'searchUsers'])->name('admin.search.users');


    Route::resource('games', \App\Http\Controllers\GameController::class);
    Route::get('/admin/search/games', [\App\Http\Controllers\SearchController::class, 'searchGames'])->name('admin.search.games');


    Route::resource('reviews', \App\Http\Controllers\ReviewController::class);
    Route::get('/admin/search/reviews', [\App\Http\Controllers\SearchController::class, 'searchReviews'])->name('admin.search.reviews');

    Route::resource('publishers', \App\Http\Controllers\PublisherController::class);
    Route::get('/admin/search/publishers', [\App\Http\Controllers\SearchController::class, 'searchPublishers'])->name('admin.search.publishers');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/reviews/form/{id_game}', [ReviewController::class, 'showReviewForm'])->name('reviews.form');
    Route::post('/reviews/store/{id_game}', [ReviewController::class, 'storeReview'])->name('reviews.store');
});




//Tickets
Route::middleware(['auth'])->group(function () {
    Route::get('/support/create', [TicketController::class, 'create'])->name('support.tickets.create');
    Route::post('/support/store', [TicketController::class, 'store'])->name('support.tickets.store');
    Route::get('/support/tickets', [TicketController::class, 'userTickets'])->name('support.tickets.index');
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/support/tickets', [TicketController::class, 'index'])->name('admin.supporttickets.index');
        Route::get('/admin/support/tickets/{id}', [TicketController::class, 'show'])->name('admin.supporttickets.show');
    });
});
Route::get('/admin/search/tickets', [\App\Http\Controllers\SearchController::class, 'searchTickets'])->name('admin.search.tickets');


Route::middleware(['auth'])->group(function () {
    // Rota para resolver tickets pelo site Horizon
    Route::post('/support/tickets/{id}/resolve', [TicketController::class, 'resolve'])->name('support.tickets.resolve');
});

//Orders (Dashboard)
Route::prefix('admindashboard')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/orders', [OrderController::class, 'indexPaginated'])->name('admindashboard.orders.index');
    Route::get('/orders/{id_order}', [OrderController::class, 'showWithPayments'])->name('admindashboard.orders.show');
});
Route::get('/admin/search/orders', [\App\Http\Controllers\SearchController::class, 'searchOrders'])->name('admin.search.orders');

//About Us
Route::get('/about-us', function () {
    return view('layouts.guests.aboutus.show');
})->name('aboutus');
