<?php

namespace Submtd\LaravelTrackingCookie\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelTrackingCookieServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // config
        $this->mergeConfigFrom(__DIR__ . '/../../config/laravel-tracking-cookie.php', 'laravel-tracking-cookie');
        $this->publishes([__DIR__ . '/../../config' => config_path()], 'config');
        // routes
        $this->loadRoutesFrom(__DIR__ . '/../../routes/routes.php');
    }
}
