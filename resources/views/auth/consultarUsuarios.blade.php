@extends('layouts.consulta-master')

<title>Consulta de Usuarios</title>

@php
    $rol = auth()->user()->rol;
    use App\Models\empleados;
@endphp

@section('content')
    @if($rol == 'Administrador')
    
    <div class="tab-nav">
        <a href="/home">Home</a>
        <label>/</label> 
        <a href="/consultarUsuarios"> Consulta de Usuarios</a>
    </div>
    
    <h3>Consulta de Usuarios</h3>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <div class="button-group">
        <button type="submit" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Print</button>
        <button type="reset" class="btn btn-warning"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
        <a href="{{ url('registrarUsuarios') }}" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Nuevo Usuario</a>

    </div>

    <table id="dataTable" class="table table-striped table-hover text-align-center table-borderless align-middle">
        <thead>
            <tr>
                <th scope="row">ID</th>
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
                    @php $empleados = empleados::where('codemp',$usuario->codemp)->first() @endphp
                    <td>{{ $empleados->codemp. ' - ' .$empleados->nomemp. '  ' .$empleados->apeemp }}</td>
                    <td>{{ $usuario->username }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->rol }}</td>  
                    @if($usuario->status == 'inactivo')
                        <td><li class="btn btn-warning">{{ $usuario->status}}</li></td>
                    @elseif($usuario->status == 'activo')
                        <td><li class="btn btn-success">{{ $usuario->status}}</li></td>
                    @endif
                    
                    <td><a href="{{ route('usuarios', ['id' => $usuario->id]) }}" class="btn btn-danger btn-editar"><i class="fas fa-ban"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

    @else
        <h3>No puede acceder a esta pagina, retornar a <a href="/home">Home</a></h3>
    @endif
@endsection