<?php

namespace App\Http\Controllers;

use App\Http\Requests\clienteRequest;
use App\Models\clientes;
use Illuminate\Http\Request;

class clientesController extends Controller
{
    public function show(){
        return view('registrarClientes');
    }

    public function create(clienteRequest $request){
        $cliente = clientes::create($request->validated());

        return redirect()->to('registrarClientes')->with('success', 'Formulario enviado correctamente!');
    }
}
