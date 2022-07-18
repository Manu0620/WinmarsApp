@extends('layouts.consulta-master')
<title>Cobros</title>

@section('content')

    <h3>Formulario de Cobros</h3>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <div class="row">
        <div class="col-sm-9">
            <div class="tab-nav">
                <a href="/home">Home</a>
                <label for="form-label">/ Formulario de Cobros</label>
            </div>
        </div>
        <div class="col">
            <div class="button-group">
                <button type="submit" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Print</button>
                <button type="reset" class="btn btn-warning"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
                <button type="reset" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Save</button>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col">
            <label for="codcli">Cliente</label>
            <input type="text" class="form-control" name="codcli" value="{{ old('codcli') }}" disabled>   
            @error('codcli')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="col-1" style="padding-top: 25px;">
            <button type="button" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
        </div>
    
        <div class="col">
            <label for="nomcli">Nombre</label>
            <input type="text" class="form-control" name="nomcli" value="{{ old('nomcli') }}" disabled>
            @error('nomcli')
                @include('layouts.partials.messages')
            @enderror
        </div>
    
        <div class="col">
            <label for="apecli">Apellido</label>
            <input type="text" class="form-control" name="apecli" value="{{ old('apecli') }}" disabled>
            @error('apecli')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="col">
            <label for="tecli1">Teléfono</label>
            <input type="tel" class="form-control" name="tecli1" value="{{ old('tecli1') }}" disabled>
            @error('tecli1')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="col">
            <label for="cedrnc">Cedula</label>
            <input type="tel" class="form-control" name="cedrnc" value="{{ old('cedrnc') }}" disabled>
            @error('cedrnc')
                @include('layouts.partials.messages')
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="codpag">Pago No.</label>
            <input type="text" class="form-control" name="codpag" value="{{ old('codpag') }}" disabled>
            @error('codpag')
                @include('layouts.partials.messages')
            @enderror
        </div>
        <div class="col">
            <label for="fecha">Fecha</label>
            <input type="datetime-local" class="form-control" name="fecha" value="{{ old('fecha') }}" readonly>
            @error('fecha')
                @include('layouts.partials.messages')
            @enderror
        </div>
        <div class="col">
            <label for="montpag">Monto a Pagar</label>
            <input type="text" class="form-control" name="montpag" value="{{ old('montpag') }}" disabled>
            @error('montpag')
                @include('layouts.partials.messages')
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="observaciones">Observaciones</label>
            <textarea type="text" class="form-control" name="observaciones" rows="4"></textarea>
            @error('observaciones')
                @include('layouts.partials.messages')
            @enderror
        </div>
        <div class="col" style="margin-top: 35px;">
                <label for="balance">Balance</label>
                <input type="text" class="form-control" name="balance" value="{{ old('balance') }}" disabled>
                @error('balance')
                    @include('layouts.partials.messages')
                @enderror
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="totpag">Total Pagado</label>
            <input type="text" class="form-control" name="totpag" value="{{ old('totpag') }}" disabled>
            @error('totpag')
                @include('layouts.partials.messages')
            @enderror
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="balpend">Balance Pendiente</label>
            <input type="text" class="form-control" name="balpend" value="{{ old('balpend') }}" disabled>
            @error('itbis')
                @include('layouts.partials.messages')
            @enderror
        </div>
    </div>

@endsection