<?php


namespace App\Services\Weather;


use App\DTOs\WeatherData;
use Exception;
use Illuminate\Support\Facades\Http;

class OpenWeatherService implements WeatherService
{

    private string $endpoint_url;
    private string $api_key;


    public function __construct()
    {
        $this->endpoint_url = env('OPEN_WEATHER_API_ENDPOINT');
        $this->api_key      = env('OPEN_WEATHER_API_KEY');
    }


    /**
     * @throws Exception
     */
    public function getCurrentWeatherByCoordinates(float $latitude, float $longitude): WeatherData
    {
        $response = Http::get($this->getCurrentWeatherDataURL($latitude, $longitude));

        if (!$response->ok()) {
            throw new Exception('Open weather API is unavailable. Status code: ' . $response->status());
        }

        $response_content = $response->json();

        return new WeatherData(
            name: $response_content['weather'][0]['main'],
            latitude: $response_content['coord']['lat'],
            longitude: $response_content['coord']['lon'],
            time: now(),
            temp_celsius: $response_content['main']['temp'],
            max_temp_celsius: $response_content['main']['temp_max'],
            min_temp_celsius: $response_content['main']['temp_min'],
            pressure: $response_content['main']['pressure'],
            humidity: $response_content['main']['humidity'],
        );
    }


    /**
     * @param float $latitude
     * @param float $longitude
     * @return string
     */
    private function getCurrentWeatherDataURL(float $latitude, float $longitude): string
    {
        return $this->endpoint_url . 'data/2.5/weather?lat=' . $latitude . '&lon=' . $longitude . '&appid=' . $this->api_key . '&units=metric';
    }
}
