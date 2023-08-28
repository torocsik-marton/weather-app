<?php


namespace App\DTOs;


use Carbon\Carbon;
use Spatie\LaravelData\Data;

class WeatherData extends Data
{
    public function __construct(
        public string $name,
        public float $latitude,
        public float $longitude,
        public Carbon $time,
        public float $temp_celsius,
        public float $max_temp_celsius,
        public float $min_temp_celsius,
        public int $pressure,
        public int $humidity
    ) {
    }
}
