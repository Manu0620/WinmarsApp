<?php

namespace App\Http\Controllers;

use App\Http\Requests\tipoEmpleadoRequest;
use App\Models\tipo_empleados;
use Illuminate\Http\Request;

class tipoEmpleadoController extends Controller
{
    public function show(){
       
        return view('fijos.registrarTipoEmpleado');
    }

    public function create(tipoEmpleadoRequest $request){
        $cliente = tipo_empleados::create($request->validated());
        return redirect()->to('registrarTipoEmpleado')->with('success', 'Formulario enviado correctamente!');
    }
}
