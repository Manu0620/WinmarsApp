@extends('layouts.formulario-master')

@section('content')

    <h3>Registro de Clientes</h3>

    <form action="/agregarClientes" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nomcli">Nombre</label>
            <input type="text" class="form-control" name="nomcli" placeholder="Ingrese el nombre...">
        </div>

        <div class="mb-3">
            <label for="apecli">Apellido</label>
            <input type="text" class="form-control" name="apecli" placeholder="Ingrese el apellido...">
        </div>

        <div class="mb-3">
            <label for="tecli1">Teléfono 1</label>
            <input type="text" class="form-control" name="tecli1" placeholder="Ingrese el teléfono 1...">
        </div>

        <div class="mb-3">
            <label for="tecli2">Teléfono 2</label>
            <input type="text" class="form-control" name="tecli2" placeholder="Ingrese el teléfono 2...">
        </div>

        <div class="mb-3">
            <label for="dircli">Dirección</label>
            <input type="text" class="form-control" name="dircli" placeholder="Ingrese la dirección...">
        </div>

        <div class="mb-3">
            <label for="corcli">Correo Electrónico</label>
            <input type="text" class="form-control" name="corcli" placeholder="Ingrese el correo electrónico...">
        </div>

        <div class="mb-3">
            <label for="cedrnc">Cédula/RNC</label>
            <input type="text" class="form-control" name="cedrnc" placeholder="Ingrese la cédula/RNC...">
        </div>

        <div class="mb-3">
            <label for="codtpcli">Tipo de Cliente</label>
            <select class="form-select" name="codtpcli">
                <option selected>Tipo de cliente...</option>
                <option value="1">Comprador</option>
                <option value="2">Vendedor</option>
            </select>
        </div>

        <div class="mb-3">
            <input type="hidden" class="form-control" value="1" name="estcli" placeholder="Estado...">
        </div>

        <h1><button type="submit" class="btn btn-primary">Guardar</button></h1>
    </form>

@endsection
            
