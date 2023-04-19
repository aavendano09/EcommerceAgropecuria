<?php

require_once('conexion.php');

$sqltipoproducto = "SELECT ttpro_nametp FROM ttpro_tme";
$tipoproducto = $conexion->query($sqltipoproducto);

$sql = "SELECT tprod_idprod, tprod_fotopr, tprod_descpr, tprod_prespr, tprod_precic, tprod_preciv, tprod_fechve, tprod_fechin, tprod_cantpr,tprod_fktipp,tprod_status FROM tprod_tme;";
$productos = $conexion->query($sql);

$sql2 = "SELECT tvent_idvent FROM tvenn_tts"
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet">
    <link href="assets/images/favicon.png" rel="icon">
    <link href="assets/images/favicon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- ========================================================= -->
    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/datetime/1.3.0/css/dataTables.dateTime.min.css">
    <script src="validaciones.js"></script>
</head>

<body>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Carga Masiva de Productos</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

      <!-- Boton para agregar productos-->
            
        <div class="col-auto mb-3">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i class="fa-solid fa-circle-plus"></i> Nuevo Producto</a>
        </div>

        <div class="card">
            <!-- /.card-header -->
            <div class="data_table card-body table-responsive">


            <table id="example" class="table table-sm table-striped table-hover mt-4">
        <thead class="table-dark">
            <tr>
                <th>Codigo</th>
                <th>Imagen</th>
                <th>Descripcion</th>
                <th>Presentacion</th>
                <th>Tipo de Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row_productos = $productos->fetch_assoc()){ ?>
            <!-- <tr id="row_<?php //echo $row_ventas['tvent_idvent']; ?>"> -->
               <tr>
                 <td><?= $row_productos['tprod_idprod'] ?></td>
                 <td><img style="width: 100px;" src="data:image/jpg;base64,<?php echo base64_encode($row_productos['tprod_fotopr']) ?>" alt=""></td>
                 <td><?= $row_productos['tprod_descpr'] ?></td>
                 <td><?= $row_productos['tprod_prespr'] ?></td>
                 <td><?= $row_productos['tprod_fktipp'] ?></td>
                 <td><?= $row_productos['tprod_preciv'] ?></td>
                 <td><?= $row_productos['tprod_cantpr'] ?></td>
                 <td>
                  
                 <?php if($row_productos['tprod_status']): ?>
                
                  Activo

                  <?php else: ?>
                  
                  Inactivo
                  
                  <?php endif; ?>
                  
                  
                  </td>
                 <td>

                  <a href="#" class="btn btn-sm btn-warning mb-2 mt-2" data-bs-toggle="modal" data-bs-target="#editaModal" data-bs-id="<?= $row_productos['tprod_idprod']; ?>"><i class="fa-solid fa-pencil"></i> Editar</a>
    
                
                </td>
               </tr>

           <?php } ?>
</tbody>

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


  <?php
    include 'nuevoModal.php';
    include 'editaModal.php';
    ?>

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


    table.buttons().container()
    .appendTo('#example_wrapper .col-md-6:eq(0)');

//FIN DEL READY
});


    </script>

<script>

let editaModal = document.getElementById('editaModal')

editaModal.addEventListener('show.bs.modal', event => {
   let button = event.relatedTarget
   let id = button.getAttribute('data-bs-id')

   let inputId = editaModal.querySelector('.modal-body #id')
   let inputDNombre= editaModal.querySelector('.modal-body #nombre')
   let inputDescripcion = editaModal.querySelector('.modal-body #descripcion')
   let inputPresentacion = editaModal.querySelector('.modal-body #presentacion')
   let inputTipoProducto = editaModal.querySelector('.modal-body #tipoproducto')
   let inputPreciocosto = editaModal.querySelector('.modal-body #preciocosto')
   let inputPrecioventa = editaModal.querySelector('.modal-body #precioventa')
   let inputFechavencimiento = editaModal.querySelector('.modal-body #fechavencimiento')
   let inputFechaingreso = editaModal.querySelector('.modal-body #fechaingreso')
   let inputCantidad = editaModal.querySelector('.modal-body #cantidad')
   let inputStatus= editaModal.querySelector('.modal-body #estado')

   let url = "moduloproductos/getProductos.php"
   let formData = new FormData()
   formData.append('id', id)

   fetch(url, {
       method: "POST",
       body: formData
   }).then(response => response.json())
   .then(data => {

       inputId.value = data.tprod_idprod
       inputDNombre.value = data.tprod_namepr
       inputDescripcion.value = data.tprod_descpr
       inputPresentacion.value = data.tprod_prespr
       inputTipoProducto.value = data.tprod_fktipp
       inputPreciocosto.value = data.tprod_precic
       inputPrecioventa.value = data.tprod_preciv
       inputFechavencimiento.value = data.tprod_fechve
       inputFechaingreso.value = data.tprod_fechin
       inputCantidad.value = data.tprod_cantpr
       inputStatus.value = data.tprod_status

   }).catch(err => console.log(err))

})


</script>


<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.3.0/js/dataTables.dateTime.min.js"></script>


</body>
</html>
