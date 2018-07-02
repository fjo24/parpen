<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class BuscadorController extends Controller
{
    public function index() {
        $busca=0;
    	//$metadatos = Metadato::where('section','buscar')->get();
    	$active = 'buscar';
        return view('privada.productos', compact('metadatos','active','busca'));
    }

    public function getProducts (Request $request) {

        $busqueda = $request->pbuscar;

        $busca=1;
        $ready= 0;
        //$metadatos = Metadato::where('section','buscar')->get();
        $activo = 'productos';
        $productos = Producto::where('nombre', 'like', '%' . $busqueda . '%')->
        orwhere('codigo', 'like', '%' . $busqueda . '%')->get();
        return view('privada.productos', compact('productos','busqueda','busca','metadatos','activo', 'ready'));   


    }
}
