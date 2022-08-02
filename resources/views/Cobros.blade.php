@extends('layouts.consulta-master')
<title>Cobros</title>

@section('content')

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Formulario de Cobros</label>
    </div>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <form action="/Cobros" method="POST">

    <div class="row">
        <div class="col">  
            <h3>Formulario de Cobros</h3>
        </div>
        <div class="col">
            <div class="button-group" style="text-align: right;">
                <button type="button" class="btn btn-primary shadow-none" style="background: #1E88E5;"><i class="fas fa-file-pdf"></i> Print</button>
                <button type="reset" class="btn btn-primary shadow-none" style="background: #1976D2;"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
                <button type="submit" class="btn btn-primary shadow-none" style="background: #0ead69;"><i class="fa-solid fa-floppy-disk"></i> Save</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="codcli">Cliente</label>
            <div class="input-group">
                <input type="text" class="form-control" id="codcli" name="codcli" readonly>
                <button class="btn btn-primary shadow-none" style="background: #0ead69;" type="button" id="nuevo-cli" data-bs-toggle="modal" data-bs-target="#nuevoClienteModal"><i class="fa-solid fa-circle-plus"></i></button>
                <button class="btn btn-primary shadow-none" style="background: #1976D2;" type="button" id="buscar-cli" data-bs-toggle="modal" data-bs-target="#buscarClienteModal"><i class="fas fa-search"></i></button>  
            </div>
            @error('codcli')
                @include('layouts.partials.messages')
            @enderror
        </div>
     
        <div class="col">
            <label for="nomcli">Nombre</label>
            <input type="text" class="form-control" id="nomcli" name="nomcli" readonly>
        </div>

        <div class="col">
            <label for="tecli1">Teléfono</label>
            <input type="tel" class="form-control" id="tecli1" name="tecli1" readonly>
        </div>

        <div class="col">
            <label for="cedrnc">Cedula</label>
            <input type="tel" class="form-control" id="cedrnc" name="cedrnc"  readonly>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="codpag">Pago No.</label>
            <input type="text" class="form-control" name="codpag" disabled>
            @error('codpag')
                @include('layouts.partials.messages')
            @enderror
        </div>
        <div class="col">
            <label for="fecha">Fecha</label>
            <input type="datetime-local" class="form-control" name="fecha" readonly>
        </div>
        <div class="col">
            <label for="montpag">Monto a Pagar</label>
            <input type="number" step="0.01" class="form-control" name="montpag" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="observaciones">Observaciones</label>
            <textarea type="text" class="form-control" name="observaciones" rows="4"></textarea>
        </div>
        <div class="col" style="margin-top: 35px;">
                <label for="balance">Balance</label>
                <input type="number" step="0.01"  class="form-control" name="balance" readonly>
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="totpag">Total Pagado</label>
            <input type="number" step="0.01" class="form-control" name="totpag" readonly>
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="balpend">Balance Pendiente</label>
            <input type="number" step="0.01" class="form-control" name="balpend" readonly>
        </div>
    </div>

    </form>

    <div class="modal fade" id="buscarClienteModal" role="dialog" tabindex="-1" aria-labelledby="Seleccionar cliente" aria-hidden="true">
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
                                            <button type="button" class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectCliente('{{$cliente->codcli}}', '{{$cliente->nomcli}}', '{{$cliente->apecli}}', '{{$cliente->tecli1}}', '{{$cliente->cedrnc}}')">
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
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        document.getElementById('buscar-cli').addEventListener('click', onSearch);

        function onSearch(){
            var today = new Date();
            var date = today.getDate()+'/'+(today.getMonth()+1)+'/'+today.getFullYear();
            var time = today.getHours() + ":" + today.getMinutes();
            var dateTime = date+' '+time;

            document.getElementById('fecha').value = dateTime;
        }
   
        function selectCliente(codcli, nomcli, apecli, tecli1, cedrnc){
            document.getElementById('codcli').value = codcli;
            document.getElementById('nomcli').value = nomcli + ' ' + apecli;
            document.getElementById('tecli1').value = tecli1;
            document.getElementById('cedrnc').value = cedrnc;
        }

        function stopDefAction(evt){
            evt.preventDefault(evt);
        }
    </script>

