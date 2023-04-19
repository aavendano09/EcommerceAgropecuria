<?php

require_once('conexion.php');

$sql = "SELECT
dv.tdven_fkcodp,
dv.tdven_cantpr,
dv.tdven_fktpmo,
v.tvent_idvent,
v.tvent_fkclie,
v.tvent_fechav,
v.tvent_totalv,
v.tvent_status,
cl.tclie_namecl
FROM
tvenn_tts AS v
INNER JOIN tclic_tme AS cl 
ON cl.tclie_idclie = v.tvent_fkclie
INNER JOIN tdevt_tts AS dv 
ON dv.tdven_fkidvt = v.tvent_idvent";
$productos = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Ventas</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet">
    <link href="assets/images/favicon.png" rel="icon">
    <link href="assets/images/favicon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- ========================================================= -->
    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/datetime/1.3.0/css/dataTables.dateTime.min.css">

</head>

<style>
    .modal{
        position: fixed;
        width: 100%;
        height: 100vh;
        background: rgba(0, 0, 0, 0.81);
    }

    .bodyModal{
        width: 100%;
        height: 100%;
        display: -webkit-inline-flex;
        display: -moz-inline-flex;
        display: -ms-inline-flex;
        display: -o-inline-flex;
        display: inline-flex;
        justify-content: center;
        align-items: center;
    }

    .modal h1{
        color: #0e725d;
        text-transform: uppercase;
    }

    .modal h2{
        text-transform: uppercase;
        margin-top: 15px;
    }

    #form_anular_factura{
        width: 420px;
        text-align: center;
        background-color: #ffffff;
    }

    .boton_anular{
        margin: 20px;
    }

    .boton_cerrar{
        margin: 20px;
    }

    .icono_anular{
        margin-top: 20px;
    }

</style>

<div class="modal">
    <div class="bodyModal">
    <form action="" method="post" name="form_anular_factura" id="form_anular_factura" onsubmit="event.preventDefault(); anularFactura();">
       <h1><i class="fa fa-cubes icono_anular" style="font-size: 45pt;"></i><br>Anular Venta<h1>
        <p>¿Esta seguro de anular esta Venta?</p>

        <p><strong>No.'+info.tvent_idvent+'</strong></p>
        <p><strong>Monto.<span>$</span>'+info.tvent_totalv+'</strong></p>
        <p><strong>Fecha.'+info.tvent_fechav+'</strong></p>
        <input type="hidden" name="action" value="anularFactura">
        <input type="hidden" name="no_factura" id="no_factura" value="'+info.tvent_idvent+'" required>
            
        <div class="alert alertAddProduct"></div>
        <button type="submit" class="btn btn-danger boton_anular"><i class="fa fa-trash"></i> Anular</button>
        <a href="#" class="btn btn-success boton_cerrar" onclick="coloseModal();"><i class="fa fa-ban"></i> Cerrar</a>
    </form>
    </div>
</div>

<body>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Historial de Ventas</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
            
    <div class="col-auto mb-3">
        <a href="paneladmin.php?modulo=nuevaventa" class="btn btn-primary"><i class="fas fa-cog"></i> Crear Venta</a>
    </div>

        <div class="card">
            <!-- /.card-header -->
            <div class="data_table card-body table-responsive">
  
            <style>

#fechas{
  width:200px;
  float: left;
  position: relative;
}

#fechas1{
  width:200px;
  float: left;
  position: relative;
}

#titulo{
  width:300px;
  float: left;
  position: relative;
  
}

</style>

<form  class="form-inline"  method=""  name="" id="fecha">
      <div id="containerfecha" class="col-xs-10 col-xs-offset-3">
            <h6 id="titulo"><span>Busqueda por rango de fechas:</span></h6>
            <div id="fechas" class="form-group">
            <label for="fecha_inicio">Fecha Inicio:</label>
            <input type="text" class="form-control" name="min" id="min" required>
            </div>
            <div  id="fechas1" class="form-group">
            <label for="fecha_final">Fecha Final:</label>
            <input type="text" class="form-control" name="max" id="max" required>
            </div>
      </div>
