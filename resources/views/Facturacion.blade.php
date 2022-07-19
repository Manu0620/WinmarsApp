@extends('layouts.consulta-master')
<title>Facturacion</title>

@section('content')

    <h3>Facturacion</h3>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <form action="/Facturacion" method="POST" id="formulario">

        @csrf

    <div class="row">
        <div class="col-sm-5">
            <div class="tab-nav">
                <a href="/home">Home</a>
                <label for="form-label">/ Facturacion</label>
            </div>
        </div>
        <div class="col">
            <div class="button-group">
                <button type="button" class="btn btn-primary"><i class="fas fa-file-pdf"></i> Comprobante</button>
                <button type="button" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Print</button>
                <button type="reset" class="btn btn-warning"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>

                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Save</button>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col">
            <label for="codcli">Cliente</label>
            <input type="text" class="form-control" id="codcli" name="codcli" readonly>
        </div>

        <div class="col-1" style="padding-top: 25px;">
            <button type="button" class="btn btn-primary" id="buscar-cli" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable"><i class="fas fa-search"></i></button>
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
            <input type="text" class="form-control" id="codpro" name="codpro" readonly>
        </div>

        <div class="col-1" style="padding-top: 30px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable1"><i class="fas fa-search"></i></button>
        </div>

        <div class="col">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" readonly>
        </div>
        <div class="col">
            <label for="preven">Precio de venta/renta</label>
            <input type="text" class="form-control" id="precio" name="precio" readonly>
        </div>
        <div class="col">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" disabled>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="observaciones">Observaciones</label>
            <textarea type="text" class="form-control" name="observaciones" rows="4"></textarea>
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="subtot">Subtotal</label>
            <input type="number" step="0.01" class="form-control" id="subtot" name="subtot" value="0.00" readonly>
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="itbis">Itbis</label>
            <input type="number" step="0.01" class="form-control" id="itbis" name="itbis" value="0.00" readonly>
            <input type="number" step="0.01" class="form-control" id="itbis-fijo" name="itbis-fijo" value="0.00" hidden>
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="total">Total</label>
            <input type="number" step="0.01" class="form-control" id="total" name="total" value="0.00" readonly>
        </div>
    </div>

</form>

    <!--<table class="table table-striped table-hover table-borderless align-middle">
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
    </table>-->

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
                                            <button type="button" class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectCliente('{{$cliente->codcli}}', '{{$cliente->nomcli}}', '{{$cliente->apecli}}', '{{$cliente->tecli1}}', '{{$cliente->cedrnc}}')">
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

    <div class="modal fade" id="exampleModalScrollable1" tabindex="-1" role="dialog" aria-labelledby="Seleccionar Propiedad" aria-hidden="true">
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
                                        <td>{{$propiedad->itbis}}</td>

                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectPropiedad('{{$propiedad->codpro}}', '{{$propiedad->titulo}}','{{$propiedad->preven}}', '{{$propiedad->preren}}','{{$propiedad->itbis}}')">
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

        var pventa, prenta, itb = 0;

        document.getElementById('cantidad').addEventListener('click', updateValue);
        document.getElementById('cantidad').addEventListener('onchange', updateValue);
        document.getElementById('concepto').addEventListener('click', conceptoChange);


        function updateValue(e){
            if(document.getElementById('cantidad').value < 1){ document.getElementById('cantidad').value = 1 }
            document.getElementById('subtot').value = parseFloat(document.getElementById('precio').value)*parseInt(document.getElementById('cantidad').value);
            document.getElementById('itbis').value = document.getElementById('subtot').value*document.getElementById('itbis-fijo').value; 
            document.getElementById('total').value = parseFloat(document.getElementById('subtot').value)+parseFloat(document.getElementById('itbis').value);
        }

        function conceptoChange(e){
            var concepto = document.getElementById('concepto').value;
            if(concepto == 'Venta'){
                document.getElementById('precio').value = pventa;
                document.getElementById('cantidad').disabled = true;
                document.getElementById('cantidad').value = 1;
                document.getElementById('subtot').value = parseFloat(pventa)*parseInt(document.getElementById('cantidad').value);
                document.getElementById('itbis').value = parseFloat(document.getElementById('subtot').value)*parseFloat(itb); 
                document.getElementById('total').value = parseFloat(document.getElementById('subtot').value)+parseFloat(document.getElementById('itbis').value);
            }else{
                document.getElementById('precio').value = parseFloat(prenta);
                document.getElementById('subtot').value = 0;
                document.getElementById('itbis').value = 0;
                document.getElementById('total').value = 0;
                document.getElementById('cantidad').value = 1;
                document.getElementById('cantidad').disabled = false;
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
                document.getElementById('precio').value = preven;
                document.getElementById('cantidad').disabled = true;
                document.getElementById('cantidad').value = 1;
                document.getElementById('subtot').value = parseFloat(preven)*parseInt(document.getElementById('cantidad').value);
                document.getElementById('itbis').value = parseFloat(document.getElementById('subtot').value)*parseFloat(itbis); 
                document.getElementById('total').value = parseFloat(document.getElementById('subtot').value)+parseFloat(document.getElementById('itbis').value);
            }else if(concepto == 'Alquiler'){
                document.getElementById('precio').value = parseFloat(preren);
                document.getElementById('subtot').value = 0;
                document.getElementById('itbis').value = 0;
                document.getElementById('total').value = 0;
                document.getElementById('cantidad').value = 1;
                document.getElementById('cantidad').disabled = false;
            }
        }
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
@endsection