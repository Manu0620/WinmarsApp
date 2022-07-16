<?php

namespace App\Http\Controllers;

use App\Http\Requests\propiedadesRequest;
use App\Models\propiedades;
use App\Models\clientes;
use App\Models\tipo_propiedades;
use Illuminate\Http\Request;

class propiedadesController extends Controller
{
    public function show()
    {
        $tipo_propiedades = tipo_propiedades::all();
        $clientes = clientes::where('codtpcli','2')->get();
        return view('propiedades.registrarPropiedades', compact(['tipo_propiedades','clientes']));
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

        $propiedad->titulo = $request->input('titulo');
        $propiedad->descrip = $request->input('descrip');
        $propiedad->habit = $request->input('habit');
        $propiedad->baños = $request->input('baños');
        $propiedad->metros = $request->input('metros');
        $propiedad->parqueo = $request->input('parqueo');
        $propiedad->preven = $request->input('preven');
        $propiedad->preren = $request->input('preren');
        $propiedad->comision = $request->input('comision');
        $propiedad->codcli = $request->input('codcli');
        $propiedad->codtpro = $request->input('codtpro');
        $propiedad->citbis = $request->input('citbis');

        $propiedad->save();
        return redirect('consultarPropiedades')->with('success', 'Edicion realizada correctamente');
    }
}
