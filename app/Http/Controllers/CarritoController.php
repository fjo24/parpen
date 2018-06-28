<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;

class CarritoController extends Controller
{
    public function store(Request $request)
    {
    	$pedido = new Pedido();
    	$hoy = \Carbon\Carbon::now();
    	dd($hoy);
        /*$producto                    = new Producto();
        $producto->nombre            = $request->nombre;
        $producto->codigo            = $request->codigo;
        $producto->orden             = $request->orden;
        $producto->embalaje             = $request->embalaje;
        $producto->medidas           = $request->medidas;
        $producto->descripcion       = $request->descripcion;
        $producto->contenido         = $request->contenido;
        $producto->categoria_id      = $request->categoria_id;
        $producto->video             = $request->video;
        $producto->video_descripcion = $request->video_descripcion;
        $producto->precio            = $request->precio;
        $producto->visible           = $request->visible;
        $producto->save();

        return redirect()->route('productos.index');*/
    }
}
