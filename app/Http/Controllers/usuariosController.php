<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\usuariosRequest;
use App\Models\usuarios;

class usuariosController extends Controller
{
    public function show(){
        
        return view('auth.registrarUsuarios');

    }

    public function create(usuariosRequest $request){
        $usuario = usuarios::create($request->validated());

        return redirect('/login')->with('success', 'Cuenta creada correctamente');
    }
}
