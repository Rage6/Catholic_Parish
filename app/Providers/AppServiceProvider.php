<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // I added this because the default max length (if there is a default max) was too high for ClearDB, and it caused an error.
        Schema::defaultStringLength(191);

        // I added this because the default 'http' was causing errors in the CSS and JS when using the 'https' in my Heroku URL
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        };
    }
}
