@extends('layouts.formulario-master')

@section('content')

    <h3>Formulario de Usuarios</h3>

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Formulario de Usuarios</label>
    </div>

    <form action="/registrarUsuarios" method="POST">
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
            <select class="form-select" name="rol">
                <option selected>Selecciona el Rol...</option>
                <option value="1">Administrador</option>
                <option value="2">Empleado</option>
                <option value="3">Clientes</option>
            </select>
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
