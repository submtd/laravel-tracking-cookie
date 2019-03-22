<?php

Route::any('track/{path}', function ($path) {
    // see if cookie is already set
    if (!$data = \Illuminate\Support\Facades\Cookie::get('tracking')) {
        $data = json_encode(request()->all());
    }
    // set the cookie
    \Illuminate\Support\Facades\Cookie::queue(
        'tracking', // name
        $data, // value
        config('laravel-tracking-cookie.trackingCookieLifetime', 43200), // minutes
        '/', // path
        implode('.', array_slice(explode('.', request()->getHost()), -2, 2)),
        config('laravel-tracking-cookie.useSecureCookie', false),
        config('laravel-tracking-cookie.httpOnly', false)
    );
    // redirect to the path provided
    return response()->redirectTo($path);
})->where('path', '.*');
