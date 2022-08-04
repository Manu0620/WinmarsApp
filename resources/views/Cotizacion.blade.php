@extends('layouts.consulta-master')
<title>Cotizacion</title>

@section('content')

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Cotizacion</label>
    </div>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <form action="/Cotizacion" method="POST" id="formulario">

        @csrf

    <div class="row">
        <div class="col">
            <h3>Cotizacion</h3>
        </div>
        <div class="col">
            <div class="button-group" style="text-align: right;">
                <button type="button" class="btn btn-primary shadow-none" style="background: #2196F3;"><i class="fas fa-file-pdf"></i> Comprobante</button>
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
            
        </div>
        <div class="col">
            <label for="fecha">Fecha</label>
            <input type="datetime" class="form-control" id="fecha" name="fecha" disabled>
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
        <div class="col">
            
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="codpro">Propiedad</label>
            <div class="input-group">
                <input type="text" class="form-control" id="codpro" name="codpro" readonly>
                <button class="btn btn-primary shadow-none" style="background: #0ead69;" type="button" id="nueva-pro" data-bs-toggle="modal" data-bs-target="#nuevaPropiedadModal"><i class="fa-solid fa-circle-plus"></i></button>
                <button class="btn btn-primary shadow-none" style="background: #1976D2;" type="button" id="buscar-pro" data-bs-toggle="modal" data-bs-target="#buscarPropiedadModal"><i class="fas fa-search"></i></button>  
            </div>
            @error('codpro')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="col">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" readonly>
        </div>
        <div class="col">
            <label for="preven">Precio de venta/renta</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" style="text-align: right;" class="form-control" id="precio" name="precio" value="0.00" readonly>
            </div>
        </div>
        <div class="col">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" readonly>
            @error('cantidad')
                @include('layouts.partials.messages')
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="observaciones">Observaciones</label>
            <textarea type="text" class="form-control" name="observaciones" rows="4"></textarea>
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="subtot">Subtotal</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" style="text-align: right;" class="form-control" id="subtot" name="subtot" value="0.00" readonly>
            </div>
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="subtot">Itbis</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" style="text-align: right;" class="form-control" id="itbis" name="itbis" value="0.00" readonly>
            </div>
            <input type="text" style="text-align: right;" class="form-control" id="itbis-fijo" name="itbis-fijo" value="0.00" hidden>
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="subtot">Total</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" style="text-align: right;" class="form-control" id="total" name="total" value="0.00" readonly>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="button-group" style="text-align: right;">
            <button type="button" class="btn btn-primary shadow-none" style="background: #0ead69;"><i class="fa-solid fa-circle-plus"></i> Agregar</button>
        </div>
    </div>

</form>

    <table class="table table-striped table-hover table-borderless align-middle">
        <thead>
            <tr>
                <th>Propiedad</th>
                <th>Cliente</th>
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
                                                <i class="fa-solid fa-check"></i>
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

    <div class="modal fade" id="buscarPropiedadModal" tabindex="-1" role="dialog" aria-labelledby="Seleccionar Propiedad" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle1">Seleccionando Propiedad</h3>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                                    <th scope="col">Precio de venta</th>
                                    <th scope="col">Precio de renta</th>
                                    <th scope="col">Itbis</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($propiedades as $propiedad)
                                    <tr>
                                        <td scope="row">{{$propiedad->codpro}}</td>
                                        <td>{{$propiedad->titulo}}</td>
                                        <td>{{$propiedad->preven}}</td>
                                        <td>{{$propiedad->preren}}</td>
                                        <td>{{$propiedad->itbis}}</td>

                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectPropiedad('{{$propiedad->codpro}}', '{{$propiedad->titulo}}','{{$propiedad->preven}}', '{{$propiedad->preren}}','{{$propiedad->itbis}}')">
                                                <i class="fa-solid fa-check"></i>
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

    <script>

        var pventa, prenta, itb = 0;
        const cero = parseFloat(0).toFixed(2);

        document.getElementById('cantidad').addEventListener('click', updateValue);
        document.getElementById('cantidad').addEventListener('onchange', updateValue);
        document.getElementById('concepto').addEventListener('click', conceptoChange);


        function updateValue(e){
            if(document.getElementById('cantidad').value < 1){ document.getElementById('cantidad').value = 1 }
            document.getElementById('subtot').value = (parseFloat(document.getElementById('precio').value)*parseInt(document.getElementById('cantidad').value)).toFixed(2);
            document.getElementById('itbis').value = (parseFloat(document.getElementById('subtot').value)*parseFloat(document.getElementById('itbis-fijo').value)).toFixed(2); 
            document.getElementById('total').value = (parseFloat(document.getElementById('subtot').value)+parseFloat(document.getElementById('itbis').value)).toFixed(2);
        }

        function conceptoChange(e){
            var concepto = document.getElementById('concepto').value;
            if(concepto == 'Venta'){
                document.getElementById('precio').value = parseFloat(pventa).toFixed(2);      
                document.getElementById('cantidad').value = 1;        
                document.getElementById('subtot').value = (parseFloat(pventa)*parseInt(document.getElementById('cantidad').value)).toFixed(2);
                document.getElementById('itbis').value = (parseFloat(document.getElementById('subtot').value)*parseFloat(itb)).toFixed(2); 
                document.getElementById('total').value = (parseFloat(document.getElementById('subtot').value)+parseFloat(document.getElementById('itbis').value)).toFixed(2);
                document.getElementById('cantidad').readOnly = true;
            }else{  
                document.getElementById('precio').value = parseFloat(prenta).toFixed(2);
                document.getElementById('cantidad').value = 1;
                document.getElementById('subtot').value = (parseFloat(prenta)*parseInt(document.getElementById('cantidad').value)).toFixed(2);
                document.getElementById('itbis').value = (parseFloat(document.getElementById('subtot').value)*parseFloat(itb)).toFixed(2); 
                document.getElementById('total').value = (parseFloat(document.getElementById('subtot').value)+parseFloat(document.getElementById('itbis').value)).toFixed(2);
                document.getElementById('cantidad').readOnly = false;
            }
        }

        function selectPropiedad(codpro, titulo, preven, preren, itbis){
            pventa = parseFloat(preven);
            prenta = parseFloat(preren);
            itb = parseFloat(itbis);
            document.getElementById('codpro').value = codpro;
            document.getElementById('titulo').value = titulo;
            document.getElementById('itbis-fijo').value = itbis;
            var concepto = document.getElementById('concepto').value;
            if(concepto == 'Venta'){
                document.getElementById('precio').value = parseFloat(preven).toFixed(2);
                document.getElementById('cantidad').value = 1;
                document.getElementById('subtot').value = (parseFloat(preven)*parseInt(document.getElementById('cantidad').value)).toFixed(2);
                document.getElementById('itbis').value = (parseFloat(document.getElementById('subtot').value)*parseFloat(itbis)).toFixed(2); 
                document.getElementById('total').value = (parseFloat(document.getElementById('subtot').value)+parseFloat(document.getElementById('itbis').value)).toFixed(2);
                document.getElementById('cantidad').readOnly = true;
            }else{
                document.getElementById('precio').value = parseFloat(preren).toFixed(2);
                document.getElementById('cantidad').value = 1;
                document.getElementById('subtot').value = (parseFloat(preren)*parseInt(document.getElementById('cantidad').value)).toFixed(2);
                document.getElementById('itbis').value = (parseFloat(document.getElementById('subtot').value)*parseFloat(itbis)).toFixed(2); 
                document.getElementById('total').value = (parseFloat(document.getElementById('subtot').value)+parseFloat(document.getElementById('itbis').value)).toFixed(2);
                document.getElementById('cantidad').readOnly = false;
            }
        }
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
@endsection