<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RedesController extends Controller
{
    //'nombre', 'link',
    public function index()
    {
        $redes = Red::orderBy('nombre', 'ASC')->get();
        return view('adm.redes.index', compact('redes'));
    }

    public function create()
    {
        return view('adm.redes.create');
    }

    public function store(redesRequest $request)
    {

        $red        = new red();
        $red->nombre = $request->nombre;
        $red->link = $request->link;

        $red->save();
        return redirect()->route('redes.index');
    }

    public function edit($id)
    {
        $red = red::find($id);
        return view('adm.redes.edit', compact('red'));
    }

    public function update(redesRequest $request, $id)
    {
        $red =
        red::find($id);
        $red->nombre = $request->nombre;
        $red->link = $request->link;

        $red->save();
        return redirect()->route('redes.index');
    }

    public function destroy($id)
    {
        $red = Red::find($id);
        $red->delete();
        return redirect()->route('redes.index');
    }
}