<div class="modal fade" id="nuevoClienteModal" role="dialog" tabindex="-1" aria-labelledby="Nuevo Cliente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalScrollableTitle">Nuevo Cliente</h3>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/registrarClientesModal" method="POST">
                    @csrf
            
                    @if (Session::get('success', false))
                    @include('layouts.partials.messages')
                      @endif
            
                    <div class="mb-3">
                        <label for="nomcli">Nombre</label>
                        <input type="text" class="form-control" name="nomcli" value="{{ old('nomcli') }}" placeholder="Ingrese el nombre...">
                        @error('nomcli')
                            @include('layouts.partials.messages')
                        @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="apecli">Apellido</label>
                        <input type="text" class="form-control" name="apecli" value="{{ old('apecli') }}" placeholder="Ingrese el apellido...">
                        @error('apecli')
                        @include('layouts.partials.messages')
                    @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="tecli1">Teléfono 1</label>
                        <input type="tel" class="form-control" name="tecli1" value="{{ old('tecli1') }}" placeholder="Ingrese el teléfono 1...">
                        @error('tecli1')
                        @include('layouts.partials.messages')
                    @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="tecli2">Teléfono 2</label>
                        <input type="tel" class="form-control" name="tecli2" value="{{ old('tecli2') }}" placeholder="Ingrese el teléfono 2...">
                        @error('tecli2')
                        @include('layouts.partials.messages')
                    @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="dircli">Dirección</label>
                        <input type="text" class="form-control" name="dircli" value="{{ old('dircli') }}" placeholder="Ingrese la dirección...">
                        @error('dircli')
                        @include('layouts.partials.messages')
                    @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="corcli">Correo Electrónico</label>
                        <input type="text" class="form-control" name="corcli" value="{{ old('corcli') }}" placeholder="Ingrese el correo electrónico...">
                        @error('corcli')
                        @include('layouts.partials.messages')
                    @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="cedrnc">Cédula/RNC</label>
                        <input type="text" class="form-control" name="cedrnc" value="{{ old('cedrnc') }}" placeholder="Ingrese la cédula/RNC...">
                        @error('cedrnc')
                        @include('layouts.partials.messages')
                    @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="codtpcli">Tipo de Cliente</label>
                        <select class="form-select" id="codtpcli" name="codtpcli" value="{{ old('codtpcli') }}">
                            <option selected disabled>Seleccione el tipo de cliente...</option>
                            @foreach ($tipo_clientes as $tipo_cliente)
                                <option value="{{ $tipo_cliente->codtpcli}}" {{ (old('$tipo_cliente') == $tipo_cliente->codtpcli) ? 'selected' : ''}}>{{$tipo_cliente->tipcli}}</option>
                            @endforeach
                        </select>        
                    </div>
            
                    <input type="hidden" class="form-control" name="estcli" value="activo">
            
                    <div class="button-group">
                        <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
                        <button type="submit" class="btn btn-primary" id="crearClienteModal" ><i class="fa-solid fa-floppy-disk"></i> Save</button>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    document.getElementById('crearClienteModal').addEventListener('click', selectCliente);

    function selectCliente(codcli, nomcli, apecli, tecli1, cedrnc){
        document.getElementById('codcli').value = codcli;
        document.getElementById('nomcli').value = nomcli + ' ' + apecli;
        document.getElementById('tecli1').value = tecli1;
        document.getElementById('cedrnc').value = cedrnc;
    }

    function stopDefAction(evt){
        evt.preventDefault(evt);
    }
</script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
@endsection