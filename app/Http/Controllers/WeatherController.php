<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\WeatherService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class WeatherController extends Controller
{

    public function index()
    {

        $params = [
            'q' => 'vietnam',
            'appid' => config('weather.weather_api.key'),
        ];

        $endpoint = Http::get((config('weather.weather_api.api')), $params);
        $weatherService = new WeatherService();
        $data = $weatherService->getWeatherData($endpoint);
        return view('weather', ['data' => $data]);
    }

    public function search_city(Request $request)
    {
        $searchKey = $request->input('searchCountry');
        $location = DB::table('weather_infor')->where('city', 'like', "%$searchKey%")->get(['city']);
        $arrLocation = $location->toArray();
        return  response()->json(['data_location' => $arrLocation]);
    }

    public function check_city(Request $request)
    {

        $city = $request->input('input_country');
        $slug = Str::slug($city, '');
        $params = [
            'q' => $slug,
            'appid' => config('weather.weather_api.key'),
        ];
        $endpoint = Http::get((config('weather.weather_api.api')), $params);
        $weatherService = new WeatherService();
        $data = $weatherService->getWeatherData($endpoint);
        return view('weather', ['data' => $data]);
    }
}
