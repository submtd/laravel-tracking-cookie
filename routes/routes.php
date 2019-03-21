<?php

Route::get('track/{path}', function ($path) {
    if (!$value = \Submtd\LaravelTrackingCookie\Facades\TrackingCookie::getCokie(config('laravel-tracking-cookie.trackingCookieName', 'tracking'))) {
        $value = json_encode(request()->all());
    }
    \Illuminate\Support\Facades\Log::error($value);
    \Submtd\LaravelTrackingCookie\Facades\TrackingCookie::setCookie($value);
    return response()->redirectTo($path);
})->where('path', '.*');
