<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewslettersRequest;
use App\newsletter;
use App\Contenido_home;
use App\Destacado_home;
use App\Slider;

class NewslettersController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::orderBy('email', 'ASC')->get();
        return view('adm.newsletters.index', compact('newsletters'));
    }

    public function create()
    {
        return view('adm.newsletters.create');
    }

    public function store(NewslettersRequest $request)
    {
        $activo    = 'home';
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'home')->get();
        $bloque1   = Destacado_home::find(1);
        $bloque2   = Destacado_home::find(2);
        $bloque3   = Destacado_home::find(3);
        $bloque4   = Destacado_home::find(4);
        $contenido = Contenido_home::all()->first();
        
        $newsletter        = new Newsletter();
        $newsletter->email = $request->email;

        $newsletter->save();
        $success = 'Correo registrado correctamente';
        return view('pages.home', compact('sliders', 'servicios', 'banner', 'contenido', 'activo', 'bloque1', 'bloque2', 'bloque3', 'bloque4', 'success'));
    }

    public function edit($id)
    {
        $newsletter = Newsletter::find($id);
        return view('adm.newsletters.edit', compact('newsletter'));
    }

    public function update(NewslettersRequest $request, $id)
    {
        $newsletter =
        Newsletter::find($id);
        $newsletter->email = $request->email;

        $newsletter->save();
        return redirect()->route('newsletters.index');
    }

    public function destroy($id)
    {
        $newsletter = Newsletter::find($id);
        $newsletter->delete();
        return redirect()->route('newsletters.index');
    }
}
