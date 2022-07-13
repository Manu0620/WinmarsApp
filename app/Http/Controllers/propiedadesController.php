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
        $propiedad = propiedades::create($request->validated());

        return redirect('registrarPropiedades');
    }
}
