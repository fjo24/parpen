<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZprivadaController extends Controller
{
    public function productos()
    {
        $activo    = 'productos';
        return view('privada.productos', compact('activo'));
    }
}
