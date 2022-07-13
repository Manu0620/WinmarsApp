<?php

namespace App\Http\Controllers;

use App\Http\Requests\propiedadesRequest;
use App\Models\propiedades;
use Illuminate\Http\Request;

class propiedadesController extends Controller
{
    public function show()
    {
        return view('registrarPropiedades');
    }

    public function create(propiedadesRequest $request){

        $datos = request()->except('_token');

        if($request->hasFile('fotos')){
            $datos['fotos'] = $request->file('fotos')->store('uploads','public');
        }

        propiedades::insert($datos);

        //propiedades::create($request->validated());

        return redirect('registrarPropiedades')->with('success', 'Formulario enviado correctamente!');
    }
}
