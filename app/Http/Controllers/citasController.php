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

        return redirect()->to('registrarCitas')->with('success', 'Formulario enviado correctamente!');
    }

    public function query(){
        $datos['citas'] = citas::paginate(5); 
        return view('citas.consultarCitas', $datos);
    }

    public function edit($codcit){
        $cita = citas::find($codcit);
        return view('citas.editarCitas', compact('cita'));
    }

    public function update(Request $request, $codcit){
        $cita = citas::find($codcit);

        $cita->codsol = $request->input('codsol');
        $cita->codusu = $request->input('codusu');
        $cita->fecha = $request->input('fecha');
        $cita->descrip = $request->input('descrip');
        
        $cita->save();
        return redirect('consultarCitas')->with('success', 'Edicion realizada correctamente');
    }
}
