<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistribuidorController extends Controller
{
    public function loginInvitado(Request $request){


// 'name', 'username', 'email', 'nivel', 'password',
        if(isset($request->usuario)){
            $user = User::where('username', $request->username)->first();
            echo "si";

            if(Auth::attempt(['username' => $request->username, 'password' => $request->password, 'activo' => 1])){ //$request->password
                session(['cliente' => 1]);
                session(['nombre' => $user->nombre]);
                session(['apellido' => $user->apellido]);
                session(['email' => $user->email]);
                session(['telefono' => $user->telefono]);
                session(['tipo_cliente' => $user->tipo_cliente]);
                session(['mayorista' => $user]);
                echo "usuario";
            }
        }else{
        	session(['cliente' => 1]);
        	session(['nombre' => $request->nombre]);
        	session(['email' => $request->email]);
            session(['tipo_cliente' => 1]);
            echo "no";
        }

    	return back();
    }
    public function loginDistribuidor(LogDistRequest $request){
        if(isset($request->usuario)){

            $user = User::where('usuario', $request->usuario)->first();
            if($user && $user->password == ''){
                $email = $user->email;
                session(['email' => $email]);
                return Redirect::to('recuperar');
                echo "pass";
            }

            if(Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password, 'activo' => 1, 'tipo_cliente' => 2]) || Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password, 'activo' => 1, 'tipo_cliente' => 3]) || Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password, 'activo' => 1, 'tipo_cliente' => 4]) || Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password, 'activo' => 1, 'tipo_cliente' => 5])){ //$request->password
                session()->flush();
                session(['cliente' => 1]);
                session(['nombre' => $user->nombre]);
                session(['apellido' => $user->apellido]);
                session(['email' => $user->email]);
                session(['telefono' => $user->telefono]);
                session(['tipo_cliente' => $user->tipo_cliente]);
                session(['mayorista' => $user]);

                

                return redirect()->route('guardado', 1);
                
            }
            else{
                return redirect()->route('guardado', 2);
            }
        }
        
        
    }

    public function logout(){
    	session()->flush();
        return Redirect::to('/');
    }
}
