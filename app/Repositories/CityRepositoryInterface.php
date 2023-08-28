<?php


namespace App\Repositories;


use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

interface CityRepositoryInterface
{

    public function getAllCity(): Collection;


    public function getCityByName(string $name): City;
}
