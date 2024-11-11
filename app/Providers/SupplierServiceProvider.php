<?php

namespace App\Providers;

use App\Services\SupplierService;
use Illuminate\Support\ServiceProvider;

class SupplierServiceProvider extends ServiceProvider
{
    /**
     * Enregistrement du service SupplierService dans le conteneur d'applications.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('SupplierService', function ($app) {
            return new SupplierService();
        });
    }
}