</form>

          <hr>

            <table id="example" class="table table-sm table-striped table-hover mt-4">
            <thead class="table-dark">
            <tr>
                <th>Acciones</th>
                <th style="width: 200px;">Codigo Venta</th>
                <th style="width: 150px;">Nombre Cliente</th>
                <th>Fecha / Hora</th>
                <th style="width: 220px;">Estado</th>
                <th>Total</th>
                <th style="width: 50px;">Metodo</th>
                
            </tr>
        </thead>
        <tbody>
        <?php while($row_ventas=mysqli_fetch_assoc($productos)){ 
            
            if($row_ventas['tvent_status'] == 'Pendiente por pagar al momento de retirar'){
                $estado = '<span class="pendiente">Pendiente por pagar al retirar</span>';
            }elseif($row_ventas['tvent_status'] == 'cancelado'){
                $estado = '<span class="cancelada">Cancelada</span>';
            }else{
                $estado= '<span class="anulada">Anulada</span>';  
            }

            ?>

               <tr id="row_<?php echo $row_ventas['tvent_idvent']; ?>">
                
               <td width="150px">
                <div style="margin-left: 10px;">

                
                    <button class="btn btn-sm btn_view view_factura btn-warning" type="button" cl="<?php echo $row_ventas['tvent_fkclie']; ?>" f="<?php echo $row_ventas['tvent_idvent']; ?>"><i class="fas fa-eye"></i></button>
            
                    <?php
                    if($row_ventas['tvent_status'] == 'cancelado' || $row_ventas['tvent_status'] == 'Pendiente por pagar al momento de retirar')
                    {
                    ?>

                        <button class="btn btn-sm btn_anular anular_factura btn-danger" fac="<?php echo $row_ventas['tvent_idvent']; ?>"><i class="fas fa-ban"></i></button>

                    <?php }else{ ?>

                    <style>
                        .inactive{
                            background-color: #a4a4a4;
                            color: #CCC;
                        }
                    </style>

                    <button style="cursor: default;" type="button" class="btn btn-sm btn_anular inactive"><i class="fas fa-ban"></i></button>

                    <?php } ?>
               </div>
            </td>

                 <td><?= $row_ventas['tvent_idvent'] ?></td>
                 <td><?= $row_ventas['tclie_namecl'] ?></td>
                 <td><?= $row_ventas['tvent_fechav'] ?></td>
                 <td class="estado"><?php echo $estado; ?></td>
                 <td><span>$.</span><?= $row_ventas['tvent_totalv'] ?></td>
                 <td><?= $row_ventas['tdven_fktpmo'] ?></td>
                 
               </tr>
     
           <?php } ?>
