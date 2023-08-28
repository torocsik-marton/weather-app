<?php


namespace App\Repositories;


use App\DTOs\WeatherData;
use App\Models\City;
use App\Models\WeatherInformation;

interface WeatherInformationRepositoryInterface
{
    public function createWeatherInformation(WeatherData $weather_data, City $city) :WeatherInformation;
}
