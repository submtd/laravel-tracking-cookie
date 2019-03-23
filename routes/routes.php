<?php

Route::any('track/{path?}', function ($path = null) {
    // honor do not track header
    if (config('laravel-tracking-cookie.honorDoNotTrack', true) && request()->header('Dnt')) {
        return response()->redirectTo($path ?? '/');
    }
    // see if cookie is already set
    if (!$data = request()->cookie(config('laravel-tracking-cookie.cookieName', 'tracking'))) {
        $data = json_encode(request()->all());
    }
    // redirect to the path provided
    return response()->redirectTo($path ?? '/')->cookie(
        config('laravel-tracking-cookie.cookieName', 'tracking'), // name
        $data, // value
        config('laravel-tracking-cookie.cookieLifetime', 43200), // expires
        config('laravel-tracking-cookie.cookiePath', '/'), // path
        implode('.', array_slice(explode('.', request()->getHost()), -2, 2)),
        config('laravel-tracking-cookie.useSecureCookie', false),
        config('laravel-tracking-cookie.httpOnly', false)
    );
})->where('path', '.*');

Route::get('readtracking', function () {
    return request()->cookie(config('laravel-tracking-cookie.cookieName', 'tracking'));
});

Route::get('removetracking', function () {
    return response('removed')->cookie(
        config('laravel-tracking-cookie.cookieName', 'tracking'),
        '',
        -36000,
        config('laravel-tracking-cookie.cookiePath', '/'),
        implode('.', array_slice(explode('.', request()->getHost()), -2, 2))
    );
});
