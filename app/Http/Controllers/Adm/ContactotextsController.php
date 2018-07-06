<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contactotext;

class ContactotextsController extends Controller
{
	 public function create()
    {
        $contacto = Contactotext::all()->first();
        return redirect()->route('contacto.edit', $contacto->id);
    }

    public function edit($id)
    {
        $contacto = Contactotext::find($id);
        return view('adm.contacto.edit')
            ->with('contacto', $contacto);
    }

    public function update(Request $request, $id)
    {
        $contacto              = Contactotext::find($id);
        $contacto->contenido      = $request->contenido;
        $contacto->update();

        return view('adm.dashboard');
    }
}
