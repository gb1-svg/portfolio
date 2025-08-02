<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade; // Tambahkan ini
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
        // Tambahkan baris ini untuk membuat alias komponen
        Blade::component('public.layouts.main', 'public-layout');
    }
}