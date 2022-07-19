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

    <table id="dataTable" class="table table-striped table-hover table-borderless align-middle">
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
                    <td scope="row">{{ $cliente->codcli }}</td>
                    <td>{{ $cliente->nomcli }}</td>
                    <td>{{ $cliente->apecli }}</td>
                    <td>{{ $cliente->tecli1 }}</td>
                    <td>{{ $cliente->tecli2 }}</td>
                    <td>{{ $cliente->dircli }}</td>
                    <td>{{ $cliente->corcli }}</td>
                    <td>{{ $cliente->cedrnc }}</td>
                    @if($cliente->codtpcli == '1')
                        <td>{{$cliente->codtpcli='Comprador'}}</td>
                    @elseif($cliente->codtpcli == '2')
                        <td>{{$cliente->codtpcli='Vendedor'}}</td>
                    @endif
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

@endsection