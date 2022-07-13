@extends('layouts.formulario-master')

@section('content')

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
            <input type="text" class="form-control" name="codemp" placeholder="Empleado..." >
            @error('codemp')
                @include('layouts.partials.messages')
            @enderror
        </div>
        

        <div class="mb-3">
            <label for="username" class="form-label">Nombre de Usuario</label>
            <input type="text" class="form-control" name="username" placeholder="Nombre de usuario...">
            @error('username')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" placeholder="Contraseña...">
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
            <input type="email" class="form-control" name="email" placeholder="Correo...">
            @error('email')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="rol">Rol</label>
            <select class="form-select" name="rol">
                <option selected>Selecciona el Rol...</option>
                <option value="administrador">Administrador</option>
                <option value="usuario">Usuario</option>
                <option value="agente">Agente</option>
            </select>
            @error('rol')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="status">Estado</label>
            <select class="form-select" name="status">
                <option value="activo" selected>Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>
        
    </form>

@endsection
