<?php

namespace App\Providers;

use App\Repositories\City\CityLocalRepository;
use App\Repositories\City\CityRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CityRepositoryInterface::class, function (){
            return $this->app->make(CityLocalRepository::class);
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
