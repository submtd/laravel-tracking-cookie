<?php

Route::any('track/{path}', function ($path) {
    // see if cookie is already set
    if (!$value = \Submtd\LaravelTrackingCookie\Facades\TrackingCookie::getCookie(config('laravel-tracking-cookie.trackingCookieName', 'tracking'))) {
        // if not set the value to the request input
        $value = json_encode(request()->all());
    }
    // set/reset the cookie
    \Submtd\LaravelTrackingCookie\Facades\TrackingCookie::setCookie($value);
    // redirect to the path provided
    return response()->redirectTo($path);
})->where('path', '.*');
