@extends('layouts.formulario-master')

@section('content')

    <h3>Formulario de Propiedades</h3>

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Formulario de Propiedades</label>
    </div>

    <form action="/registrarPropiedades" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="titulo">Titulo/nombre</label>
            <input type="text" class="form-control" name="titulo" placeholder="Ingrese el Titulo/Nombre...">
        </div>

        <div class="mb-3">
            <label for="descrip">Descripcion</label>
            <textarea type="text" class="form-control" name="descrip" rows="4" placeholder="Ingrese el descripcion..."></textarea>
        </div>

        <div class="mb-3">
            <label for="fotos">Fotos</label>
            <input type="file" class="form-control" multiple name="fotos">
        </div>

        <div class="mb-3">
            <label for="habit">Habitaciones</label>
            <input type="number" class="form-control" name="habit" placeholder="Numero de habitaciones...">
        </div>

        <div class="mb-3">
            <label for="baños">Baños</label>
            <input type="number" class="form-control" name="baños" placeholder="Numero de baños...">
        </div>

        <div class="mb-3">
            <label for="metros">Metros</label>
            <input type="text" class="form-control" name="metros" placeholder="Metros...">
        </div>

        <div class="mb-3">
            <label for="parqueo">Parqueos</label>
            <input type="number" class="form-control" name="parqueo" placeholder="Numero de parqueos...">
        </div>

        <div class="mb-3">
            <label for="preven">Precio de venta</label>
            <input type="text" class="form-control" name="preven" placeholder="Ingrese precio de venta...">
        </div>

        <div class="mb-3">
            <label for="preren">Precio de renta</label>
            <input type="text" class="form-control" name="preren" placeholder="Ingrese precio de renta...">
        </div>

        <div class="mb-3">
            <label for="comision">Comision(ganacia)</label>
            <input type="text" class="form-control" name="comision" placeholder="Ingrese comision...">
        </div>

        <div class="mb-3">
            <label for="codcli">Cliente</label>
            <input type="text" class="form-control" name="codcli">
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
            <input type="text" class="form-control" name="citbis">
        </div>

        <div class="mb-3">
            <label for="estpro">Estado</label>
            <select class="form-select" name="estpro">
                <option value="activo" selected>Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>
        
    </form>

@endsection