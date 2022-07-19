@extends('layouts.consulta-master')
<title>Consulta de Solicitudes</title>

@section('content')

    <h3>Consulta de Solicitudes</h3>

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Consulta de Solicitudes</label>
    </div>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <div class="button-group">
        <button type="submit" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Print</button>
        <button type="reset" class="btn btn-warning"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
        <a href="{{ url('registrarSolicitudes') }}" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Nueva solicitud</a>

    </div>

    <table class="table table-striped table-hover table-borderless align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Propiedad</th>
                <th>Comentario</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($solicitudes as $solicitud)
                <tr>
                    <td scope="row">{{ $solicitud->codsol }}</td>
                    <td>{{ $solicitud->codcli }}</td>
                    <td>{{ $solicitud->codpro }}</td>
                    <td>{{ $solicitud->comentario }}</td>
                    <td>{{ $solicitud->fecha }}</td>
                    @if($solicitud->estsol == 'Pendiente')
                        <td><div class="btn btn-warning">{{ $solicitud->estsol}}</div></td>
                    @elseif($solicitud->estsol == 'Procesada')
                        <td><div class="btn btn-success">{{ $solicitud->estsol}}</div></td>
                    @endif
                    
                    <td>
                        <a href="{{ route('solicitudes', ['id' => $solicitud->codsol]) }}" class="btn btn-warning btn-editar"><i class="fas fa-file-edit"></i></a>
                        <a href="{{ route('rechazarSolicitud', ['id' => $solicitud->codsol]) }}" class="btn btn-danger btn-editar"><i class="fas fa-ban"></i></a>
                        <a href="{{ route('agendarCita', ['id' => $solicitud->codsol]) }}" class="btn btn-success btn-editar"><i class="fas fa-check"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection