@extends('layouts.formulario-master')
<title>Registro de clientes</title>

@php
    $rol = auth()->user()->rol;
@endphp

@section('content')
    @if($rol == 'Administrador' || $rol == 'Usuario')

    <div class="tab-nav">
        <a href="{{ url()->previous() }}">Atras</a>
        <label>/</label> 
        <a> Formulario de Clientes</a>
    </div>

    <h3>Formulario de Clientes</h3>

    <form action="/registrarClientes" method="POST">
        @csrf

        @if (Session::get('success', false))
        @include('layouts.partials.messages')
          @endif

        <div class="mb-3">
            <label for="nomcli">Nombre</label>
            <input type="text" class="form-control" name="nomcli" value="{{ old('nomcli') }}" placeholder="Ingrese el nombre...">
            @error('nomcli')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="apecli">Apellido</label>
            <input type="text" class="form-control" name="apecli" value="{{ old('apecli') }}" placeholder="Ingrese el apellido...">
            @error('apecli')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="tecli1">Teléfono 1</label>
            <input type="tel" class="form-control" name="tecli1" value="{{ old('tecli1') }}" placeholder="Ingrese el teléfono 1...">
            @error('tecli1')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="tecli2">Teléfono 2</label>
            <input type="tel" class="form-control" name="tecli2" value="{{ old('tecli2') }}" placeholder="Ingrese el teléfono 2...">
            @error('tecli2')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="dircli">Dirección</label>
            <input type="text" class="form-control" name="dircli" value="{{ old('dircli') }}" placeholder="Ingrese la dirección...">
            @error('dircli')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="corcli">Correo Electrónico</label>
            <input type="text" class="form-control" name="corcli" value="{{ old('corcli') }}" placeholder="Ingrese el correo electrónico...">
            @error('corcli')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="cedrnc">Cédula/RNC</label>
            <input type="text" class="form-control" name="cedrnc" value="{{ old('cedrnc') }}" placeholder="Ingrese la cédula/RNC...">
            @error('cedrnc')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="codtpcli">Tipo de Cliente</label>
            <select class="form-select" id="codtpcli" name="codtpcli" value="{{ old('codtpcli') }}">
                <option selected disabled>Seleccione el tipo de cliente...</option>
                @foreach ($tipo_clientes as $tipo_cliente)
                    <option value="{{ $tipo_cliente->codtpcli}}" {{ (old('$tipo_cliente') == $tipo_cliente->codtpcli) ? 'selected' : ''}}>{{$tipo_cliente->tipcli}}</option>
                @endforeach
            </select>        
        </div>

        <input type="hidden" class="form-control" name="estcli" value="activo">

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>
        
    </form>
    @else
        <h3>No puede acceder a esta pagina, retornar a <a href="/home">Home</a></h3>
    @endif
@endsection
            
