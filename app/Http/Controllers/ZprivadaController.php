<?php

namespace App\Http\Controllers;

use App\Producto;

class ZprivadaController extends Controller
{
    public function productos()
    {
        $activo    = 'productos';
        $ready     = 0;
        $config    = 4;
        $productos = Producto::OrderBy('orden', 'ASC')->get();
        $aux       = Producto::orderBy('orden', 'ASC')->get();
        $prod      = $aux->toJson();
        return view('privada.productos', compact('activo', 'productos', 'ready', 'prod', 'config'));
    }

}
