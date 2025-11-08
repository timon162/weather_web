<?php

return [

    'weather_api' => [
        'api' => env('API_WEATHER', ''),
        'key' => env('KEY_WEATHER', ''),
    ],

    'daily_weather_api' => [
        'api' => env('API_DAILY_WEATHER', ''),
    ],

    'location_api' => [
        'api' => env('API_LOCATION', ''),
    ],

];
