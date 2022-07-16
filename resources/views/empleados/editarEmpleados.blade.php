@extends('layouts.formulario-master')
<title>Edicion de Empleados</title>

@section('content')

<h3>Formulario de Empleados</h3>

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Formulario de Empleados</label>
    </div>

    <form action="{{ route('empleados', ['id' => $empleado->codemp]) }}" method="POST">
        @csrf

        @method('PUT')

        @if (Session::get('success', false))
        @include('layouts.partials.messages')
             @endif

        <div class="mb-3">
            <label for="nomemp">Nombre </label>
            <input type="text" class="form-control" name="nomemp" placeholder="Ingrese el nombre..." value="{{ $empleado->nomemp }}">
            @error('nomemp')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="apeemp">Apellido</label>
            <input type="text" class="form-control" name="apeemp" placeholder="Ingrese el apellido..." value="{{ $empleado->apeemp }}">
            @error('apeemp')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="telem1">Teléfono 1</label>
            <input type="text" class="form-control" name="telem1" placeholder="Ingrese el teléfono 1..." value="{{ $empleado->telem1 }}">
            @error('telem1')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="telem2">Teléfono 2</label>
            <input type="text" class="form-control" name="telem2" placeholder="Ingrese el teléfono 2..." value="{{ $empleado->telem2 }}">
            @error('telem2')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" name="direccion" placeholder="Ingrese la dirección..." value="{{ $empleado->direccion }}">
            @error('direccion')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="correo">Correo Electrónico</label>
            <input type="text" class="form-control" name="correo" placeholder="Ingrese el correo electrónico..." value="{{ $empleado->correo }}">
            @error('correo')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="cedula">Cédula/RNC</label>
            <input type="text" class="form-control" name="cedula" placeholder="Ingrese la cédula/RNC..." value="{{ $empleado->cedula }}">
            @error('cedula')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="ctipemp">Tipo de Empleado</label>
            <select class="form-select" name="ctipemp">
                <option selected>Selecciona el Tipo de Empleado...</option>
                <option value="1">Fijo</option>
                <option value="2">Temporal</option>
            </select>
           
        </div>
        <div class="mb-3">
            <label for="codpos">Posicion</label>
            <select class="form-select" name="codpos">
                <option selected>Selecciona el tipo de posicion...</option>
                <option value="1">Tecnico</option>
            </select>
           
        </div>

        <input type="hidden" class="form-control" name="estemp" value="1">

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>
        
    </form>


@endsection