</tbody>
    </table>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script src="assets/js/pdfmake.min.js"></script>
    <script src="assets/js/vfs_fonts.js"></script>

    <script>
      $(document).ready(function(){

        // DataTables initialisation
     var table = $('#example').DataTable({
      
      responsive: true,
        
        buttons:['copy',  'excel', 'pdf', 'print'],

        "language": 
        {
    "processing": "Procesando...",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "Ningún dato disponible en esta tabla",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "Buscar:",
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad",
        "collection": "Colección",
        "colvisRestore": "Restaurar visibilidad",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %ds fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "-1": "Mostrar todas las filas",
            "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir",
        "renameState": "Cambiar nombre",
        "updateState": "Actualizar",
        "createState": "Crear Estado",
        "removeAllStates": "Remover Estados",
        "removeState": "Remover",
        "savedStates": "Estados Guardados",
        "stateRestore": "Estado %d"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Rellene todas las celdas con <i>%d<\/i>",
        "fillHorizontal": "Rellenar celdas horizontalmente",
        "fillVertical": "Rellenar celdas verticalmentemente"
    },
    "decimal": ",",
    "searchBuilder": {
        "add": "Añadir condición",
        "button": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "conditions": {
            "date": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "notBetween": "No entre",
                "notEmpty": "No Vacio",
                "not": "Diferente de"
            },
            "number": {
                "between": "Entre",
                "empty": "Vacio",
                "equals": "Igual a",
                "gt": "Mayor a",
                "gte": "Mayor o igual a",
                "lt": "Menor que",
                "lte": "Menor o igual que",
                "notBetween": "No entre",
                "notEmpty": "No vacío",
                "not": "Diferente de"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vacío",
                "endsWith": "Termina en",
                "equals": "Igual a",
                "notEmpty": "No Vacio",
                "startsWith": "Empieza con",
                "not": "Diferente de",
                "notContains": "No Contiene",
                "notStartsWith": "No empieza con",
                "notEndsWith": "No termina con"
            },
            "array": {
                "not": "Diferente de",
                "equals": "Igual",
                "empty": "Vacío",
                "contains": "Contiene",
                "notEmpty": "No Vacío",
                "without": "Sin"
            }
        },
        "data": "Data",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor"
    },
    "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
            "0": "Paneles de búsqueda",
            "_": "Paneles de búsqueda (%d)"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d",
        "showMessage": "Mostrar Todo",
        "collapseMessage": "Colapsar Todo"
    },
    "select": {
        "cells": {
            "1": "1 celda seleccionada",
            "_": "%d celdas seleccionadas"
        },
        "columns": {
            "1": "1 columna seleccionada",
            "_": "%d columnas seleccionadas"
        },
        "rows": {
            "1": "1 fila seleccionada",
            "_": "%d filas seleccionadas"
        }
    },
    "thousands": ".",
    "datetime": {
        "previous": "Anterior",
        "next": "Proximo",
        "hours": "Horas",
        "minutes": "Minutos",
        "seconds": "Segundos",
        "unknown": "-",
        "amPm": [
            "AM",
            "PM"
        ],
        "months": {
            "0": "Enero",
            "1": "Febrero",
            "10": "Noviembre",
            "11": "Diciembre",
            "2": "Marzo",
            "3": "Abril",
            "4": "Mayo",
            "5": "Junio",
            "6": "Julio",
            "7": "Agosto",
            "8": "Septiembre",
            "9": "Octubre"
        },
        "weekdays": [
            "Dom",
            "Lun",
            "Mar",
            "Mie",
            "Jue",
            "Vie",
            "Sab"
        ]
    },
    "editor": {
        "close": "Cerrar",
        "create": {
            "button": "Nuevo",
            "title": "Crear Nuevo Registro",
            "submit": "Crear"
        },
        "edit": {
            "button": "Editar",
            "title": "Editar Registro",
            "submit": "Actualizar"
        },
        "remove": {
            "button": "Eliminar",
            "title": "Eliminar Registro",
            "submit": "Eliminar",
            "confirm": {
                "_": "¿Está seguro que desea eliminar %d filas?",
                "1": "¿Está seguro que desea eliminar 1 fila?"
            }
        },
        "error": {
            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
        },
        "multi": {
            "title": "Múltiples Valores",
            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
            "restore": "Deshacer Cambios",
            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
        }
    },
    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
    "stateRestore": {
        "creationModal": {
            "button": "Crear",
            "name": "Nombre:",
            "order": "Clasificación",
            "paging": "Paginación",
            "search": "Busqueda",
            "select": "Seleccionar",
            "columns": {
                "search": "Búsqueda de Columna",
                "visible": "Visibilidad de Columna"
            },
            "title": "Crear Nuevo Estado",
            "toggleLabel": "Incluir:"
        },
        "emptyError": "El nombre no puede estar vacio",
        "removeConfirm": "¿Seguro que quiere eliminar este %s?",
        "removeError": "Error al eliminar el registro",
        "removeJoiner": "y",
        "removeSubmit": "Eliminar",
        "renameButton": "Cambiar Nombre",
        "renameLabel": "Nuevo nombre para %s",
        "duplicateError": "Ya existe un Estado con este nombre.",
        "emptyStates": "No hay Estados guardados",
        "removeTitle": "Remover Estado",
        "renameTitle": "Cambiar Nombre Estado"
    }
}  
    });

        var minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values
 $.fn.dataTable.ext.search.push(
     function( settings, data, dataIndex ) {
         var min = minDate.val();
         var max = maxDate.val();
         var date = new Date( data[2] );
  
         if (
             ( min === null && max === null ) ||
             ( min === null && date <= max ) ||
             ( min <= date   && max === null ) ||
             ( min <= date   && date <= max )
         ) {
             return true;
         }
         return false;
     }
 );
  
 $(document).ready(function() {
     // Create date inputs
     minDate = new DateTime($('#min'), {
         format: 'MMMM Do YYYY'
     });
     maxDate = new DateTime($('#max'), {
         format: 'MMMM Do YYYY'
     });
  
  
     // Refilter the table
     $('#min, #max').on('change', function () {
         table.draw();
     });
 });

    table.buttons().container()
    .appendTo('#example_wrapper .col-md-6:eq(0)');


     

     //Ver Orden de entrega

    
   


