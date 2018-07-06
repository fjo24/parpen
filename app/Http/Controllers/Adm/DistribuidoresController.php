<?php

namespace App\Http\Controllers\Adm;

use App\Distribuidor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistribuidoresController extends Controller
{
    //'name', 'username', 'email', 'telefono', 'password',

    public function index()
    {
        $distribuidores = Distribuidor::orderBy('nombre', 'ASC')->paginate(5);
        return view('adm.user.index')
            ->with('distribuidores', $distribuidores);
    }

    public function create()
    {
        return view('adm.distribuidores.create');
    }

    public function store(Request $request)
    {
        $distribuidor            = new User();
        $distribuidor->username  = $request->username;
        $distribuidor->name    = $request->name;
        $distribuidor->apellido  = $request->apellido;
        $distribuidor->social    = $request->social;
        $distribuidor->cuit      = $request->cuit;
        $distribuidor->telefono  = $request->telefono;
        $distribuidor->direccion = $request->direccion;
        $distribuidor->lat       = $request->lat;
        $distribuidor->lng       = $request->lng;
        $distribuidor->email     = $request->email;
        $distribuidor->telefono  = $request->telefono;
        $distribuidor->password  = \Hash::make($request->password);
        $distribuidor->save();

        $distribuidor = User::orderBy('id', 'ASC')->paginate(10);
        return view('adm.distribuidores.index')
            ->with('distribuidor', $distribuidor);
    }

    public function edit($id)
    {
        $distribuidor = User::find($id);
        return view('adm.distribuidores.edit')
            ->with('distribuidor', $distribuidor);
    }

    public function update(Request $request, $id)
    {
        $distribuidor            = new User();
        $distribuidor->username  = $request->username;
        $distribuidor->name    = $request->name;
        $distribuidor->apellido  = $request->apellido;
        $distribuidor->social    = $request->social;
        $distribuidor->cuit      = $request->cuit;
        $distribuidor->telefono  = $request->telefono;
        $distribuidor->direccion = $request->direccion;
        $distribuidor->lat       = $request->lat;
        $distribuidor->lng       = $request->lng;
        $distribuidor->email     = $request->email;
        $distribuidor->telefono  = $request->telefono;
        $distribuidor->password  = \Hash::make($request->password);
        $distribuidor->save();

        $distribuidores = User::orderBy('id', 'ASC')->paginate(10);
        return view('adm.distribuidores.index')
            ->with('distribuidores', $distribuidores);
    }

    public function destroy($id)
    {
        $Distribuidor = User::find($id);
        $Distribuidor->delete();
        return redirect()->route('distribuidores.index');
    }
}
