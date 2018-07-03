<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distribuidor;
use Illuminate\Support\Facades\DB;
use Redirect;

class DistribuidorController extends Controller
{
    public function index()
    {
        $activo = 'registro';
        
        return view('pages.registro', compact('activo'));
    }

    public function registroStore(Request $request)
    {

        $datos = $request->all();
        Distribuidor::create($datos);
        $success = 'Usuario creado correctamente';
        return Redirect::to('registro')->with('success', $success);
    }

    public function store(Request $request){

        $distribuidor = DB::table('distribuidores')->where('email', $request->input('email'))->first();
        if(isset($distribuidor))
        {
            if($distribuidor->password == $request->input('password'))
            {
                session(['distribuidor' => $distribuidor->id]);
                return redirect('zproductos');
            }
            else
            {
                $error = "El usuario y/o contraseña son invalidos";
                return back()->with('error');
            }
        }
        else
        {
            $error = "El usuario y/o contraseña son invalidos";
            return back()->with('error');
        }
    }

    public function loginDistribuidor(Request $request){
        if(isset($request->userdistribuidor)){

            $user = Distribuidor::where('userdistribuidor', $request->userdistribuidor)->first();
            dd('userdistribuidor');
            if($user && $user->password == ''){
                $email = $user->email;
                session(['email' => $email]);
                return Redirect::to('zproductos');
                echo "pass";
            }

            if(Auth::attempt(['userdistribuidor' => $request->userdistribuidor, 'password' => $request->password])){ //$request->password
                session()->flush();
                session(['name' => $user->name]);
                session(['email' => $user->email]);
                session(['telefono' => $user->telefono]);                

                return redirect()->route('zproductos');
                
            }
            else{
                return redirect()->route('zproductos');
            }
        }
        
        
    }


}   
