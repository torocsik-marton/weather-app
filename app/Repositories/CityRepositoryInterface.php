<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;

interface CityRepositoryInterface
{
    public function getAllCity(): Collection;
}
