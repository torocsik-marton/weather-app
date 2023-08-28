<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\WeatherInformation;
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
    public function handle()
    {
        $cities = City::get();

        foreach ($cities as $city) {
            $response = Http::get(env('OPEN_WEATHER_API_ENDPOINT') . 'data/2.5/weather?lat=' . $city->latitude . '&lon=' . $city->longitude . '&appid=' . env('OPEN_WEATHER_API_KEY') . '&units=metric');

            if (!$response->ok()) {
                continue;
            }

            $open_weather_content = $response->json();

            $weather_information                   = new WeatherInformation();
            $weather_information->city_id          = $city->id;
            $weather_information->name             = $open_weather_content['weather'][0]['main'];
            $weather_information->latitude         = $open_weather_content['coord']['lat'];
            $weather_information->longitude        = $open_weather_content['coord']['lon'];
            $weather_information->time             = now();
            $weather_information->temp_celsius     = $open_weather_content['main']['temp'];
            $weather_information->max_temp_celsius = $open_weather_content['main']['temp_max'];
            $weather_information->min_temp_celsius = $open_weather_content['main']['temp_min'];
            $weather_information->pressure         = $open_weather_content['main']['pressure'];
            $weather_information->humidity         = $open_weather_content['main']['humidity'];

            $weather_information->save();
        }
    }
}
