<?php

namespace App\Http\Controllers\Adm;

use App\Catalogo;
use App\Http\Controllers\Controller;

class CatalogosController extends Controller
{
    public function index()
    {
        $catalogos = Catalogo::orderBy('orden', 'ASC')->get();
        return view('adm.catalogos.index', compact('catalogos'));
    }

    public function create()
    {
        return view('adm.catalogos.create');
    }

    public function store(CatalogosRequest $request)
    {

        $catalogo         = new Catalogo();
        $catalogo->nombre = $request->nombre;
        $id               = Catalogo::all()->max('id');
        $id++;
        if ($request->hasFile('pdf')) {
            if ($request->file('pdf')->isValid()) {
                $file = $request->file('pdf');
                $path = public_path('file/catalogos/');
                $request->file('pdf')->move($path, $id . '_' . $file->getClientOriginalName());
                $catalogo->pdf = 'file/catalogos/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $catalogo->save();
        return redirect()->route('catalogos.index');
    }

    public function edit($id)
    {
        $catalogo = catalogo::find($id);
        return view('adm.catalogos.edit', compact('catalogo'));
    }

    public function update(catalogosRequest $request, $id)
    {
        $catalogo         = catalogo::find($id);
        $id               = catalogo::all()->max('id');
        $catalogo->nombre = $request->nombre;
        $id++;
        if ($request->hasFile('file')) {
            if ($request->file('pdf')->isValid()) {
                $file = $request->file('pdf');
                $path = public_path('file/catalogos/');
                $request->file('pdf')->move($path, $id . '_' . $file->getClientOriginalName());
                $catalogo->pdf = 'file/catalogos/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $catalogo->save();
        return redirect()->route('catalogos.index');
    }

    public function destroy($id)
    {
        $catalogo = Catalogo::find($id);
        $catalogo->delete();
        return redirect()->route('catalogos.index');
    }

    public function downloadPdf($id)
    {
        $catalogo = Catalogo::find($id);
        $path     = public_path();
        $url      = $path . 'file/catalogos/' . $catalogo->pdf;
        return response()->download($url);
        return redirect()->route('catalogos.index');
    }
}
