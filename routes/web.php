<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/', [WeatherController::class, 'index'])->name('weather.index');
Route::post('/', [WeatherController::class, 'check_city'])->name('weather.check_city');
Route::post('/search_city', [WeatherController::class, 'search_city'])->name('weather.search_city');
