<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\WeatherInformation;
use App\Services\Weather\WeatherService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SaveWeatherInformation extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:save-weather-information';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    /**
     * Execute the console command.
     */
    public function handle(WeatherService $weather_service)
    {
        $cities = City::get();

        foreach ($cities as $city) {
            $weather_data = $weather_service->getCurrentWeatherByCoordinates($city->latitude, $city->longitude);

            $weather_information                   = new WeatherInformation();
            $weather_information->city_id          = $city->id;
            $weather_information->name             = $weather_data->name;
            $weather_information->latitude         = $weather_data->latitude;
            $weather_information->longitude        = $weather_data->longitude;
            $weather_information->time             = now();
            $weather_information->temp_celsius     = $weather_data->temp_celsius;
            $weather_information->max_temp_celsius = $weather_data->max_temp_celsius;
            $weather_information->min_temp_celsius = $weather_data->min_temp_celsius;
            $weather_information->pressure         = $weather_data->pressure;
            $weather_information->humidity         = $weather_data->humidity;

            $weather_information->save();
        }
    }
}
