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
            <input type="text" class="form-control" name="titulo" placeholder="Ingrese el Titulo/Nombre...">
            @error('titulo')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="descrip">Descripcion</label>
            <textarea type="text" class="form-control" name="descrip" rows="4" placeholder="Ingrese la descripcion..."></textarea>
            @error('descrip')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="fotos">Fotos</label>
            <input type="file" class="form-control" accept="image/*" multiple name="fotos">
            @error('fotos')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="habit">Habitaciones</label>
            <input type="number" class="form-control" name="habit" placeholder="Numero de habitaciones...">
            @error('habit')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="baños">Baños</label>
            <input type="number" class="form-control" name="baños" placeholder="Numero de baños...">
            @error('baños')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="metros">Metros</label>
            <input type="text" class="form-control" name="metros" placeholder="Metros...">
            @error('metros')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="parqueo">Parqueos</label>
            <input type="number" class="form-control" name="parqueo" placeholder="Numero de parqueos...">
            @error('parqueo')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="preven">Precio de venta</label>
            <input type="text" class="form-control" name="preven" placeholder="Ingrese precio de venta...">
            @error('preven')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="preren">Precio de renta</label>
            <input type="text" class="form-control" name="preren" placeholder="Ingrese precio de renta...">
            @error('preren')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="comision">Comision(ganacia)</label>
            <input type="text" class="form-control" name="comision" placeholder="Ingrese comision...">
            @error('comision')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="codcli">Cliente</label>
            <input type="text" class="form-control" name="codcli">
            @error('codcli')
            @include('layouts.partials.messages')
        @enderror
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
            <input type="text" class="form-control" name="citbis">
        </div>

        <input type="hidden" class="form-control" name="estpro" value="1">

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>
        
    </form>

@endsection