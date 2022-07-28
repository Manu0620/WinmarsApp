@extends('layouts.consulta-master')
<title>Consulta de Clientes</title>

@php
    use App\Models\tipo_clientes;
@endphp

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
                    @php $tipcli = tipo_clientes::where('codtpcli',$cliente->codtpcli)->first() @endphp
                    <td>{{ $tipcli->codtpcli.' - '.$tipcli->tipcli }}</td>
                    @if($cliente->estcli == 'inactivo')
                        <td><li class="btn btn-warning">{{ $cliente->estcli}}</li></td>
                    @elseif($cliente->estcli == 'activo')
                        <td><li class="btn btn-success">{{ $cliente->estcli}}</li></td>
                    @endif 
                    
                    <td>
                        <a href='editCustomer?c={{$cliente->codcli}}' role="button" class="btn btn-warning btn-editar"><i class="fas fa-file-edit"></i></a>
                        <a href="{{ route('inhabilitarCliente', ['id' => $cliente->codcli]) }}" role="button" class="btn btn-danger btn-editar"><i class="fas fa-ban"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

@endsection