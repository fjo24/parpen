<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Dato;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);

        $telefono    = Dato::where('tipo', 'telefono')->first();
        $telefono2   = Dato::where('tipo', 'telefono2')->first();
        $direccion   = Dato::where('tipo', 'direccion')->first();
        $email       = Dato::where('tipo', 'email')->first();

        view()->share([
            'telefono'    => $telefono,
            'telefono2'   => $telefono2,
            'direccion'   => $direccion,
            'email'       => $email,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
