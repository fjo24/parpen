<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(5);
        return view('adm.user.index')
            ->with('users', $users);
    }

    public function create()
    {
        return view('adm.user.create');
    }

    public function store(Request $request)
    {
        $usuario           = new User();
        $usuario->name     = $request->name;
        $usuario->username = $request->username;
        $usuario->email    = $request->email;
        $usuario->nivel    = $request->nivel;
        $usuario->password = \Hash::make($request->password);
        $usuario->save();

        $users = User::orderBy('id', 'ASC')->paginate(10);
        return view('adm.user.index')
            ->with('users', $users);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = user::find($id);
        return view('adm.user.edit')
            ->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $usuario           = User::find($id);
        $usuario->name     = $request->name;
        $usuario->username = $request->username;
        $usuario->email    = $request->email;
        $usuario->nivel    = $request->nivel;
        if ($request->password != $usuario->password) {
            $usuario->password = \Hash::make($request->password);
        }

        $usuario->save();

        $users = User::orderBy('id', 'ASC')->paginate(10);
        return view('adm.user.index')
            ->with('users', $users);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
