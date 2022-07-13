<?php

namespace App\Http\Controllers;
use App\Http\Requests\empleadosRequest;
use App\Models\empleados;
use Illuminate\Http\Request;

class empleadosController extends Controller
{
   public function show()
   {
    return view('registrarEmpleados');

    
   }

   public function create (empleadosRequest $request){
    $empleados = empleados::create($request ->validated());

    return redirect()->to('registrarEmpleados');
   }
}
