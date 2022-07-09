<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\usuariosRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class usuariosController extends Controller
{
    public function show(){
        if(Auth::check()){
            return redirect('/home');
        }
        return view('auth.registrarUsuarios');
    }

    public function create(usuariosRequest $request){
        $usuario = User::create($request->validated());

        return redirect('/login')->with('success', 'Cuenta creada correctamente');
    }
}
