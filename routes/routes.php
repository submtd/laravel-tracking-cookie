<?php

Route::group(['namespace' => 'Submtd\LaravelTrackingPixel\Controllers', 'middleware' => 'web'], function () {
    Route::get('pixel.png', 'LaravelTrackingPixelController@pixel');
});
