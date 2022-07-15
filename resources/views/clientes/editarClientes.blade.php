@extends('layouts.formulario-master')
<title>Edicion de clientes</title>

@section('content')

    <h3>Formulario de Clientes</h3>

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Formulario de Clientes</label>
    </div>

    <form action="{{ route('clientes', ['id' => $cliente->codcli]) }}" method="POST">
        @csrf

        @method('PUT')

        <div class="mb-3">
            <label for="nomcli">Nombre</label>
            <input type="text" class="form-control" name="nomcli" placeholder="Ingrese el nombre..." value="{{ $cliente->nomcli }}">
        </div>

        <div class="mb-3">
            <label for="apecli">Apellido</label>
            <input type="text" class="form-control" name="apecli" placeholder="Ingrese el apellido..." value="{{ $cliente->apecli }}">
        </div>

        <div class="mb-3">
            <label for="tecli1">Teléfono 1</label>
            <input type="text" class="form-control" name="tecli1" placeholder="Ingrese el teléfono 1..." value="{{ $cliente->tecli1 }}">
        </div>

        <div class="mb-3">
            <label for="tecli2">Teléfono 2</label>
            <input type="text" class="form-control" name="tecli2" placeholder="Ingrese el teléfono 2..." value="{{ $cliente->tecli2 }}">
        </div>

        <div class="mb-3">
            <label for="dircli">Dirección</label>
            <input type="text" class="form-control" name="dircli" placeholder="Ingrese la dirección..." value="{{ $cliente->dircli }}">
        </div>

        <div class="mb-3">
            <label for="corcli">Correo Electrónico</label>
            <input type="text" class="form-control" name="corcli" placeholder="Ingrese el correo electrónico..." value="{{ $cliente->corcli }}">
        </div>

        <div class="mb-3">
            <label for="cedrnc">Cédula/RNC</label>
            <input type="text" class="form-control" name="cedrnc" placeholder="Ingrese la cédula/RNC..." value="{{ $cliente->cedrnc }}">
        </div>

        <div class="mb-3">
            <label for="codtpcli">Tipo de Cliente</label>
            <select class="form-select" name="codtpcli">
                <option selected>Selecciona el Tipo de cliente...</option>
                <option value="1">Comprador</option>
                <option value="2">Vendedor</option>
                
            </select>
        </div>

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Update</button>
        </div>
        
    </form>

@endsection