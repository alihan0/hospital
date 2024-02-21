<?php

namespace App\Providers;

use App\Models\System;
use Illuminate\Support\ServiceProvider;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $system = System::first();
        view()->share('system', $system);
    }
}
