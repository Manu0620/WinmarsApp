@extends('layouts.consulta-master')
<title>Consulta de Propiedades</title>

@php
    $rol = auth()->user()->rol;
@endphp

@section('content')
    @if($rol == 'Administrador' || $rol == 'Usuario')

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
                    @if($propiedad->estpro == 'inactivo')
                        <td><div class="btn btn-warning">{{ $propiedad->estpro}}</div></td>
                    @elseif($propiedad->estpro == 'activo')
                        <td><div class="btn btn-success">{{ $propiedad->estpro}}</div></td>
                    @endif 
                    
                    <td>
                        <a href="{{ route('propiedades', ['id' => $propiedad->codpro]) }}" class="btn btn-warning btn-editar"><i class="fas fa-file-edit"></i></a>
                        <a href="{{ route('inhabilitarPropiedad', ['id' => $propiedad->codpro]) }}" class="btn btn-danger btn-editar"><i class="fas fa-ban"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <h3>No puede acceder a esta pagina, retornar a <a href="/home">Home</a></h3>
    @endif
@endsection