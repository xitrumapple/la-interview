<?php

namespace App\Providers;

// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
        // if (env('APP_DEBUG')) {
        //     DB::listen(function ($query) {
        //         Log::info($query->sql);
        //         Log::info($query->bindings);
        //         Log::info($query->time);
        //     });
        //     // see log in 'path' => storage_path('logs/laravel.log'),
        // }
    }
}