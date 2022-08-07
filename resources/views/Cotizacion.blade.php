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
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle">Seleccionando Cliente</h3>
                    <button type="button" class="btn btn-primary" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('layouts.modals.seleccionarCliente')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function fecha(){
            var today = new Date();
            var date = today.getDate()+'/'+(today.getMonth()+1)+'/'+today.getFullYear();
            var time = today.getHours() + ":" + today.getMinutes();
            var dateTime = date+' '+time;

            document.getElementById('fecha').value = dateTime;
        }
   
        function selectCliente(codcli, nomcli, apecli, tecli1, cedrnc){
            fecha();
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
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle">Nuevo Cliente</h3>
                    <button type="button" class="btn btn-primary" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="cliente-modal-form" method="POST" action="/modalNuevoCliente">
                        @csrf
                        @include('layouts.modals.clienteModalForm')
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function(){
            $('#enviarCliente').click(function (e){
                e.preventDefault(); //evita recargar la pagina
                //var route = $('#cliente-modal-form').data('route'); Lo mismo
                var form  = $("#cliente-modal-form").attr("action");
                //var formValues = $(this).serialize(); Lo mismo
                var dataString = $("#cliente-modal-form").serialize();
                $.ajax({
                    method:'POST',
                    url:form,
                    data:dataString,
                    dataType:'json', 
                    //data:formValues,
                    success: function(result){
                        $('#codcli').val(result.clientes[0].codcli);
                        $('#nomcli').val(result.clientes[0].nomcli+' '+result.clientes[0].apecli);
                        $('#tecli1').val(result.clientes[0].tecli1);
                        $('#cedrnc').val(result.clientes[0].cedrnc);
                        
                        $("#cliente-modal-form")[0].reset(); //limpiar Formulario
                        $("#nuevoClienteModal").modal('hide'); //cerrar Modal
                        Swal.fire({
                            title: 'Exito',
                            text: 'Cliente/a '+ result.clientes[0].nomcli +' registrado correctamente!',
                            icon: 'success',
                            iconColor: '#0ead69',
                            showConfirmButton: true,
                            confirmButtonColor: '#1976D2',
                            buttonsStyling: false,
                            confirmButtonText: "OK!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                    },
                    error: function(err){
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#success_message').fadeIn().html(err.responseJSON.message);
                            
                            // you can loop through the errors object and show it to the user
                            console.warn(err.responseJSON.errors);
                            // display errors on each form field
                            $.each(err.responseJSON.errors, function (i, error) {
                                var el = $('#cliente-modal-form').find('[name="'+i+'"]');
                                el.after($('<ol style="margin: 0px; margin-left: 10px; padding:0px; color: #d62828;"><i class="fa-solid fa-circle-exclamation"></i> '+error[0]+'</ol>').fadeIn());        
                                $("ol").each(function(index) {
                                    setTimeout(() => {
                                        $("ol").fadeOut(1000);
                                    }, 2500);
                                });
                            });
                        }
                        /*Swal.fire({
                            icon: 'error',
                            title: 'Intentelo de nuevo...',
                            text: 'Puede que el dato en el campo telefono, correo o cedula/rnc ya esten en uso o tengan formato incorrecto',
                            footer: '<a href="consultarClientes"  style="text-decoration: none; color: #1976d2;">Que puedo hacer? <p style="font-weight: bold;">Consultar clientes</p></a>',
                            showConfirmButton: false
                        })*/
                    }
                });
            });
        });
    </script>

    <div class="modal fade" id="buscarPropiedadModal" tabindex="-1" role="dialog" aria-labelledby="Seleccionar Propiedad" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle1">Seleccionando Propiedad</h3>
                    <button type="button" class="btn btn-primary" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('layouts.modals.seleccionarPropiedad')
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