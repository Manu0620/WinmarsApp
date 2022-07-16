<?php

namespace App\Http\Controllers;

use App\Http\Requests\propiedadesRequest;
use App\Models\propiedades;
use App\Models\tipo_propiedades;
use Illuminate\Http\Request;

class propiedadesController extends Controller
{
    public function show()
    {
        $tipo_propiedades = tipo_propiedades::all();
        return view('propiedades.registrarPropiedades', compact('tipo_propiedades'));
    }

    public function create(propiedadesRequest $request){

        $datos = request()->except('_token');

        if($request->hasFile('fotos')){
            $datos['fotos'] = $request->file('fotos')->store('uploads','public');
        }

        propiedades::insert($datos);

        //propiedades::create($request->validated());

        return redirect('propiedades.registrarPropiedades')->with('success', 'Formulario enviado correctamente!');
    }

    public function query(){
        $datos['propiedades'] = propiedades::paginate(5); 
        return view('propiedades.consultarPropiedades', $datos);
     }
  
    public function edit($codpro){
        $propiedad = propiedades::find($codpro);
        return view('propiedades.editarPropiedades', compact('propiedad'));
    }
  
    public function update(Request $request, $codpro){
        $propiedad = propiedades::find($codpro);

        $propiedad->nomcli = $request->input('nomcli');
        $propiedad->apecli = $request->input('apecli');
        $propiedad->tecli1 = $request->input('tecli1');
        $propiedad->tecli2 = $request->input('tecli2');
        $propiedad->dircli = $request->input('dircli');
        $propiedad->corcli = $request->input('corcli');
        $propiedad->cedrnc = $request->input('cedrnc');
        $propiedad->codtpcli = $request->input('codtpcli');

        $propiedad->save();
        return redirect('consultarPropiedades')->with('success', 'Edicion realizada correctamente');
    }
}
