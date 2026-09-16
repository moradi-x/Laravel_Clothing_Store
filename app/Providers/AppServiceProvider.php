<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;


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
        Paginator::defaultView('home.sections.pagination');

        Fortify::loginView(function () {
            return view('auth.login');
        });
    }


    /**
     * Bootstrap any application services.
     */
}
