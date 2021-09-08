<?php

namespace App\Providers;

use App\Api\Huntflow;
use Illuminate\Support\ServiceProvider;

class HuntflowServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Api\Huntflow', function ($app) {
            return new Huntflow();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
