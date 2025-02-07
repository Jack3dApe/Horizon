<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\Review;
use App\Observers\ModelObserver;
use App\Models\Payment;
use App\Observers\PaymentObserver;
use App\Models\Order;
use App\Observers\OrderObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        view()->composer('layouts.guests.parts.navbarGuest', function ($view) {
            $view->with('genres', Genre::all());
        });

        Order::observe(OrderObserver::class);
        #Payment::observe(PaymentObserver::class);
        User::observe(ModelObserver::class);
        Game::observe(ModelObserver::class);
        Genre::observe(ModelObserver::class);
        Publisher::observe(ModelObserver::class);
        Review::observe(ModelObserver::class);
        Cart::observe(ModelObserver::class);
    }
}
