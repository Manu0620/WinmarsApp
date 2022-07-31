<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use Illuminate\Http\Request;

class cobroController extends Controller
{
    public function show(){
        $clientes = clientes::all();
        return view('Cobros', compact('clientes'));
    }

    public function create(Request $request){
       return redirect()->to('Cobros')->with('success', 'Formulario enviado correctamente!');
    }

    public function query(){
        return view('consultarCobros');
    }
}
