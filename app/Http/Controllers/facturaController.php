<?php

namespace App\Http\Controllers;

use App\Http\Requests\clienteRequest;
use App\Http\Requests\facturaRequest;
use App\Models\clientes;
use App\Models\cuentas;
use App\Models\detalle_factura;
use App\Models\facturas;
use App\Models\propiedades;
use App\Models\tipo_clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class facturaController extends Controller
{
    public function create(){
        $clientes = clientes::where('codtpcli','2' && 'estcli','activo')->get();
        $propiedades = propiedades::join('itbis','propiedades.citbis','=','itbis.citbis')
        ->select('itbis.itbis', 'propiedades.codpro', 'propiedades.titulo', 'propiedades.preven', 'propiedades.preren')
        ->where('propiedades.estpro','activo')->get();
        $tipo_clientes = tipo_clientes::all();
        return view('Facturacion', compact(['clientes', 'propiedades', 'tipo_clientes']));
    }

    /* Modal */
    
    /*public function nuevoCliente(clienteRequest $request){
        $cliente = clientes::create($request->validated());
        $cliente = $cliente->codcli;
        return redirect()->to(url()->previous())->with(compact('cliente'));
    }*/

    public function save(facturaRequest $request){
        
        $facturas = new facturas();

        $facturas->codcli = $request->codcli;
        $facturas->codusu = Auth::user()->id;
        $facturas->condicion = $request->condicion;
        $facturas->subtot = $request->subtot;
        $facturas->total = $request->total;
        $facturas->fecvenc = date("Y-m-d h:i",strtotime(date("Y-m-d h:i")."+ 30 days"));
        $facturas->observaciones = $request->observaciones;
        if($request->condicion == 'Credito'){
            $facturas->estfac = 'Pendiente';
        }else{ $facturas->estfac = 'Completada'; }
        $facturas->save();
        $numfac = $facturas->numfac;

        $condicion = $request->condicion;

        $detalle = new detalle_factura();

        $detalle->numfac = $numfac;
        $detalle->codpro = $request->codpro;
        $detalle->concepto = $request->concepto;
        $detalle->cantidad = $request->cantidad;
        $detalle->precio = $request->total;
        if($request->condicion == 'Credito'){
            $detalle->estfac = 'Pendiente';
        }else{ $detalle->estfac = 'Completada'; }
        $detalle->save();

        $cliente = $request->codcli;
        
        $cuenta = cuentas::where('codcli', $cliente)->first();
        $cuentas = new cuentas();

        if(is_null($cuenta) && $condicion == 'Credito'){
            $cuentas->codcli = $cliente;
            $cuentas->balance = $request->total;
            $cuentas->totpag = 0;
            $cuentas->balpend = $request->total;
            $cuentas->estcue = 'Pendiente';
            $cuentas->save();
        }else if($condicion == 'Credito'){
            $cuenta->balance = $cuenta->balance + $request->total;
            $cuenta->balpend = $cuenta->balpend + $request->total;
            $cuenta->estcue = 'Pendiente';
            $cuenta->save();
        }

        return redirect()->to('Facturacion')->with('success', 'Formulario enviado correctamente!');
    }

    public function query(){
        return view('consultarFacturas');
    }
}
