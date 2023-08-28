<?php

namespace App\Providers;

use App\Repositories\WeatherInformationRepository;
use App\Repositories\WeatherInformationRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(WeatherInformationRepositoryInterface::class, WeatherInformationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
