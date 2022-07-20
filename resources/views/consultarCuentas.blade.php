@extends('layouts.consulta-master')
<title>Consultar Cuentas</title>

@php
    $rol = auth()->user()->rol;
@endphp

@section('content')

@if($rol == 'Administrador' || $rol == 'Usuario')
     
    <h3>Consulta de Cuentas</h3>

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Cosulta de cuentas</label>
    </div>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <div class="button-group">
        <button type="submit" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Print</button>
        <button type="reset" class="btn btn-warning"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>

    </div>

    <table id="dataTable" class="table table-striped table-hover table-borderless align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Factura</th>
                <th>Nalance</th>
                <th>Total pagado</th>
                <th>Balance Pendiente</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cuentas as $cuenta)
                <tr>
                    <td scope="row">{{ $cuenta->codcue }}</td>
                    <td>{{ $cuenta->codcli }}</td>
                    <td>{{ $cuenta->numfac }}</td>
                    <td>{{ $cuenta->balance }}</td>
                    <td>{{ $cuenta->totpag }}</td>
                    <td>{{ $cuenta->balpend }}</td>
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

@else
    <h3>No puede acceder a esta pagina, retornar a <a href="/home">Home</a></h3>
@endif

@endsection