<?php


namespace App\Repositories;


use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityRepository implements CityRepositoryInterface
{

    public function getAllCity(): Collection
    {
        return City::get();
    }
}
