<?php

namespace Submtd\LaravelTrackingCookie\Providers;

use Illuminate\Support\ServiceProvider;
use Submtd\LaravelTrackingCookie\Services\LaravelTrackingCookieService;

class LaravelTrackingCookieServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('trackingCookie', function () {
            return new LaravelTrackingCookieService();
        });
    }

    public function boot()
    {
        // config
        $this->mergeConfigFrom(__DIR__ . '/../../config/laravel-tracking-cookie.php', 'laravel-tracking-cookie');
        $this->publishes([__DIR__ . '/../../config' => config_path()], 'config');
        // routes
        $this->loadRoutesFrom(__DIR__ . '/../../routes/routes.php');
    }
}
