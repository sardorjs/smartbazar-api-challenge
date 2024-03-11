<?php

namespace App\Providers;

use App\Repositories\City\CityLocalRepository;
use App\Repositories\City\CityRepositoryInterface;
use App\Repositories\Merchant\MerchantLocalRepository;
use App\Repositories\Merchant\MerchantRepositoryInterface;
use App\Repositories\Rayon\RayonLocalRepository;
use App\Repositories\Rayon\RayonRepositoryInterface;
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
        $this->app->bind(RayonRepositoryInterface::class, function (){
            return $this->app->make(RayonLocalRepository::class);
        });
        $this->app->bind(MerchantRepositoryInterface::class, function (){
            return $this->app->make(MerchantLocalRepository::class);
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
