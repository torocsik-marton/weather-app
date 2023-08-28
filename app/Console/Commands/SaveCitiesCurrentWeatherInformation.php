<?php

namespace App\Console\Commands;

use App\Repositories\CityRepositoryInterface;
use App\Repositories\WeatherInformationRepository;
use App\Services\Weather\WeatherService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SaveCitiesCurrentWeatherInformation extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:save-cities-current-weather-information';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Saves all cities current weather information to the database.';


    /**
     * Execute the console command.
     */
    public function handle(
        WeatherService               $weather_service,
        WeatherInformationRepository $weather_information_repository,
        CityRepositoryInterface      $city_repository
    )
    {
        $cities = $city_repository->getAllCity();

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
