<?php

namespace App\Providers;

use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('UserService', function ($app) {
            return new UserService();
        });
    }

    public function boot()
    {
        //
    }
}
