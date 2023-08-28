<?php

namespace App\Services\Weather;

use App\DTOs\WeatherData;

interface WeatherService
{


    public function getCurrentWeatherByCoordinates(float $latitude, float $longitude): WeatherData;
}
