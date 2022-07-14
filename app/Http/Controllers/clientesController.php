<?php

namespace App\Http\Controllers;

use App\Http\Requests\clienteRequest;
use App\Models\clientes;
use Illuminate\Http\Request;

class clientesController extends Controller
{

    public function show(){
        return view('clientes.registrarClientes');
    }

    public function create(clienteRequest $request){
        $cliente = clientes::create($request->validated());
        return redirect()->to('clientes.registrarClientes')->with('success', 'Formulario enviado correctamente!');
    }

    public function edit($codcli){
        return view('clientes.editarClientes');
    }

    public function query(){
        $datos['clientes'] = clientes::paginate(5); 
        return view('clientes.consultarClientes', $datos);
    }
}
