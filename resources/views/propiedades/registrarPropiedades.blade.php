@extends('layouts.formulario-master')
<title>Registro de Propiedades</title>

@section('content')

    <h3>Formulario de Propiedades</h3>

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Formulario de Propiedades</label>
    </div>

    <form action="/registrarPropiedades" method="POST" enctype="multipart/form-data">
        @csrf

        @if (Session::get('success', false))
        @include('layouts.partials.messages')
          @endif
        
        <div class="mb-3">
            <label for="titulo">Titulo/nombre</label>
            <input type="text" class="form-control" name="titulo" placeholder="Ingrese el Titulo/Nombre..." value="{{ old('titulo') }}">
            @error('titulo')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="descrip">Descripcion</label>
            <textarea type="text" class="form-control" name="descrip" rows="4" placeholder="Ingrese la descripcion..." value="{{ old('descrip') }}"></textarea>
            @error('descrip')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="fotos">Fotos</label>
            <input type="file" class="form-control" accept="image/*" multiple name="fotos" value="{{ old('fotos') }}">
            @error('fotos')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="habit">Habitaciones</label>
            <input type="number" class="form-control" name="habit" placeholder="Numero de habitaciones..." value="{{ old('habit') }}">
            @error('habit')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="baños">Baños</label>
            <input type="number" class="form-control" name="baños" placeholder="Numero de baños..." value="{{ old('baños') }}">
            @error('baños')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="metros">Metros</label>
            <input type="text" class="form-control" name="metros" placeholder="Metros..." value="{{ old('metros') }}">
            @error('metros')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="parqueo">Parqueos</label>
            <input type="number" class="form-control" name="parqueo" placeholder="Numero de parqueos..." value="{{ old('parqueo') }}">
            @error('parqueo')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="preven">Precio de venta</label>
            <input type="text" class="form-control" name="preven" placeholder="Ingrese precio de venta..." value="{{ old('preven') }}">
            @error('preven')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="preren">Precio de renta</label>
            <input type="text" class="form-control" name="preren" placeholder="Ingrese precio de renta..." value="{{ old('preren') }}">
            @error('preren')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="comision">Comision(ganacia)</label>
            <input type="text" class="form-control" name="comision" placeholder="Ingrese comision..." value="{{ old('comision') }}">
            @error('comision')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="codtpro">Cliente</label>
            <select class="form-select" id="codcli" name="codcli" value="{{ old('codcli') }}">
                <option selected disabled>Seleccione el cliente...</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->codcli}}" {{ (old('$cliente') == $cliente->codcli) ? 'selected' : ''}}>{{$cliente->nomcli.' '.$cliente->apecli.' | '.$cliente->cedrnc}}</option>
                @endforeach
            </select> 
        </div>

        <div class="mb-3">
            <label for="codtpro">Tipo de Propiedad</label>
            <select class="form-select" id="codtpro" name="codtpro" value="{{ old('codtpro') }}">
                <option selected disabled>Seleccione el tipo de propiedad...</option>
                @foreach ($tipo_propiedades as $tipo_propiedad)
                    <option value="{{ $tipo_propiedad->codtpro}}" {{ (old('$tipo_propiedad') == $tipo_propiedad->codtpro) ? 'selected' : ''}}>{{$tipo_propiedad->tippro}}</option>
                @endforeach
            </select>    
        </div>

        <div class="mb-3">
            <label for="citbis">Itbis</label>
            <select class="form-select" id="citbis" name="citbis" value="{{ old('citbis') }}">
                <option selected disabled>Seleccione el porcentaje de Itbis...</option>
                @foreach ($itbis as $itbis)
                    <option value="{{ $itbis->citbis}}" {{ (old('$itbis') == $itbis->citbis) ? 'selected' : ''}}>{{$itbis->itbis}}</option>
                @endforeach
            </select>
        </div>

        <input type="hidden" class="form-control" name="estpro" value="activo">

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>
        
    </form>

@endsection