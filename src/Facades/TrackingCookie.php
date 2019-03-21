<?php

namespace Submtd\LaravelTrackingCookie\Facades;

use Illuminate\Support\Facades\Facade;

class TrackingCookie extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'trackingCookie';
    }
}
