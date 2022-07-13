@extends('layouts.formulario-master')


@section('content')

<h3>Formulario de Empleados</h3>

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Formulario de Empleados</label>
    </div>

    <form action="/registrarEmpleados" method="POST">
        @csrf

        @include('layouts.partials.messages')

        <div class="mb-3">
            <label for="nomemp">Nombre </label>
            <input type="text" class="form-control" name="nomemp" placeholder="Ingrese el nombre...">
        </div>

        <div class="mb-3">
            <label for="apeemp">Apellido</label>
            <input type="text" class="form-control" name="apeemp" placeholder="Ingrese el apellido...">
        </div>

        <div class="mb-3">
            <label for="telem1">Teléfono 1</label>
            <input type="text" class="form-control" name="telem1" placeholder="Ingrese el teléfono 1...">
        </div>

        <div class="mb-3">
            <label for="telem2">Teléfono 2</label>
            <input type="text" class="form-control" name="telem2" placeholder="Ingrese el teléfono 2...">
        </div>

        <div class="mb-3">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" name="direccion" placeholder="Ingrese la dirección...">
        </div>

        <div class="mb-3">
            <label for="correo">Correo Electrónico</label>
            <input type="text" class="form-control" name="correo" placeholder="Ingrese el correo electrónico...">
        </div>

        <div class="mb-3">
            <label for="cedula">Cédula/RNC</label>
            <input type="text" class="form-control" name="cedula" placeholder="Ingrese la cédula/RNC...">
        </div>

        <div class="mb-3">
            <label for="ctipemp">Tipo de Empleado</label>
            <select class="form-select" name="ctipemp">
                <option selected>Selecciona el Tipo de Empleado...</option>
                <option value="fijo">Fijo</option>
                <option value="temporal">Temporal</option>
                
            </select>
        </div>
        <div class="mb-3">
            <label for="codpos">Posicion</label>
            <select class="form-select" name="codpos">
                <option selected>Selecciona el tipo de posicion...</option>
                <option value="1">Tecnico</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="estemp">Estado Empleado</label>
            <select class="form-select" name="estemp">
                <option value="1" selected>Activo</option>
                <option value="2">Inactivo</option>
            </select>
        </div>

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>
        
    </form>


@endsection