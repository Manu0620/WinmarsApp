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
            <h3>Cobros</h3>
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
        <div class="col"></div>
        <div class="col">
            <label for="fecha">Fecha</label>
            <input type="datetime" class="form-control" id="fecha" name="fecha" disabled>
        </div>
        <div class="col-1"></div>
        <div class="col">
            <label for="montpag">Monto a Pagar</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" style="text-align: right;" class="form-control" id="montpag" name="montpag">
            </div>
        </div>
        <div class="col">
            <label for="formpag">Forma de Pago</label>
            <div class="input-group">
                <button class="btn btn-primary shadow-none" style="background: #0ead69;" type="button" id="efectivo" data-bs-toggle="modal" data-bs-target="#nuevoClienteModal"><i class="fa-solid fa-money-bills"></i> Efectivo</button>
                <button class="btn btn-primary shadow-none" style="background: #1976D2;" type="button" id="tarjeta" data-bs-toggle="modal" data-bs-target="#buscarClienteModal"><i class="fa-solid fa-credit-card"></i> Tarjeta</button>  
            </div>
        </div>
        <div class="col"></div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="observaciones">Observaciones</label>
            <textarea type="text" class="form-control" name="observaciones" rows="4"></textarea>
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="balance">Balance</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" style="text-align: right;" class="form-control" id="balance" name="balance" value="0.00" readonly>
            </div>
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="totpag">Total Pagado</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" style="text-align: right;" class="form-control" id="totpag" name="totpag" value="0.00" readonly>
            </div>
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="balpend">Balance Pendiente</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" style="text-align: right;" class="form-control" id="balpend" name="balpend" value="0.00" readonly>
            </div>
        </div>
    </div>

    </form>

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
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        var montpag = document.getElementById('montpag');

        montpag.addEventListener('blur', setFixed2);

        function setFixed2(){
            montpag.value = parseFloat(montpag.value).toFixed(2);
        }

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
                    <form id="cliente-modal-form" method="POST" action="/nuevoClienteModal">
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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
@endsection