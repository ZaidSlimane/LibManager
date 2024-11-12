<?php

namespace App\Providers;

use App\Services\LibraryService;
use Illuminate\Support\ServiceProvider;

class LibraryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Enregistrer le service LibraryService en tant que singleton
        $this->app->singleton('LibraryService', function ($app) {
            return new LibraryService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Vous pouvez ajouter ici tout autre code de démarrage si nécessaire
    }
}
