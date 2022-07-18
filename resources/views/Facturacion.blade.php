@extends('layouts.consulta-master')
<title>Facturacion</title>

@section('content')

    <h3>Facturacion</h3>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <form action="/Facturacion" method="POST">

    <div class="row">
        <div class="col-sm-7">
            <div class="tab-nav">
                <a href="/home">Home</a>
                <label for="form-label">/ Facturacion</label>
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

    @csrf

    <div class="row">

        <div class="col">
            <label for="codcli">Cliente</label>
            <input type="text" class="form-control" id="codcli" name="codcli" value="{{ old('codcli') }}" disabled>   
            @error('codcli')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="col-1" style="padding-top: 25px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable"><i class="fas fa-search"></i> Buscar</button>
        </div>
     
        <div class="col">
            <label for="nomcli">Nombre</label>
            <input type="text" class="form-control" id="nomcli" name="nomcli" value="{{ old('nomcli') }}" disabled>
            @error('nomcli')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="col">
            <label for="tecli1">Teléfono</label>
            <input type="tel" class="form-control" id="tecli1" name="tecli1" value="{{ old('tecli1') }}" disabled>
            @error('tecli1')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="col">
            <label for="cedrnc">Cedula</label>
            <input type="tel" class="form-control" id="cedrnc" name="cedrnc" value="{{ old('cedrnc') }}" disabled>
            @error('cedrnc')
                @include('layouts.partials.messages')
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="numfac">Factura No.</label>
            <input type="text" class="form-control" id="numfac" name="numfac" value="{{ old('numfac') }}" disabled>
            @error('numfac')
                @include('layouts.partials.messages')
            @enderror
        </div>
        <div class="col">
            <label for="fecha">Fecha</label>
            <input type="datetime-local" class="form-control" id="fecha" name="fecha" value="{{ old('fecha') }}" disabled>
            @error('fecha')
                @include('layouts.partials.messages')
            @enderror
        </div>
        <div class="col">
            <label for="concepto">Concepto</label>
            <select class="form-select" name="concepto" id="concepto">
                <option value="Venta" selected>Venta</option>
                <option value="Alquiler">Alquiler</option>
            </select>
        </div>
        <div class="col">
            <label for="condicion">Condicion</label>
            <select class="form-select" name="condicion" id="condicion">
                <option value="Al Contado" selected>Al Contado</option>
                <option value="Credito">Credito</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="codpro">Propiedad</label>
            <input type="text" class="form-control" id="codpro" name="codpro" value="{{ old('codpro') }} " disabled>
            @error('codpro')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="col-1" style="padding-top: 25px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable1"><i class="fas fa-search"></i> Buscar</button>
        </div>

        <div class="col">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" disabled>
            @error('titulo')
                @include('layouts.partials.messages')
            @enderror
        </div>
        <div class="col">
            <label for="preven">Precio de venta/renta</label>
            <input type="text" class="form-control" id="preven" name="preven" disabled>
            @error('preven')
                @include('layouts.partials.messages')
            @enderror
            <input type="hidden" class="form-control" id="preven" name="preren" disabled>
            @error('preren')
                @include('layouts.partials.messages')
            @enderror
        </div>
        <div class="col">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ old('cantidad') }}">
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
                <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{ old('cantidad') }}" disabled>
                @error('cantidad')
                    @include('layouts.partials.messages')
                @enderror
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="subtot">Subtotal</label>
            <input type="text" class="form-control" id="subtot" name="subtot" value="{{ old('subtot') }}" disabled>
            @error('subtot')
                @include('layouts.partials.messages')
            @enderror
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="itbis">Itbis</label>
            <input type="text" class="form-control" id="itbis" name="itbis" value="{{ old('itbis') }}" disabled>
            @error('itbis')
                @include('layouts.partials.messages')
            @enderror
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="total">Total</label>
            <input type="text" class="form-control" id="total" name="total" value="{{ old('total') }}" disabled>
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

    <div class="modal fade" id="exampleModalScrollable" role="dialog" tabindex="-1" aria-labelledby="Seleccionar cliente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle">Seleccionando Cliente</h3>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Cedula</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                    <tr>
                                        <th scope="row">{{$cliente->codcli}}</th>
                                        <td>{{$cliente->nomcli.' '.$cliente->apecli}}</td>
                                        <td>{{$cliente->tecli1}}</td>
                                        <td>{{$cliente->cedrnc}}</td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectCliente('{{$cliente->codcli}}', '{{$cliente->nomcli}}', '{{$cliente->apecli}}', '{{$cliente->tecli1}}', '{{$cliente->cedrnc}}')">
                                                <i class="fas fa-hand-pointer"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function selectCliente(codcli, nomcli, apecli, tecli1, cedrnc){
            document.getElementById('codcli').value = codcli;
            document.getElementById('nomcli').value = nomcli + ' ' + apecli;
            document.getElementById('tecli1').value = tecli1;
            document.getElementById('cedrnc').value = cedrnc;
        }

        event.preventDefault();
    </script>

    <div class="modal fade" id="exampleModalScrollable1" tabindex="-1" role="dialog" aria-labelledby="Seleccionar Propiedad" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle1">Seleccionando Propiedad</h3>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Precio de venta</th>
                                    <th scope="col">Precio de renta</th>
                                    <th scope="col">Itbis</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($propiedades as $propiedad)
                                    <tr>
                                        <th scope="row">{{$propiedad->codpro}}</th>
                                        <td>{{$propiedad->titulo}}</td>
                                        <td>{{$propiedad->preven}}</td>
                                        <td>{{$propiedad->preren}}</td>

                                        <td>
                                            <button class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectCliente('{{$propiedad->codpro}}', '{{$propiedad->titulo}}', '{{$propiedad->preven}}', '{{$propiedad->preren}}')">
                                                <i class="fas fa-hand-pointer"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>

        
        function selectCliente(codpro, titulo, preven, preren){
            document.getElementById('codpro').value = codpro;
            document.getElementById('titulo').value = titulo;
            document.getElementById('preven').value = preven;
            document.getElementById('preren').value = preren;
        }
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>

@endsection