<?php

namespace App\Http\Controllers;

use App\Http\Requests\citasRequest;
use App\Models\citas;
use App\Models\solicitudes;
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
        $datos['citas'] = citas::where('estcit', 'Pendiente')->paginate(5); 
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
        $cita->estcit = $request->input('estcit');
        
        $cita->save();
        return redirect('consultarCitas')->with('success', 'Edicion realizada correctamente');
    }

    public function agendar(Request $request, $id){
        $citas = new citas();

        $fechaHoy = date("Y-m-d h:i",strtotime(date("Y-m-d h:i")));

        $request->validate([
            'fecha' => 'required|after_or_equal:fechaHoy',
        ]);

        $citas->codsol = $request->input('codsol');
        $citas->codusu = $request->input('codusu');
        $citas->fecha = $request->input('fecha');
        $citas->descrip = $request->input('descrip');
        $citas->estcit = $request->input('estcit');
        
        $citas->save();

        $solicitud = solicitudes::find($id); 

        $solicitud->estsol = 'Aprobada';
        $solicitud->save();
        return redirect('consultarCitas')->with('success', 'Cita agendada correctamente');
    }

    public function approve($codsol){
        $id = $codsol;
        return view('citas.agendarCita', compact('id'));
    }
}
