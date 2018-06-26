<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Categoria_obra;
use App\Cliente;
use App\Consejo;
use App\Dato;
use App\Novedad;
use App\Destacado_empresa;
use App\Destacado_home;
use App\Destacado_mantenimiento;
use App\Obra;
use App\Obra_imagen;
use App\Producto;
use App\Servicio;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaginasController extends Controller
{
    public function home()
    {
        $activo    = 'mantenimiento';
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'home')->get();
        $contenido = Destacado_home::all()->first();
        return view('pages.home', compact('sliders', 'servicios', 'banner', 'contenido', 'activo'));
    }

    public function productos()
    {
        $activo        = 'producto';
        $categorias    = Categoria::where('id_superior', null)->orderBy('orden', 'asc')->get();
        $subcategorias = Categoria::whereNotNull('id_superior')->orderBy('orden', 'asc')->get();
        $productos     = Producto::orderBy('categoria_id')->get();
        $todos         = Producto::OrderBy('orden', 'ASC')->get();

        return view('pages.productos', compact('categorias', 'subcategorias', 'productos', 'productos_directos', 'activo', 'todos'));
    }

    public function categorias($id)
    {
        $ref           = $id;
        $cat           = Categoria::find($id);
        $activo        = 'producto';
        $categorias    = Categoria::where('id_superior', null)->orderBy('orden', 'asc')->get();
        $subcategorias = Categoria::whereNotNull('id_superior')->orderBy('orden', 'asc')->get();
        $productos     = Producto::orderBy('categoria_id')->get();
        $todos         = Producto::where('categoria_id', $id)->OrderBy('orden', 'ASC')->get();

        return view('pages.categorias', compact('categorias', 'subcategorias', 'productos', 'productos_directos', 'activo', 'todos', 'ref', 'cat'));
    }

    public function subcategorias($id)
    {
        $sub           = Categoria::find($id);
        $subref        = $sub->id;
        $ref           = $sub->id_superior;
        $cat           = Categoria::find($ref);
        $activo        = 'producto';
        $categorias    = Categoria::where('id_superior', null)->orderBy('orden', 'asc')->get();
        $subcategorias = Categoria::whereNotNull('id_superior')->orderBy('orden', 'asc')->get();
        $productos     = Producto::orderBy('categoria_id')->get();
        $todos         = Producto::where('categoria_id', $id)->OrderBy('orden', 'ASC')->get();

        return view('pages.subcategorias', compact('categorias', 'subcategorias', 'productos', 'productos_directos', 'activo', 'todos', 'ref', 'subref', 'sub', 'cat'));
    }

    public function productoinfo($id)
    {
        $p = Producto::find($id);
        $idsub    = $p->categoria_id;
        $sub      = Categoria::find($idsub);
        if ($sub->id_superior != null) {
            $cat = Categoria::find($sub->id_superior);
        }else{
            $cat = Categoria::find($idsub);
        }
        $ready = 0;
        $relacionados = Producto::OrderBy('orden', 'ASC')->Where('categoria_id', $p->categoria_id)->get();
        $subref        = $sub->id;
        $ref           = $sub->id_superior;
        $activo        = 'producto';
        $categorias    = Categoria::where('id_superior', null)->orderBy('orden', 'asc')->get();
        $subcategorias = Categoria::whereNotNull('id_superior')->orderBy('orden', 'asc')->get();
        $productos     = Producto::orderBy('categoria_id')->get();

        return view('pages.producto', compact('categorias', 'subcategorias', 'productos', 'productos_directos', 'ready', 'activo', 'ref', 'subref', 'sub', 'cat', 'p', 'relacionados'));
    }

    public function novedades($tipo)
    {
        $activo    = 'novedades';
        $tipon = $tipo;
        $ready = 0;
        $novedades = Novedad::OrderBy('orden', 'ASC')->get();
        return view('pages.novedades', compact('tipon', 'novedades', 'activo', 'ready'));
    }

    public function empresa()
    {
        $activo    = 'empresa';
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'empresa')->get();
        $contenido = Destacado_empresa::all()->first();
        return view('pages.empresa', compact('sliders', 'contenido', 'activo'));
    }

}