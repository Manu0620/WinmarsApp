<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use Illuminate\Http\Request;

class clientesController extends Controller
{
    public function show(){
        
        return view('agregarClientes');

    }

    public function create(Request $request){
        
        $clientes = new clientes();

        $clientes -> nomcli = $request -> nomcli;
        $clientes -> apecli = $request -> apecli;
        $clientes -> tecli1 = $request -> tecli1;
        $clientes -> tecli2 = $request -> tecli2;
        $clientes -> dircli = $request -> dircli;
        $clientes -> corcli = $request -> corcli;
        $clientes -> cedrnc = $request -> cedrnc;
        $clientes -> codtpcli = $request -> codtpcli;
        $clientes -> estcli = $request -> estcli;
        $clientes -> save();

        return redirect('/agregarClientes');

    }
}
