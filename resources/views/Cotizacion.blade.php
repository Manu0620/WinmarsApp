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
                <div class="col">
                    <div class="button-group" style="text-align: right;">
                        <button type="button" class="btn btn-primary shadow-none" style="background: #2196F3;"><i class="fas fa-file-pdf"></i> Comprobante</button>
                        <button type="button" class="btn btn-primary shadow-none" style="background: #1E88E5;"><i class="fas fa-file-pdf"></i> Imprimir</button>
                        <button type="reset" class="btn btn-primary shadow-none" style="background: #1976D2;"><i class="fa-solid fa-arrow-rotate-left"></i> Limpiar</button>
                        <button type="submit" class="btn btn-primary shadow-none" style="background: #0ead69;"><i class="fa-solid fa-floppy-disk"></i> Procesar</button>
                    </div>
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
                    {{-- <button class="btn btn-primary shadow-none" style="background: #0ead69;" type="button" id="nueva-pro" data-bs-toggle="modal" data-bs-target="#nuevaPropiedadModal"><i class="fa-solid fa-circle-plus"></i></button> --}}
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
                <textarea type="text" class="form-control" id="observaciones" name="observaciones" rows="4"></textarea>
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
    </form>

    <div class="row">
        <div class="button-group" style="text-align: right;">
            <button id="agregar" class="btn btn-primary shadow-none" style="background: #0ead69;"><i class="fa-solid fa-circle-plus"></i> Agregar</button>
        </div>
    </div>

    <script type="text/javascript">
        function limpiarPropiedad(){
            $('#codpro').val('');
            $('#titulo').val('');
            $('#precio').val('');
            $('#cantidad').val('');
            $('#subtot').val('');
            $('#itbis').val('');
            $('#total').val('');
        }

        var formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',

            // These options are needed to round to whole numbers if that's what you want.
            //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
            //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
        });

        function verificarPropiedad(){
            var data = table.rows().data();
            for(var i=0 ; data.length>i;i++){
                var n = data[i].length;
                for(var j = 0 ; data.length>j;j++){ 
                    if($('#codpro').val() == data[i][j]){
                        Swal.fire({
                            icon: 'error',
                            iconColor: '#d62828',
                            title: 'Ya seleccionaste esta propiedad',
                            text: 'Intenta con otra',
                            confirmButtonColor: '#1976D2',
                            buttonsStyling: false,
                            confirmButtonText: "OK!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                        limpiarPropiedad();
                    }  
                }
            }
        }

        function llenarForm(concepto, precio, itbis, subtotal, total){
            if(concepto == 'Venta'){ 
                document.getElementById('cantidad').readOnly = true; 
                document.getElementById('cantidad').value = cantidad;  
            }
            else{ document.getElementById('cantidad').readOnly = false; }
            document.getElementById('precio').value = formatter.format(precio);
            document.getElementById('subtot').value = formatter.format(subtotal);
            document.getElementById('itbis').value = formatter.format(itbis); 
            document.getElementById('total').value = formatter.format(total);
        }
    </script>

    <table class="table table-striped table-hover table-borderless align-middle" id="detalleFactura">
        <thead>
            <tr>
                <th>Propiedad</th>
                <th>Cliente</th>
                <th>Concepto</th>
                <th>Condicion</th>
                <th>Cantidad</th>
                <th>Observaciones</th>
                <th>Subtotal</th>
                <th>Itbis</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="body">
            
        </tbody>
        <tfoot>
            <tr>
                <th colspan="6" style="text-align:right">Totales:</th>
                <td rowspan="1" colspan="1" style="text-align:right"></td>
                <td rowspan="1" colspan="1" style="text-align:right"></td>
                <td rowspan="1" colspan="1" style="text-align:right"></td>
                <td></td>
            </tr>
        </tfoot>
    </table>

    <script type="text/javascript">
        var table = $('#detalleFactura').DataTable({
            "bPaginate": false,
            "bFilter": false,
            "bInfo": true, 
            footerCallback: function (row, data, start, end, display) {
                var api = this.api();
    
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };
    
                // Total over this page
                subtotal = api.column(6, { page: 'current' }).data().reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                itbis = api.column(7, { page: 'current' }).data().reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                total = api.column(8, { page: 'current' }).data().reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
    
                // Update footer
                $(api.column(6).footer()).html(formatter.format(subtotal));
                $(api.column(7).footer()).html(formatter.format(itbis));
                $(api.column(8).footer()).html(formatter.format(total));
            },
        })

        var counter = 1;
        $("#agregar").click(function (e){ 
            e.preventDefault();
            
            if($('#codcli').val() == '' || $('#codpro').val() == ''){
                Swal.fire({
                    icon: 'error',
                    iconColor: '#d62828',
                    title: 'Intentelo de nuevo...',
                    text: 'Seleccione un Cliente y una Propiedad',
                    confirmButtonColor: '#1976D2',
                    buttonsStyling: false,
                    confirmButtonText: "OK!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })
            }else{             
                document.getElementById('buscar-cli').disabled = true;
                document.getElementById('nuevo-cli').disabled = true;
                table.row.add([$('#codpro').val(),$('#codcli').val(),$('#concepto').val(), 
                    $('#condicion').val(),$('#cantidad').val(), '<textarea readonly cols="40" rows="3">' + $('#observaciones').val() + '</textarea>', 
                    $('#subtot').val(), $('#itbis').val(), $('#total').val(), '<button id="eliminarDetalle" class="btn btn-danger btn-xs"><i class="fa-solid fa-xmark"></i></button>']).draw(false);
 
                counter++;
                limpiarPropiedad();
            }

        });

        $('#detalleFactura tbody').on('click','#eliminarDetalle',function () {
            table.row($(this).parents('tr')).remove().draw();
            if(!table.data().count()){
                document.getElementById('buscar-cli').disabled = false;
                document.getElementById('nuevo-cli').disabled = false;
            }
        });
    </script>

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

        function fecha(){
            var today = new Date();
            var date = today.getDate().toString().padStart(2, "0")+'/'+(today.getMonth()+1).toString().padStart(2, "0")+'/'+today.getFullYear();
            var time = today.getHours().toString().padStart(2, "0") + ":" + today.getMinutes().toString().padStart(2, "0");
            var dateTime = date+' '+time;

            document.getElementById('fecha').value = dateTime;
        }

        setInterval(fecha, 1000);
   
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
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle">Registrar Cliente</h3>
                    <button type="button" class="btn btn-primary" class="btn btn-primary" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        const cantidad = 1;
        let precio, itbis, itbis_fijo, subtotal, total = 0;
        let pventa, prenta = 0;
        var concepto;
        const cero = parseFloat(0).toFixed(2);

        document.getElementById('cantidad').addEventListener('click', updateValue);
        document.getElementById('cantidad').addEventListener('onchange', updateValue);
        document.getElementById('concepto').addEventListener('click', conceptoChange);


        function updateValue(e){
            subtotal = parseFloat(precio)*parseInt(document.getElementById('cantidad').value);
            itbis = parseFloat(subtotal)*parseFloat(itbis_fijo); 
            total = parseFloat(subtotal)+parseFloat(itbis);
            llenarForm(concepto, precio, itbis, subtotal, total);
        }

        function conceptoChange(e){
            concepto = document.getElementById('concepto').value;
            if(concepto == 'Venta'){
                precio = parseFloat(pventa);  
            }else{
                precio = parseFloat(prenta);
            }
            subtotal = parseFloat(precio)*parseInt(cantidad);
            itbis = parseFloat(subtotal)*parseFloat(itbis_fijo); 
            total = parseFloat(subtotal)+parseFloat(itbis);
            llenarForm(concepto, precio, itbis, subtotal, total);
        }

        function selectPropiedad(codpro, titulo, preven, preren, itbis){
            document.getElementById('codpro').value = codpro;
            document.getElementById('titulo').value = titulo;
            pventa = preven;
            prenta = preren;
            itbis_fijo = itbis;
            concepto = document.getElementById('concepto').value;
            if(concepto == 'Venta'){
                precio = parseFloat(preven);   
            }else{
                precio = parseFloat(preren);
            }
            subtotal = parseFloat(precio)*parseInt(cantidad);
            itbis = parseFloat(subtotal)*parseFloat(itbis); 
            total = parseFloat(subtotal)+parseFloat(itbis);
            llenarForm(concepto, precio, itbis, subtotal, total);
            verificarPropiedad();
        }

    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
@endsection