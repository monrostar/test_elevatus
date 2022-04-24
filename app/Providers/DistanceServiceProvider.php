<?php

namespace App\Providers;

use App\Services\DistanceService;
use App\Services\HammingAlgorithmProvider;
use App\Services\LevenshteinAlgorithmProvider;
use Illuminate\Support\ServiceProvider;

class DistanceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->app->singleton(HammingAlgorithmProvider::class, function ($app) {
            return new DistanceService(new HammingAlgorithmProvider());
        });

        $this->app->singleton(LevenshteinAlgorithmProvider::class, function ($app) {
            return new DistanceService(new LevenshteinAlgorithmProvider());
        });
    }
}
