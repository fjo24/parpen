<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ZprivadaController extends Controller
{
    public function productos()
    {
        $activo    = 'productos';
        $ready = 0 ;
        $productos = Producto::OrderBy('orden', 'ASC')->get();
        $aux = Product::orderBy('name', 'ASC')->get();
        $prod = $aux->toJson();
        return view('privada.productos', compact('activo', 'productos', 'ready', 'prod'));
    }

    

}
