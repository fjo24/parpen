<?php

namespace App\Http\Controllers\Adm;

use App\Destacado_home;
use App\Http\Requests\HomesRequest;
use App\Http\Controllers\Controller;

class DestacadohomesController extends Controller
{
    //'nombre', 'link', 'orden', 'imagen',
    public function index()
    {
        $destacados = Destacado_home::orderBy('orden', 'ASC')->get();
        return view('adm.destacadoshomes.index', compact('destacados'));
    }

    public function create()
    {
        return view('adm.destacadoshomes.create');
    }

    public function store(HomesRequest $request)
    {
        $destacados         = new Destacado_home();
        $destacados->nombre = $request->nombre;
        $destacados->link   = $request->link;
        $destacados->orden  = $request->orden;
        $id              = Destacado_home::all()->max('id');
        $id++;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/destacado_home/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $destacados->imagen = 'img/destacado_home/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $destacados->save();

        return view('adm.dashboard');
    }

    public function edit($id)
    {
        $destacado = Destacado_home::find($id);
        return view('adm.destacadoshomes.edit')
            ->with('destacado', $destacado);
    }

    public function update(HomesRequest $request, $id)
    {
        $destacados         = Destacado_home::find($id);
        $destacados->nombre = $request->nombre;
        $destacados->link   = $request->link;
        $destacados->orden  = $request->orden;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/destacado_home/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $destacados->imagen = 'img/destacado_home/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $destacados->update();

        return view('adm.dashboard');
    }

    public function destroy($id)
    {
        $slider = Destacado_home::find($id);
        $slider->delete();
        return redirect()->route('sliders.index');
    }

}
