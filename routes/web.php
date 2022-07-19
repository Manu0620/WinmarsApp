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
use App\Http\Controllers\imageController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\tipoPropiedadController;
use App\Http\Controllers\posicionEmpleadoController;
use App\Http\Controllers\propiedadesController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\solicitudesController;
use App\Http\Controllers\tipoClienteController;
use App\Http\Controllers\tipoEmpleadoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

//For adding an image
Route::get('/add-image',[imageController::class,'addImage'])->name('images.add');
//For storing an image
Route::post('/store-image',[imageController::class,'storeImage'])
->name('images.store');
//For showing an image
Route::get('/view-image',[imageController::class,'viewImage'])->name('images.view');


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

//
Route::get('/registrarClientes', [clientesController::class, 'show']);
Route::post('/registrarClientes', [clientesController::class, 'create']);
Route::get('/editarClientes/{id}', [clientesController::class, 'edit'])->name('clientes');
Route::put('/editarClientes/{id}', [clientesController::class, 'update'])->name('clientes');
Route::get('/consultarClientes', [clientesController::class, 'query']);
Route::get('/clientes/{id}', [clientesController::class, 'delete'])->name('inhabilitarCliente');

Route::get('/registrarEmpleados', [empleadosController::class, 'show']);
Route::post('/registrarEmpleados', [empleadosController::class, 'create']);
Route::get('/editarEmpleados/{id}', [empleadosController::class, 'edit'])->name('empleados');
Route::put('/editarEmpleados/{id}', [empleadosController::class, 'update'])->name('empleados');
Route::get('/consultarEmpleados', [empleadosController::class, 'query']);
Route::get('/empleados/{id}', [empleadosController::class, 'delete'])->name('inhabilitarEmpleado');

Route::get('/registrarUsuarios', [usuariosController::class, 'show']);
Route::post('/registrarUsuarios', [usuariosController::class, 'create']);
Route::get('/consultarUsuarios', [usuariosController::class, 'query']);
Route::get('/usuarios/{id}', [usuariosController::class, 'delete'])->name('usuarios');

Route::get('/registrarCitas', [citasController::class, 'show']);
Route::post('/registrarCitas', [citasController::class, 'create']);
Route::get('/editarCitas/{id}', [citasController::class, 'edit'])->name('citas');
Route::put('/editarCitas/{id}', [citasController::class, 'update'])->name('citas');
Route::get('/consultarCitas', [citasController::class, 'query']);
Route::get('/agendarCita/{id}', [citasController::class, 'approve'])->name('agendarCita');
Route::put('/agendarCita/{id}', [citasController::class, 'agendar'])->name('agendarCita');

Route::get('/registrarSolicitudes', [solicitudesController::class, 'show']);
Route::post('/registrarSolicitudes', [solicitudesController::class, 'create']);
Route::get('/editarSolicitudes/{id}', [solicitudesController::class, 'edit'])->name('solicitudes');
Route::put('/editarSolicitudes/{id}', [solicitudesController::class, 'update'])->name('solicitudes');
Route::get('/consultarSolicitudes', [solicitudesController::class, 'query']);
Route::get('/solicitudes/{id}', [solicitudesController::class, 'delete'])->name('rechazarSolicitud');

Route::get('/registrarPropiedades', [propiedadesController::class, 'show']);
Route::post('/registrarPropiedades', [propiedadesController::class, 'create']);
Route::get('/editarPropieades/{id}', [propiedadesController::class, 'edit'])->name('propiedades');
Route::put('/editarPropieades/{id}', [propiedadesController::class, 'update'])->name('propiedades');
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


//
Route::get('/login', [loginController::class, 'show']);
Route::post('/login', [loginController::class, 'login']);

Route::get('/home', [homeController::class, 'index']);
Route::get('/logout', [logoutController::class, 'logout']);


