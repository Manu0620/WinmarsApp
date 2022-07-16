@extends('layouts.consulta-master')
<title>Consulta de Usuarios</title>

@section('content')

    <h3>Consulta de Usuarios</h3>

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Consulta de Usuarios</label>
    </div>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <div class="button-group">
        <button type="submit" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Print</button>
        <button type="reset" class="btn btn-warning"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
        <a href="{{ url('registrarUsuarios') }}" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Nuevo cliente</a>

    </div>

    <table class="table table-striped table-hover table-borderless align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Empleado</th>
                <th>Nombre de Usuario</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->codemp }}</td>
                    <td>{{ $usuario->username }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->rol }}</td>  
                    <td>{{ $usuario->status }}</td>  
                    
                    <td><a href="" class="btn btn-danger btn-eliminar"><i class="fas fa-file-edit"></i> Eliminar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection