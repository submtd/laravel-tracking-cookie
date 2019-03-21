<?php

use Illuminate\Support\Facades\Log;

Route::get('track/{image}', function ($image) {
    if (!$value = request()->cookie(config('laravel-tracking-cookie.trackingCookieName', 'tracking'))) {
        $value = json_encode(request()->all());
    }
    Log::error($value);
    return response()
        ->file($image)
        ->cookie(
            config('laravel-tracking-cookie.trackingCookieName', 'tracking'),
            $value,
            config('laravel-tracking-cookie.trackingCookieLifetime', 43200)
        );
})->where('image', '.*');
