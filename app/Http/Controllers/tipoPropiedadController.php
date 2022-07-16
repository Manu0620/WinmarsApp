<?php

namespace App\Http\Controllers;

use App\Http\Requests\tipoPropiedadRequest;
use App\Models\tipo_propiedades;
use Illuminate\Http\Request;

class tipoPropiedadController extends Controller
{
    public function show(){
        return view('fijos.registrarTipoPropiedad');
    }

    public function create(tipoPropiedadRequest $request){
        $cliente = tipo_propiedades::create($request->validated());
        return redirect()->to('registrarTipoPropiedad')->with('success', 'Formulario enviado correctamente!');
    }
}
