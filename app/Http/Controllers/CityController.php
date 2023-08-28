<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Repositories\CityRepositoryInterface;
use Illuminate\Http\JsonResponse;

class CityController extends Controller
{

    public function getCity(City $city): JsonResponse
    {
        $response                    = $city->toArray();
        $response['current_weather'] = $city->weather_information->last();

        return response()->json($response);
    }


    public function getWeatherInformation($city_name, CityRepositoryInterface $city_repository): JsonResponse
    {
        $city = $city_repository->getCityByName($city_name);

        if (empty($city)) {
            return response('Resource not found.', 404)->json();
        }

        $response                        = $city->toArray();
        $response['weather_information'] = $city->weather_information->where('time', '>=', now()->subHours(24));

        return response()->json($response);
    }
}
