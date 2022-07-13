<?php

namespace App\Http\Controllers;

use App\Http\Requests\solicitudesRequest;
use App\Models\solicitudes;
use Illuminate\Http\Request;

class solicitudesController extends Controller
{
    public function show()
    {
        return view('registrarSolicitudes');
    }

    public function create(solicitudesRequest $request)
    {
        $solicitud = solicitudes::create($request->validated());

        return redirect('registrarSolicitudes')->with('success', 'Formulario enviado correctamente!');
    

    }
}
