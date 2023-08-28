<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cities/{city}', '\App\Http\Controllers\CityController@getCity');
Route::get('/cities/{city_name}/weather-information', '\App\Http\Controllers\CityController@getWeatherInformation');
