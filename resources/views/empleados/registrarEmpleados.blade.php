@extends('layouts.formulario-master')
<title>Registro de Empleados</title>

@php
    $rol = auth()->user()->rol;
@endphp

@section('content')
    @if($rol == 'Administrador')

    <div class="tab-nav">
        <a href="{{ url()->previous() }}">Atras</a>
        <label>/</label> 
        <a> Formulario de Empleados</a>
    </div>
    
    <h3>Formulario de Empleados</h3>

    <form action="/registrarEmpleados" method="POST">
        @csrf

        @if (Session::get('success', false))
            @include('layouts.partials.messages')
        @endif

        <div class="mb-3">
            <label for="nomemp">Nombre </label>
            <input type="text" class="form-control" name="nomemp" value="{{ old('nomemp') }}" placeholder="Ingrese el nombre...">
            @error('nomemp')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="apeemp">Apellido</label>
            <input type="text" class="form-control" name="apeemp" value="{{ old('apeemp') }}" placeholder="Ingrese el apellido...">
            @error('apeemp')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="telem1">Teléfono 1</label>
            <input type="text" class="form-control" name="telem1" value="{{ old('telem1') }}" placeholder="Ingrese el teléfono 1...">
            @error('telem1')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="telem2">Teléfono 2</label>
            <input type="text" class="form-control" name="telem2" value="{{ old('telem2') }}" placeholder="Ingrese el teléfono 2...">
            @error('telem2')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" placeholder="Ingrese la dirección...">
            @error('direccion')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="correo">Correo Electrónico</label>
            <input type="text" class="form-control" name="correo" value="{{ old('correo') }}" placeholder="Ingrese el correo electrónico...">
            @error('correo')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="cedula">Cédula/RNC</label>
            <input type="text" class="form-control" name="cedula" value="{{ old('cedula') }}" placeholder="Ingrese la cédula/RNC...">
            @error('cedula')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="ctipemp">Tipo de Empleado</label>
            <select class="form-select" id="ctipemp" name="ctipemp" value="{{ old('ctipemp') }}">
                <option selected disabled>Seleccione el tipo de empleado...</option>
                @foreach ($tipo_empleados as $tipo_empleado)
                    <option value="{{ $tipo_empleado->ctipemp}}" {{ (old('$tipo_empleado') == $tipo_empleado->ctipemp) ? 'selected' : ''}}>{{$tipo_empleado->descripcion}}</option>
                @endforeach
            </select>    
           
        </div>

        <div class="mb-3">
            <label for="codpos">Posicion</label>
            <select class="form-select" id="codpos" name="codpos">
                <option selected disabled>Seleccione la posicion del empleado...</option>
                @foreach ($posiciones_empleados as $posiciones_empleado)
                    <option value="{{$posiciones_empleado->codpos}}" {{ (old('$posiciones_empleado') == $posiciones_empleado->codpos) ? 'selected' : ''}}>{{$posiciones_empleado->posicion}}</option>
                @endforeach
            </select>
           
        </div>

        <input type="hidden" class="form-control" name="estemp" value="activo">

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>
        
    </form>
    @else
        <h3>No puede acceder a esta pagina, retornar a <a href="/home">Home</a></h3>
    @endif

@endsection