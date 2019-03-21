<?php

namespace Submtd\LaravelTrackingPixel\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LaravelTrackingPixelController extends Controller
{
    public function pixel(Request $request)
    {
        if (!$value = $request->cookie(config('laravel-tracking-pixel.trackingCookieName', 'tracking'))) {
            $value = json_encode($request->all());
        }
        Log::error($value);
        return response(
            base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAAA1BMVEUAAACnej3aAAAAAXRSTlMAQObYZgAAAApJREFUCNdjYAAAAAIAAeIhvDMAAAAASUVORK5CYII=')
        )->header(
            'Content-Type',
            'img/png'
        )->cookie(
            config('laravel-tracking-pixel.trackingCookieName', 'tracking'),
            $value,
            config('laravel-tracking-pixel.trackingCookieLifetime', 43200)
        );
    }
}
