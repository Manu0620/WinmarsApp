@extends('layouts.formulario-master')

@section('content')
    
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th >ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono 1</th>
                <th>Telefono 2</th>
                <th>Direccion</th>
                <th>Correo</th>
                <th>Cedula/RNC</th>
                <th>Tipo(cliente)</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->codcli }}</td>
                    <td>{{ $cliente->nomcli }}</td>
                    <td>{{ $cliente->apecli }}</td>
                    <td>{{ $cliente->tecli1 }}</td>
                    <td>{{ $cliente->tecli2 }}</td>
                    <td>{{ $cliente->dircli }}</td>
                    <td>{{ $cliente->corcli }}</td>
                    <td>{{ $cliente->cedrnc }}</td>
                    <td>{{ $cliente->codtpcli }}</td>
                    <td>{{ $cliente->estcli }}</td>

                    <td><a href="{{ url('/clientes/'.$cliente->codcli.'/editarClientes') }}">
                    Editar
                    </a>
                </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection