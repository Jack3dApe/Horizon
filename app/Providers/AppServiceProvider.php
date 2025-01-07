<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Genre;

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
    }
}
