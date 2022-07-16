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

      $empleado->nomemp = $request->input('nomemp');
      $empleado->apeemp = $request->input('apeemp');
      $empleado->telem1 = $request->input('telem1');
      $empleado->telem2 = $request->input('telem2');
      $empleado->direccion = $request->input('direccion');
      $empleado->correo = $request->input('correo');
      $empleado->cedula = $request->input('cedula');
      $empleado->ctipemp = $request->input('ctipemp');
      $empleado->codpos = $request->input('codpos');
      
      $empleado->save();
      return redirect('consultarEmpleados')->with('success', 'Edicion realizada correctamente');
   }
}
