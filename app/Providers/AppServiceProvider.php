<?php

namespace App\Providers;

use App\Categoria;
use App\Dato;
use App\Red;
use App\Producto;
use Illuminate\Support\ServiceProvider;

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

        $productosoferta = Producto::Where('tipo', 'oferta')->orderBy('orden', 'asc')->limit(8)->get();
        $subcategorias = Categoria::whereNotNull('id_superior')->orderBy('orden', 'asc')->get();
        $categorias    = Categoria::where('id_superior', null)->orderBy('orden', 'asc')->get();
        $telefono   = Dato::where('tipo', 'telefono')->first();
        $telefono2  = Dato::where('tipo', 'telefono2')->first();
        $direccion  = Dato::where('tipo', 'direccion')->first();
        $instagram  = Red::where('nombre', 'instagram')->first();
        $facebook   = Red::where('nombre', 'facebook')->first();
        $youtube    = Red::where('nombre', 'youtube')->first();
        $email      = Dato::where('tipo', 'email')->first();

        view()->share([
            'telefono'   => $telefono,
            'telefono2'  => $telefono2,
            'direccion'  => $direccion,
            'email'      => $email,
            'categorias' => $categorias,
            'subcategorias' => $subcategorias,
            'instagram'  => $instagram,
            'facebook'   => $facebook,
            'youtube'    => $youtube,
            'productosoferta' => $productosoferta,
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
