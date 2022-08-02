<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use App\Models\tipo_clientes;
use Illuminate\Http\Request;

class cobroController extends Controller
{
    public function show(){
        $clientes = clientes::all();
        $tipo_clientes = tipo_clientes::all();
        return view('Cobros', compact(['clientes', 'tipo_clientes']));
    }

    public function create(Request $request){
       return redirect()->to('Cobros')->with('success', 'Formulario enviado correctamente!');
    }

    public function query(){
        return view('consultarCobros');
    }
}
