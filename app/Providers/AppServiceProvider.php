<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\CartHelper;
use App\Helpers\PaymentHelper;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            // Passer le nom de la vue actuelle à toutes les pages
            $view_name = str_replace('.', '-', $view->getName());
            // Récupération du nombre total de produit dans le panier
            $nombre_prod = CartHelper::getNombreProd();
            // Partage à toutes les vues
            view()->share([
                'view_name' => $view_name,
                'nombre_prod' => $nombre_prod,
            ]);
        });
    }
}
