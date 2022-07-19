@extends('layouts.formulario-master')
<title>Regitro de Usuarios</title>

@php
    $rol = auth()->user()->rol;
@endphp

@section('content')
    @if($rol == 'Administrador')
    <h3>Formulario de Usuarios</h3>

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Formulario de Usuarios</label>
    </div>

    <form action="/registrarUsuarios" method="POST">
        @csrf

        @if (Session::get('success', false))
            @include('layouts.partials.messages')
        @endif

        <div class="mb-3">
            <label for="codemp" class="form-label">Empleado</label>
            <select class="form-select" id="codemp" name="codemp">
                <option selected disabled>Seleccione el Empleado...</option>
                @foreach ($empleados as $empleado)
                    <option value="{{$empleado->codemp}}" {{ (old('$empleado') == $empleado->codemp) ? 'selected' : ''}}>{{$empleado->nomemp.' '.$empleado->apeemp.' | '.$empleado->cedula}}</option>
                @endforeach
            </select> 
            @error('codemp')
                @include('layouts.partials.messages')
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="username" class="form-label">Nombre de Usuario</label>
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Nombre de usuario...">
            @error('username')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Contraseña...">
            @error('password')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña...">
            @error('password_confirmation')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="email">Correo</label>
            <input type="email" class="form-control" id="correo" name="email" placeholder="Correo...">
            @error('email')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="rol">Rol</label>
            <select class="form-select" name="rol">
                <option selected>Selecciona el Rol...</option>
                <option value="Administrador">Administrador</option>
                <option value="Usuario">Usuario</option>
                <option value="Agente">Agente</option>
            </select>
            @error('rol')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <input type="hidden" class="form-control" name="status" value="activo">

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>
        
    </form>
    @else
        <h3>No puede acceder a esta pagina, retornar a <a href="/home">Home</a></h3>
    @endif
@endsection

