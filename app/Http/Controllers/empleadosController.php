<?php

namespace App\Http\Controllers;
use App\Http\Requests\empleadosRequest;
use App\Models\empleados;
use App\Models\tipo_empleados;
use Illuminate\Http\Request;

class empleadosController extends Controller
{
   public function show(){
     $tipo_empleados = tipo_empleados::all();
     return view('empleados.registrarEmpleados', compact('tipo_empleados'));
   }

   public function create (empleadosRequest $request){
      $empleados = empleados::create($request ->validated());

      return redirect()->to('empleados.registrarEmpleados')->with('success', 'Formulario enviado correctamente!');
   }

   public function query(){
      $datos['empleados'] = empleados::paginate(5); 
      return view('empleados.consultarEmpleados', $datos);
   }

   public function edit($codemp){
      $empleado = empleados::find($codemp);
      return view('empleados.editarEmpleados', compact('empleado'));
   }

   public function update(Request $request, $codemp){
      $empleado = empleados::find($codemp);

      $empleado->nomcli = $request->input('nomcli');
      $empleado->apecli = $request->input('apecli');
      $empleado->tecli1 = $request->input('tecli1');
      $empleado->tecli2 = $request->input('tecli2');
      $empleado->dircli = $request->input('dircli');
      $empleado->corcli = $request->input('corcli');
      $empleado->cedrnc = $request->input('cedrnc');
      $empleado->codtpcli = $request->input('codtpcli');
      
      $empleado->save();
      return redirect('consultarEmpleados')->with('success', 'Edicion realizada correctamente');
   }
}
