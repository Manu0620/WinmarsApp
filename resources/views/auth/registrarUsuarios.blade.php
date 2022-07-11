@extends('layouts.formulario-master')

@section('content')

    <h3>Registro de Usuario</h3>

    <form action="/registarUsuarios" method="POST">
        @csrf
        <div class="mb-3">
            <label for="codemp" class="form-label">Empleado</label>
            <input type="text" class="form-control" name="codemp" placeholder="Empleado..." >
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Nombre de Usuario</label>
            <input type="text" class="form-control" name="username" placeholder="Nombre de usuario...">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" placeholder="Contraseña...">
        </div>

        <div class="mb-3">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña...">
        </div>

        <div class="mb-3">
            <label for="email">Correo</label>
            <input type="email" class="form-control" name="email" placeholder="Correo...">
        </div>

        <div class="mb-3">
            <label for="rol">Rol</label>
            <input type="text" class="form-control" name="rol" placeholder="rol...">
        </div>

        <h1><button type="submit" class="btn btn-primary">Guardar</button></h1>
    </form>

@endsection
