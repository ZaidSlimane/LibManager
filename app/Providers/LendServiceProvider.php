<?php

namespace App\Providers;

use App\Services\LendService;
use Illuminate\Support\ServiceProvider;

class LendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('LendService', function ($app) {
            return new LendService();
        });
    }
}
