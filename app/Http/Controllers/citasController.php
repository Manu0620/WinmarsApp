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

        $cita->nomcli = $request->input('nomcli');
        $cita->apecli = $request->input('apecli');
        $cita->tecli1 = $request->input('tecli1');
        $cita->tecli2 = $request->input('tecli2');
        $cita->dircli = $request->input('dircli');
        $cita->corcli = $request->input('corcli');
        $cita->cedrnc = $request->input('cedrnc');
        $cita->codtpcli = $request->input('codtpcli');
        
        $cita->save();
        return redirect('consultarCitas')->with('success', 'Edicion realizada correctamente');
    }
}
