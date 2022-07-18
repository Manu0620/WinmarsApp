@extends('layouts.consulta-master')
<title>Cotizacion</title>

@section('content')

    <h3>Cotizacion</h3>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <div class="row">
        <div class="col-sm-7">
            <div class="tab-nav">
                <a href="/home">Home</a>
                <label for="form-label">/ Cotizaicion</label>
            </div>
        </div>
        <div class="col">
            <div class="button-group">
                <button type="submit" class="btn btn-primary"><i class="fas fa-file-pdf"></i> Comprobante</button>
                <button type="submit" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Print</button>
                <button type="reset" class="btn btn-warning"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
                <button type="reset" class="btn btn-success"><i class="fas fa-plus"></i> Add Property</button>
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
            <label for="numfac">Cotizacion No.</label>
            <input type="text" class="form-control" name="numfac" value="{{ old('numfac') }}" disabled>
            @error('numfac')
                @include('layouts.partials.messages')
            @enderror
        </div>
        <div class="col">
            <label for="fecha">Fecha</label>
            <input type="datime-local" class="form-control" name="fecha" value="{{ old('fecha') }}" disabled>
            @error('fecha')
                @include('layouts.partials.messages')
            @enderror
        </div>
        <div class="col">
            <label for="concepto">Concepto</label>
            <select class="form-select" name="concepto">
                <option value="Venta" selected>Venta</option>
                <option value="Alquiler">Alquiler</option>
            </select>
        </div>
        <div class="col">
            <label for="condicion">Condicion</label>
            <select class="form-select" name="condicion">
                <option value="Al Contado" selected>Al Contado</option>
                <option value="Credito">Credito</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="codpro">Propiedad</label>
            <input type="text" class="form-control" name="codpro" value="{{ old('codpro') }}" disabled>
            @error('codpro')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="col-1" style="padding-top: 25px;">
            <button type="button" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
        </div>

        <div class="col">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" disabled>
            @error('titulo')
                @include('layouts.partials.messages')
            @enderror
        </div>
        <div class="col">
            <label for="preven">Precio de venta/renta</label>
            <input type="text" class="form-control" name="preven" disabled>
            @error('preven')
                @include('layouts.partials.messages')
            @enderror
            <input type="hidden" class="form-control" name="preren" disabled>
            @error('preren')
                @include('layouts.partials.messages')
            @enderror
        </div>
        <div class="col">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" value="{{ old('cantidad') }}">
            @error('fecha')
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
                <label for="cantidad">Cantidad de propiedades</label>
                <input type="text" class="form-control" name="cantidad" value="{{ old('cantidad') }}" disabled>
                @error('cantidad')
                    @include('layouts.partials.messages')
                @enderror
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="subtot">Subtotal</label>
            <input type="text" class="form-control" name="subtot" value="{{ old('subtot') }}" disabled>
            @error('subtot')
                @include('layouts.partials.messages')
            @enderror
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="itbis">Itbis</label>
            <input type="text" class="form-control" name="itbis" value="{{ old('itbis') }}" disabled>
            @error('itbis')
                @include('layouts.partials.messages')
            @enderror
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="total">Total</label>
            <input type="text" class="form-control" name="total" value="{{ old('total') }}" disabled>
            @error('total')
                @include('layouts.partials.messages')
            @enderror
        </div>
    </div>

    <table class="table table-striped table-hover table-borderless align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Concepto</th>
                <th>Condicion</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Itbis</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>

@endsection