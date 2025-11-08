<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function getWeatherData($params)
    {
        $default_params = [
            'city' => 'Ho Chi Minh City',
            'country_code' => 'VN',
            'temp' => '30',
            'humidty' => '70',
            'wind_speed' => '10',
            'weather' => 'Clouds',
        ];

        $error_params = [
            'city' => 'Unknown',
            'country_code' => 'Unknown',
            'temp' => 'Unknown',
            'humidty' => 'Unknown',
            'wind_speed' => 'Unknown',
            'weather' => 'Unknown',
        ];
        if ($params->json()['cod'] != "404") {
            $response = $params->json();
            $paramslocation = [

                'lat' => $response['coord']['lat'],
                'lon' => $response['coord']['lon'],
                'exclude' => 'current,minutely,hourly,alerts',
                'appid' => config('weather.weather_api.key'),
            ];

            $endpoint = Http::get((config('weather.weather_api.api')), $paramslocation);
            $responseweather = $endpoint->json();
            $paramsData = [
                'city' => '',
                'country_code' => $responseweather['sys']['country'] ?? 'Unknown',
                'temp' => $responseweather['main']['temp'] ?? 'Unknown',
                'humidty' => $responseweather['main']['humidity'] ?? 'Unknown',
                'wind_speed' => $responseweather['wind']['speed'] ?? 'Unknown',
                'weather' => $responseweather['weather'][0]['main'] ?? 'Unknown',
            ];
            $paramsData['temp'] = round($responseweather['main']['temp'] - 273.15, 0);
            if ($responseweather['sys']['country'] == 'VN') {
                $paramsData['city'] = 'Ho Chi Minh City';
                return ['data' => $paramsData, 'message' => 'success'];
            } else {
                $paramsData['city'] = $responseweather['name'] ?? 'Unknown';
                return ['data' => $paramsData, 'message' => 'success'];
            }
        } else {
            return ['data' => $default_params, 'message' => 'error'];
        }
    }
}
