<?php


namespace App\Repositories;


use App\DTOs\WeatherData;
use App\Models\City;
use App\Models\WeatherInformation;

class WeatherInformationRepository implements WeatherInformationRepositoryInterface
{

    public function createWeatherInformation(WeatherData $weather_data, City $city): WeatherInformation
    {
        return WeatherInformation::create([
           array_merge(
               $weather_data->toArray(),
               ['city_id' => $city->id]
           )
        ]);
    }
}
