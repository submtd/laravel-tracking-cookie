<?php

Route::any('track/{path}', function ($path) {
    // see if cookie is already set
    if (!$value = \Submtd\LaravelTrackingCookie\Facades\TrackingCookie::getCookie(config('laravel-tracking-cookie.trackingCookieName', 'tracking'))) {
        // if not set the value to the request input
        $value = json_encode(request()->all());
    }
    // set/reset the cookie
    $name = isset($value['name']) ? $value['name'] : config('laravel-tracking-cookie.trackingCookieName', 'tracking');
    $expires = isset($value['expires']) ? $value['expires'] : config('laravel-tracking-cookie.trackingCookieLifetime', 2592000);
    $domain = isset($value['domain']) ? $value['domain'] : request()->getHost();
    \Submtd\LaravelTrackingCookie\Facades\TrackingCookie::setCookie($value, $name, $expires, $domain);
    // redirect to the path provided
    return response()->redirectTo($path);
})->where('path', '.*');
