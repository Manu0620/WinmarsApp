@extends('layouts.consulta-master')
<title>Consulta de Propiedades</title>

@php
    use App\Models\clientes;
@endphp

@section('content')
    <h3>Consulta de Propiedades</h3>

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Consulta de Propiedades</label>
    </div>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <div class="button-group">
        <button type="submit" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Print</button>
        <button type="reset" class="btn btn-warning"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
        <a href="{{ url('registrarPropiedades') }}" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Nueva propiedad</a>

    </div>

    <table id="dataTable" class="table table-striped table-hover table-borderless align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Habitaciones</th>
                <th>Baños</th>
                <th>Metros</th>
                <th>Parqueos</th>
                <th>Pre. Venta</th>
                <th>Pre. Renta</th>
                <th>Comision</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($propiedades as $propiedad)
                <tr>
                    <td scope="row">{{ $propiedad->codpro }}</td>
                    <td>{{ $propiedad->titulo }}</td>
                    <td><textarea readonly cols="40" rows="3">{{ $propiedad->descrip }}</textarea></td>
                    <td>{{ $propiedad->habit }}</td>
                    <td>{{ $propiedad->baños }}</td>
                    <td>{{ $propiedad->metros }}</td>
                    <td>{{ $propiedad->parqueo }}</td>
                    <td>{{ $propiedad->preven }}</td>
                    <td>{{ $propiedad->preren }}</td>
                    <td>{{ $propiedad->comision }}</td>
                    @php $clientes = clientes::where('codcli',$propiedad->codcli)->first() @endphp
                    <td>{{ $clientes->codcli. ' - ' .$clientes->nomcli. '  ' .$clientes->apecli }}</td>
                    @if($propiedad->estpro == 'inactivo')
                        <td><li class="btn btn-warning">{{ $propiedad->estpro}}</li></td>
                    @elseif($propiedad->estpro == 'activo')
                        <td><li class="btn btn-success">{{ $propiedad->estpro}}</li></td>
                    @endif 
                    
                    <td>
                        <a href="{{ route('propiedades', ['id' => $propiedad->codpro]) }}" class="btn btn-warning btn-editar"><i class="fas fa-file-edit"></i></a>
                        <a href="{{ route('inhabilitarPropiedad', ['id' => $propiedad->codpro]) }}" class="btn btn-danger btn-editar"><i class="fas fa-ban"></i></a>
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