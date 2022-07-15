<?php

namespace App\Http\Controllers;

use App\Http\Requests\citasRequest;
use App\Models\citas;
use Illuminate\Http\Request;

class citasController extends Controller
{
    public function show(){
        return view('citas.registrarCitas');
    }

    public function create(citasRequest $request){
        $cita = citas::create($request->validated());

        return redirect()->to('citas.registrarCitas')->with('success', 'Formulario enviado correctamente!');
    }
}
