<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeatherInformation extends Model
{

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