//FIN DEL READY
});

$('.view_factura').click(function(e){
     e.preventDefault();

     var codcliente = $(this).attr('cl');
     var Nofactura = $(this).attr('f');
     generarPDF(codcliente,Nofactura);

 });


 //modal para anular Ventas

          //modal para anular
          $('.anular_factura').click(function(e){
            e.preventDefault();
     
         var nofactura= $(this).attr('fac');
         var action = 'infoFactura';
         
         $.ajax({
             url:'moduloventas/ajaxventas.php', 
             type:'POST',
             async :true,
             data: {action:action,nofactura:nofactura},
     
             success:function(response)
              {
                 if(response != 'error'){
                     var info = JSON.parse(response);
                     
                        $('.bodyModal').html('<form action="" method="post" name="form_anular_factura" id="form_anular_factura" onsubmit="event.preventDefault(); anularFactura();">'+
                                            '<h1><i class="fa fa-cubes icono_anular" style="font-size: 45pt;"></i><br> Anular Venta</h1>'+
                                            '<p>¿Esta seguro de anular esta venta?</p>'+

                                            '<p><strong>No.'+info.tvent_idvent+'</strong></p>'+
                                            '<p><strong>Monto.<span>$</span>'+info.tvent_totalv+'</strong></p>'+
                                            '<p><strong>Fecha.'+info.tvent_fechav+'</strong></p>'+
                                            '<input type="hidden" name="action" value="anularFactura">'+
                                            '<input type="hidden" name="no_factura" id="no_factura" value="'+info.tvent_idvent+'" required>'+
        
                                            '<div class="alert alertAddProduct"></div>'+
                                            '<button type="submit" class="btn btn-danger boton_anular"><i class="fa fa-trash"></i> Anular</button>'+
                                            '<a href="#" class="btn btn-success boton_cerrar" onclick="coloseModal();"><i class="fa fa-ban"></i> Cerrar</a>'+
                                            '</form>');
                 }
             },
             error:function(error){
                 console.log('error');
             }
      
         });
         $('.modal').fadeIn();
     
     
     });

     //generar pdf
     function generarPDF(cliente,factura){
         var ancho = 1000;
         var alto = 800;
         //calcular posicion x,y para centrar la ventana

         var x = parseInt((window.screen.width/2) - (ancho / 2));
         var y = parseInt((window.screen.height/2) - (alto / 2));
     
         $url = './factura/generaFactura.php?cl='+cliente+'&f='+factura;
         window.open($url, "Factura","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no")
     
     }



//anular venta o orden de entrega

function anularFactura(){
         var noFactura = $('#no_factura').val();
         var action = 'anularFactura';
     
         $.ajax({
             url:'moduloventas/ajaxventas.php',
             type:'POST',
             async:true,
             data: {action:action,noFactura:noFactura},
     
             success:function(response)
             {
                 if(response == 'error'){
                     $('.alertAddProduct').html('<p style="color:red;">Error al anular la factura</p>');
                 }else{
                     $('#row_'+noFactura+' .estado').html('<span class="anulada">Anulada</span>');
                     $('#form_anular_factura .btn-danger').remove();
                     $('#row_'+noFactura+' .btn_anular').html('<button style="cursor: default;" type="button" class="btn btn-sm btn_anular inactive"><i class="fas fa-ban"></i></button>');
                     $('.alertAddProduct').html('<p>FACTURA ANULADA.</p>');
                     
                 }
                     
             },
             error:function(error){
     
             }
         });
     }

// funcion para cerrar modal

function coloseModal(){
         $('.modal').fadeOut();
     }     

    </script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.3.0/js/dataTables.dateTime.min.js"></script>

</body>
</html>

