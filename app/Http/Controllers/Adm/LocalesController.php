<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Local;

class LocalesController extends Controller
{
    //'nombre', 'direccion', 'localidad', 'provincia', 'telefono', 'logitud', 'latitud',
    public function index()
    {
        $locales = Local::orderBy('nombre', 'ASC')->get();
        return view('adm.locales.index', compact('locales'));
    }

    public function create()
    {
        return view('adm.locales.create');
    }

    public function store(localsRequest $request)
    {

        $local            = new local();
        $local->nombre    = $request->nombre;
        $local->direccion = $request->direccion;
        $local->localidad = $request->localidad;
        $local->provincia = $request->provincia;
        $local->telefono  = $request->telefono;
        $local->logitud   = $request->logitud;
        $local->latitud   = $request->latitud;

        $local->save();
        return redirect()->route('locales.index');
    }

    public function edit($id)
    {
        $local = local::find($id);
        return view('adm.locales.index.edit', compact('local'));
    }

    public function update(localesRequest $request, $id)
    {
        $local            = local::find($id);
        $local->nombre    = $request->nombre;
        $local->direccion = $request->direccion;
        $local->localidad = $request->localidad;
        $local->provincia = $request->provincia;
        $local->telefono  = $request->telefono;
        $local->logitud   = $request->logitud;
        $local->latitud   = $request->latitud;

        $local->save();
        return redirect()->route('locales.index');
    }

    public function destroy($id)
    {
        $local = local::find($id);
        $local->delete();
        return redirect()->route('locales.index');
    }

}
