<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    public function weather_information(): HasMany
    {
        return $this->hasMany(WeatherInformation::class);
    }
}
