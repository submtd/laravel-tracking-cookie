<?php

namespace Submtd\LaravelTrackingPixel\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelTrackingPixelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // config
        $this->mergeConfigFrom(__DIR__ . '/../../config/laravel-tracking-pixel.php', 'laravel-tracking-pixel');
        $this->publishes([__DIR__ . '/../../config' => config_path()], 'config');
        // migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->publishes([__DIR__ . '/../../database' => database_path()], 'migrations');
        // routes
        $this->loadRoutesFrom(__DIR__ . '/../../routes/routes.php');
    }
}
