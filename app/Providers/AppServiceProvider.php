<?php

namespace App\Providers;

use App\Services\PrepareTextForDbService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('PrepareTextForDb', function (){
            return new PrepareTextForDbService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
