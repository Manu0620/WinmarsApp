<?php

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\citasController;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\cobroController;
use App\Http\Controllers\cotizacionController;
use App\Http\Controllers\cuentasController;
use App\Http\Controllers\empleadosController;
use App\Http\Controllers\facturaController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\tipoPropiedadController;
use App\Http\Controllers\posicionEmpleadoController;
use App\Http\Controllers\propiedadesController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\solicitudesController;
use App\Http\Controllers\tipoClienteController;
use App\Http\Controllers\tipoEmpleadoController;

use App\Mail\informacionMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/citaAgendada', function($id){
    $correo = new informacionMail;
    Mail::to('maderamanuel25@gmail.com')->send($correo);

    return "Mensaje enviado!";
});

//Procesos
Route::get('/Facturacion', [facturaController::class, 'create']);
Route::post('/Facturacion', [facturaController::class, 'save']);
Route::get('/consultarFacturas', [facturaController::class, 'query']);

Route::get('/Cobros', [cobroController::class, 'show']);
Route::post('/Cobros', [cobroController::class, 'create']);
Route::get('/consultarCobros', [cobroController::class, 'query']);

Route::get('/Cotizacion', [cotizacionController::class, 'create']);
Route::post('/Cotizacion', [cotizacionController::class, 'save']);
Route::get('/consultarCotizaciones', [cotizacionController::class, 'query']);

Route::get('/consultarCuentas', [cuentasController::class, 'query']);

//Registros/Consultas
Route::get('/registrarClientes', [clientesController::class, 'show']);
Route::post('/registrarClientes', [clientesController::class, 'create']);
Route::get('/editarCliente', [clientesController::class, 'edit']);
Route::put('/updateClientes', [clientesController::class, 'update']);
Route::get('/consultarClientes', [clientesController::class, 'query']);
Route::get('/clientes/{id}', [clientesController::class, 'delete'])->name('inhabilitarCliente');

Route::get('/registrarEmpleados', [empleadosController::class, 'show']);
Route::post('/registrarEmpleados', [empleadosController::class, 'create']);
Route::get('/editarEmpleado', [empleadosController::class, 'edit']);
Route::put('/updateEmpleado', [empleadosController::class, 'update']);
Route::get('/consultarEmpleados', [empleadosController::class, 'query']);
Route::get('/empleados/{id}', [empleadosController::class, 'delete'])->name('inhabilitarEmpleado');

Route::get('/registrarUsuarios', [usuariosController::class, 'show']);
Route::post('/registrarUsuarios', [usuariosController::class, 'create']);
Route::get('/consultarUsuarios', [usuariosController::class, 'query']);
Route::get('/usuarios/{id}', [usuariosController::class, 'delete'])->name('usuarios');

Route::get('/registrarCitas', [citasController::class, 'show']);
Route::post('/registrarCitas', [citasController::class, 'create']);
Route::get('/editarCitas', [citasController::class, 'edit']);
Route::put('/updateCitas', [citasController::class, 'update']);
Route::get('/consultarCitas', [citasController::class, 'query']);
Route::get('/aprobarSolicitud', [citasController::class, 'approve']);
Route::put('/agendarCita', [citasController::class, 'agendar']);

Route::get('/registrarSolicitudes', [solicitudesController::class, 'show']);
Route::post('/registrarSolicitudes', [solicitudesController::class, 'create']);
Route::get('/editarSolicitudes', [solicitudesController::class, 'edit']);
Route::put('/updateSolicitudes', [solicitudesController::class, 'update']);
Route::get('/consultarSolicitudes', [solicitudesController::class, 'query']);
Route::get('/solicitudes/{id}', [solicitudesController::class, 'delete'])->name('rechazarSolicitud');

Route::get('/registrarPropiedades', [propiedadesController::class, 'show']);
Route::post('/registrarPropiedades', [propiedadesController::class, 'create']);
Route::get('/editarPropiedad', [propiedadesController::class, 'edit']);
Route::put('/updatePropiedad', [propiedadesController::class, 'update']);
Route::get('/consultarPropiedades', [propiedadesController::class, 'query']);
Route::get('/propiedades/{id}', [propiedadesController::class, 'delete'])->name('inhabilitarPropiedad');

Route::get('/registrarPosicionesEmpleado', [posicionEmpleadoController::class, 'show']);
Route::post('/registrarPosicionesEmpleado', [posicionEmpleadoController::class, 'create']);

Route::get('/registrarTipoPropiedad', [tipoPropiedadController::class, 'show']);
Route::post('/registrarTipoPropiedad', [tipoPropiedadController::class, 'create']);

Route::get('/registrarTipoCliente', [tipoClienteController::class, 'show']);
Route::post('/registrarTipoCliente', [tipoClienteController::class, 'create']);

Route::get('/registrarTipoEmpleado', [tipoEmpleadoController::class, 'show']);
Route::post('/registrarTipoEmpleado', [tipoEmpleadoController::class, 'create']);


//Login / Pagina Principal
Route::get('/login', [loginController::class, 'show']);
Route::post('/login', [loginController::class, 'login']);

Route::get('/home', [homeController::class, 'index']);
Route::get('/logout', [logoutController::class, 'logout']);


