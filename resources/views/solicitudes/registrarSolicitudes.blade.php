@extends('layouts.formulario-master')
<title>Registro de Solicitudes</title>

@section('content')
    
    <div class="tab-nav">
        <a href="{{ url()->previous() }}">Atras</a>
        <label>/</label> 
        <a> Formulario de Solicitudes</a>
    </div>

    <h3>Enviar Solicitud</h3>

    <form action="/registrarSolicitudes" method="POST">
        @csrf

        @if (Session::get('success', false))
            @include('layouts.partials.messages')
        @endif

        <div class="row">
            <div class="col">
                <label for="codcli">Cliente</label>
                <input type="text" class="form-control" name="codcli" id="codcli" value="{{ old('codcli') }}" readonly>
            </div>
            <div class="col-1" style="padding-top:1.8%;">
                <button type="button" class="btn btn-primary" id="buscar-cli" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable"><i class="fas fa-search"></i></button>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <label for="codpro">Propiedad</label>
                <input type="text" class="form-control" name="codpro" id="codpro" value="{{ old('codpro') }}" readonly> 
            </div>
            <div class="col-1" style="padding-top: 1.8%;">
                <button type="button" class="btn btn-primary" id="buscar-pro" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable1"><i class="fas fa-search"></i></button>
            </div>
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

    <div class="modal fade" id="exampleModalScrollable" role="dialog" tabindex="-1" aria-labelledby="Seleccionar cliente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle">Seleccionando Cliente</h3>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <table class="table table-responsive" id="dataTable">
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
                                        <td scope="row">{{$cliente->codcli}}</td>
                                        <td>{{$cliente->nomcli.' '.$cliente->apecli}}</td>
                                        <td>{{$cliente->tecli1}}</td>
                                        <td>{{$cliente->cedrnc}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectCliente('{{$cliente->codcli}}')">
                                                <i class="fas fa-hand-pointer"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#dataTable').DataTable();
                            });
                        </script>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript"> 
        function selectCliente(codcli){
            document.getElementById('codcli').value = codcli;
        }
    </script>

    <div class="modal fade" id="exampleModalScrollable1" tabindex="-1" role="dialog" aria-labelledby="Seleccionar Propiedad" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle1">Seleccionando Propiedad</h3>
                    <button type="button" class="btn btn-primary" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <table class="table table-responsive" id="dataTable1">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Habitaciones</th>
                                    <th scope="col">Baños</th>
                                    <th scope="col">Metros</th>
                                    <th scope="col">Parqueos</th>
                                    <th scope="col">Precio de venta</th>
                                    <th scope="col">Precio de renta</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($propiedades as $propiedad)
                                    <tr>
                                        <td scope="row">{{$propiedad->codpro}}</td>
                                        <td>{{$propiedad->titulo}}</td>
                                        <td>{{$propiedad->habit}}</td>
                                        <td>{{$propiedad->baños}}</td>
                                        <td>{{$propiedad->metros}}</td>
                                        <td>{{$propiedad->parqueo}}</td>
                                        <td>{{$propiedad->preven}}</td>
                                        <td>{{$propiedad->preren}}</td>

                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectPropiedad('{{$propiedad->codpro}}')">
                                                <i class="fas fa-hand-pointer"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#dataTable1').DataTable();
                            });
                        </script>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function selectPropiedad(codpro){
            document.getElementById('codpro').value = codpro;
        }
    </script>

@endsection