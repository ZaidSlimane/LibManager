<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\BookService;

class BookServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('bookservice', function ($app) {
            return new BookService();
        });
    }

    public function boot()
    {
        //
    }
}
