<?php

namespace App\Providers;

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
        Paginator::useTailwind();

        // Share $pengaturan globally with all views (including 404/error pages)
        try {
            if (class_exists(\App\Models\PengaturanUmum::class)) {
                \Illuminate\Support\Facades\View::share('pengaturan', \App\Models\PengaturanUmum::first());
            }
        } catch (\Exception $e) {
            // Prevent failure during migrations or artisan commands
        }
    }
}
