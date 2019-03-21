<?php

namespace Submtd\LaravelTrackingCookie\Services;

class LaravelTrackingCookieService
{
    // sets a cookie
    public function setCookie($data, $name = null, $expires = null)
    {
        setcookie(
            $name ?? config('laravel-tracking-cookie.trackingCookieName', 'tracking'),
            json_encode($data),
            $expires ?? time() + config('laravel-tracking-cookie.trackingCookieExpiration', 2592000)
        );
    }

    // retrieves a cookie
    public function getCookie($name = null)
    {
        if (!isset($_COOKIE[$name ?? config('laravel-tracking-cookie.trackingCookieName', 'tracking')])) {
            return null;
        }
        return json_decode($_COOKIE[$name ?? config('laravel-tracking-cookie.trackingCookieName', 'tracking')]);
    }
}
