@extends('layouts.consulta-master')
<title>Consulta de Clientes</title>

@section('content')

    <h3>Consulta de Empleado</h3>

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Consulta de Empleado</label>
    </div>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <div class="button-group">
        <button type="submit" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Print</button>
        <button type="reset" class="btn btn-warning"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
        <a href="{{ url('registrarEmpleados') }}" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Nuevo cliente</a>

    </div>

    <table class="table table-striped table-hover table-borderless align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono 1</th>
                <th>Telefono 2</th>
                <th>Direccion</th>
                <th>Correo</th>
                <th>Cedula/RNC</th>
                <th>Tip.Empleado</th>
                <th>Posicion</th>
                <th>Estado</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->codemp }}</td>
                    <td>{{ $empleado->nomemp }}</td>
                    <td>{{ $empleado->apeemp }}</td>
                    <td>{{ $empleado->telem1 }}</td>
                    <td>{{ $empleado->telem2 }}</td>
                    <td>{{ $empleado->direccion }}</td>
                    <td>{{ $empleado->correo }}</td>
                    <td>{{ $empleado->cedula }}</td>
                    <td>{{ $empleado->ctipemp }}</td>
                    <td>{{ $empleado->codpos }}</td>
                    <td>{{ $empleado->estemp }}</td> 
                      
                    
                    <td><a href="{{ route('empleados', ['id' => $empleado->codemp]) }}" class="btn btn-warning btn-editar"><i class="fas fa-file-edit"></i> Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection