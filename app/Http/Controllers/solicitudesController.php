<?php

namespace App\Http\Controllers;

use App\Http\Requests\solicitudesRequest;
use App\Models\solicitudes;
use Illuminate\Http\Request;

class solicitudesController extends Controller
{
    public function show()
    {
        return view('solicitudes.registrarSolicitudes');
    }

    public function create(solicitudesRequest $request)
    {
        $solicitud = solicitudes::create($request->validated());

        return redirect('registrarSolicitudes')->with('success', 'Formulario enviado correctamente!');
    }

    public function query(){
        $datos['solicitudes'] = solicitudes::paginate(5); 
        return view('solicitudes.consultarSolicitudes', $datos);
    }
  
     public function edit($codsol){
        $solicitud = solicitudes::find($codsol);
        return view('solicitudes.editarSolicitudes', compact('solicitud'));
    }
  
    public function update(Request $request, $codsol){
        $solicitud = solicitudes::find($codsol);
  
        $solicitud->codcli = $request->input('codcli');
        $solicitud->codpro = $request->input('codpro');
        $solicitud->comentario = $request->input('comentario');
        $solicitud->fecha = $request->input('fecha');
    
        
        $solicitud->save();
        return redirect('consultarSolicitudes')->with('success', 'Edicion realizada correctamente');
    }
}
