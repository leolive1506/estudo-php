<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // View::share('nome_da_inforamação', 'valor_dela');
        View::share('versao', '1.0');
        // Blade::component('pasta.arquivo_da_view', 'atalho')
        Blade::component('components.alert', 'alert');
    }
}