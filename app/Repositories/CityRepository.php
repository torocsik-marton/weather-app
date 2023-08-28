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


    public function getCityByName(string $name): City
    {
        return City::where('name', $name)->first();
    }
}
