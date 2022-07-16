@extends('layouts.consulta-master')
<title>Consulta de Propiedades</title>

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
        <a href="{{ url('registrarPropiedades') }}" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Nuevo cliente</a>

    </div>

    <table class="table table-striped table-hover table-borderless align-middle">
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
                <th>Tipo Cliente</th>
                <th>Itbis</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($propiedades as $propiedad)
                <tr>
                    <td>{{ $propiedad->codpro }}</td>
                    <td>{{ $propiedad->titulo }}</td>
                    <td><textarea disabled>{{ $propiedad->descrip }}</textarea></td>
                    <td>{{ $propiedad->habit }}</td>
                    <td>{{ $propiedad->baños }}</td>
                    <td>{{ $propiedad->metros }}</td>
                    <td>{{ $propiedad->parqueo }}</td>
                    <td>{{ $propiedad->preven }}</td>
                    <td>{{ $propiedad->preren }}</td>
                    <td>{{ $propiedad->comision }}</td>
                    <td>{{ $propiedad->codcli }}</td>
                    <td>{{ $propiedad->codtpro }}</td>
                    <td>{{ $propiedad->citbis }}</td>
                    <td>{{ $propiedad->estpro }}</td>   
                    
                    <td><a href="{{ route('propiedades', ['id' => $propiedad->codpro]) }}" class="btn btn-warning btn-editar"><i class="fas fa-file-edit"></i> Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection