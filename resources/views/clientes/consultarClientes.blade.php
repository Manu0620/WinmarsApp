@extends('layouts.consulta-master')
<title>Consulta de Clientes</title>

@section('content')

    <h3>Consulta de Clientes</h3>

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Consulta de Clientes</label>
    </div>

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
                    @if($cliente->estcli == 'inactivo')
                        <td><div class="btn btn-warning">{{ $cliente->estcli}}</div></td>
                    @elseif($cliente->estcli == 'activo')
                        <td><div class="btn btn-success">{{ $cliente->estcli}}</div></td>
                    @endif 
                    
                    <td>
                        <a href="{{ route('clientes', ['id' => $cliente->codcli]) }}" class="btn btn-warning btn-editar"><i class="fas fa-file-edit"></i></a>
                        <a href="{{ route('inhabilitarCliente', ['id' => $cliente->codcli]) }}" class="btn btn-danger btn-editar"><i class="fas fa-ban"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection