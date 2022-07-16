@extends('layouts.formulario-master')
<title>Registro de Solicitudes</title>

@section('content')
    
    <h3>Solicitudes</h3>

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Formulario de Solicitudes</label>
    </div>

    <form action="/registrarSolicitudes" method="POST">
        @csrf

        @if (Session::get('success', false))
            @include('layouts.partials.messages')
        @endif
        
        <div class="mb-3">
            <label for="codcli">Cliente</label>
            <input type="text" class="form-control" name="codcli" value="{{ old('codcli') }}">
            @error('codcli')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="codpro">Propiedad</label>
            <input type="text" class="form-control" name="codpro" value="{{ old('codpro') }}">
            @error('codpro')
                @include('layouts.partials.messages')
            @enderror  
        </div>

        <div class="mb-3">
            <label for="comentario">Comentario</label>
            <textarea type="text" class="form-control" rows="4" cols="50" name="comentario" placeholder="Escriba su comentario...">{{ old('comentario') }}</textarea>
            @error('comentario')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="estsol">Estado</label>
            <select class="form-select" name="estsol" disabled>
                <option value="Pendiente" selected>Pendiente</option>
                <option value="Procesada">Procesada</option>
            </select>
        </div>

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>
        
    </form>

@endsection