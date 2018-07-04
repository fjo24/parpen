<?php

namespace App\Http\Controllers\Adm;

use App\Categoria;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductosRequest;
use App\Imgproducto;
use App\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    //'nombre', 'codigo', 'descripcion', 'contenido', 'categoria_id', 'video', 'video_descripcion', 'precio', 'visible',

    public function index()
    {
        $productos = producto::orderBy('categoria_id', 'ASC')->get();
        return view('adm.productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.productos.create', compact('categorias'));
    }

    public function store(ProductosRequest $request)
    {
        $producto                    = new Producto();
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
        $producto->tipo           = $request->tipo;
        $producto->save();

        return redirect()->route('productos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categorias = Categoria::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        $producto   = Producto::find($id);
        return view('adm.productos.edit', compact('producto', 'categorias'));
    }

    public function update(ProductosRequest $request, $id)
    {
        $producto                    = Producto::find($id);
        $producto->nombre            = $request->nombre;
        $producto->orden             = $request->orden;
        $producto->embalaje          = $request->embalaje;
        $producto->medidas           = $request->medidas;
        $producto->codigo            = $request->codigo;
        $producto->descripcion       = $request->descripcion;
        $producto->contenido         = $request->contenido;
        $producto->categoria_id      = $request->categoria_id;
        $producto->video             = $request->video;
        $producto->video_descripcion = $request->video_descripcion;
        $producto->precio            = $request->precio;
        $producto->visible           = $request->visible;
        $producto->tipo           = $request->tipo;
        $producto->save();

        return redirect()->route('productos.index');
    }

    public function destroy($id)
    {
        $producto = producto::find($id);
        $producto->delete();
        return redirect()->route('productos.index');
    }

    //admin de imagenes
    public function imagenes($id)
    {
        $imagenes = Imgproducto::orderBy('id', 'ASC')->Where('producto_id', $id)->get();
        $producto = producto::find($id);
        return view('adm.productos.imagenes')->with(compact('imagenes', 'producto'));
    }

    public function nuevaimagen(Request $request, $id)
    {
        if ($request->HasFile('file')) {
            foreach ($request->file as $file) {
                $filename = $file->getClientOriginalName();
                $path     = public_path('img/producto/');
                $file->move($path, $id . '_' . $file->getClientOriginalName());
                $imagen              = new Imgproducto;
                $imagen->imagen   = 'img/producto/' . $id . '_' . $file->getClientOriginalName();
                $imagen->producto_id = $id;
                $imagen->save();
            }
        }
        $imagenes = Imgproducto::orderBy('id', 'ASC')->Where('producto_id', $id)->get();

        $producto = producto::find($id);
        return view('adm.productos.imagenes')->with(compact('imagenes', 'producto'));
    }

    public function destroyimg($id)
    {
        $imagen = Imgproducto::find($id);
        $idpro  = $imagen->producto_id;
        $imagen->delete();
        $imagenes = Imgproducto::orderBy('id', 'ASC')->Where('producto_id', $idpro)->get();

        $producto = producto::find($idpro);
        return view('adm.productos.imagenes')->with(compact('imagenes', 'producto'));
    }
}
