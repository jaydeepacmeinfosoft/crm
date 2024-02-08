<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        require_once __DIR__ . '/../Http/Helpers/CommonFunction.php';
        require_once __DIR__ . '/../Http/Helpers/Navigation.php';
    }
}
