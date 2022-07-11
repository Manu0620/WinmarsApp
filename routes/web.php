<?php

use App\Http\Controllers\clientesController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\usuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/agregarClientes', [clientesController::class, 'show']);
Route::post('/agregarClientes', [clientesController::class, 'create']);


Route::get('/registrarUsuarios', [usuariosController::class, 'show']);
Route::post('/registrarUsuarios', [usuariosController::class, 'create']);

Route::get('/login', [loginController::class, 'show']);
Route::post('/login', [loginController::class, 'login']);

Route::get('/home', [homeController::class, 'index']);
Route::get('/logout', [logoutController::class, 'logout']);