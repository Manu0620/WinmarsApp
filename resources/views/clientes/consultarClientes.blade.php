@extends('layouts.consulta-master')
<title>Consulta de clientes</title>

@section('content')

    <h3>Consulta de clientes</h3>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <div class="button-group">
        <button type="submit" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Print</button>
        <button type="reset" class="btn btn-warning"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
        <a href="{{ url('registrarClientes') }}" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Nuevo cliente</a>

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
                    
                    <td><a href="{{ route('clientes', ['id' => $cliente->codcli]) }}" class="btn btn-warning btn-editar"><i class="fas fa-file-edit"></i> Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection