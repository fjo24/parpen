<?php

namespace App\Http\Controllers\Adm;

use App\Categoria;
use App\Http\Controllers\Controller;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = categoria::orderBy('orden', 'ASC')->get();
        return view('adm.categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('adm.categorias.create');
    }

    public function store(CategoriasRequest $request)
    {

        $categoria              = new Categoria();
        $categoria->id_superior = $request->id_superior;
        $categoria->nombre      = $request->nombre;
        $categoria->orden       = $request->orden;
        $id                     = Categoria::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/categoria/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $categoria->imagen = 'img/categoria/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $categoria->save();
        return redirect()->route('categorias.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('adm.categorias.edit', compact('categoria'));
    }

    public function update(CategoriasRequest $request, $id)
    {
        $categoria              = Categoria::find($id);
        $categoria->id_superior = $request->id_superior;
        $categoria->nombre      = $request->nombre;
        $categoria->orden       = $request->orden;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/categoria/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $categoria->imagen = 'img/categoria/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $categoria->save();
        return redirect()->route('categorias.index');
    }

    public function destroy($id)
    {
        $categoria = categoria::find($id);
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
