@extends('layouts.formulario-master')
<title>Edicion de Propiedades</title>

@section('content')

    <div class="tab-nav">
        <a href="{{ url()->previous() }}">Atras</a>
        <label>/</label> 
        <a> Formulario de Propiedades</a>
    </div>

    <h3>Formulario de Propiedades</h3>

    <form action="/updatePropiedad" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')

        @if (Session::get('success', false))
        @include('layouts.partials.messages')
          @endif

        <input type="hidden" name="codpro" value="{{ $_GET['propiedad'] }}">
        
        <div class="mb-3">
            <label for="titulo">Titulo/nombre</label>
            <input type="text" class="form-control" name="titulo" placeholder="Ingrese el Titulo/Nombre..." value="{{ $propiedad->titulo }}">
            @error('titulo')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="descrip">Descripcion</label>
            <textarea type="text" class="form-control" name="descrip" rows="4" placeholder="Ingrese el descripcion...">{{ $propiedad->descrip }}</textarea>
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
            <input type="number" class="form-control" name="habit" placeholder="Numero de habitaciones..." value="{{ $propiedad->habit }}">
            @error('habit')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="baños">Baños</label>
            <input type="number" class="form-control" name="baños" placeholder="Numero de baños..." value="{{ $propiedad->baños }}">
            @error('baños')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="metros">Metros</label>
            <input type="text" class="form-control" name="metros" placeholder="Metros..." value="{{ $propiedad->metros }}">
            @error('metros')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="parqueo">Parqueos</label>
            <input type="number" class="form-control" name="parqueo" placeholder="Numero de parqueos..." value="{{ $propiedad->parqueo }}">
            @error('parqueo')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="preven">Precio de venta</label>
            <input type="text" class="form-control" name="preven" placeholder="Ingrese precio de venta..." value="{{ $propiedad->preven }}">
            @error('preven')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="preren">Precio de renta</label>
            <input type="text" class="form-control" name="preren" placeholder="Ingrese precio de renta..." value="{{ $propiedad->preren }}">
            @error('preren')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="comision">Comision(ganacia)</label>
            <input type="text" class="form-control" name="comision" placeholder="Ingrese comision..." value="{{ $propiedad->comision }}">
            @error('comision')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="codcli">Cliente</label>
            <input type="text" class="form-control" name="codcli" value="{{ $propiedad->codcli }}">
            @error('codcli')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="codtpro">Tipo de Propiedad</label>
            <select class="form-select" name="codtpro">
                <option selected>Tipo de propiedad...</option>
                <option value="1">Apartamento</option>
                <option value="2">Casa</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="citbis">Itbis</label>
            <input type="text" class="form-control" name="citbis" value="{{ $propiedad->citbis }}">
        </div>

        <input type="hidden" class="form-control" name="estpro" value="1">

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>
        
    </form>

@endsection