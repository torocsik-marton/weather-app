<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\WeatherInformation;
use App\Repositories\WeatherInformationRepository;
use App\Services\Weather\WeatherService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
    public function handle(WeatherService $weather_service, WeatherInformationRepository $weather_information_repository)
    {
        $cities = City::get();

        foreach ($cities as $city) {
            try {
                $weather_data = $weather_service->getCurrentWeatherByCoordinates($city->latitude, $city->longitude);
                $weather_information_repository->createWeatherInformation($weather_data, $city);
            } catch (\Exception $exception) {
                Log::error($exception);
            }
        }
    }
}
