<?php


require_once('conexion.php');

$sql = "SELECT tprp_idtprp, ttpro_nametp, tpre_despre, tprp_status FROM tprp_tts INNER JOIN ttpro_tme ON ttpro_idtipp = tprp_fktpro INNER JOIN tpre_tts ON tpre_idpres = tprp_fkpres;";
$medidas = $conexion->query($sql);

require_once 'validations/Formulario.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentacion tipo producto</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet">
    <link href="assets/images/favicon.png" rel="icon">
    <link href="assets/images/favicon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script>
      const modulo = "modulopresentaciontipoproducto";
      const modaltitle = "Presentacion tipo producto";
    </script>
</head>
<body>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Presentaciones Tipo Productos</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
            
    <div class="col-auto mb-3">
        <a href="#" id="new" class="btn btn-primary" data-bs-toggle="modal"><i class="fa-solid fa-circle-plus"></i> Agregar presentacion tipo producto</a>
    </div>

          <div class="card">
            <!-- /.card-header -->
            <div class="data_table card-body table-responsive">
            <table id="example" class="table table-sm table-striped table-hover mt-4">
        <thead class="table-dark">
            <tr>
                <th style="width: 150px;">Id</th>
                <th style="width: 300px;">Tipo producto</th>
                <th style="width: 250px;">Presentacion</th>
                <th style="width: 200px;">Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $medidas->fetch_assoc()){ ?>

               <tr>
                 <td><?= $row['tprp_idtprp'] ?></td>
                 <td><?= $row['ttpro_nametp'] ?></td>
                 <td><?= $row['tpre_despre'] ?></td>
                 <td>
                  <?php if($row['tprp_status'] ): ?>
                  
                  Activo

                  <?php else: ?>
                  
                  Inactivo
                  
                  <?php endif; ?>
                </td>
                 <td>

                  <a href="#" id="edit" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#nuevoModal" onclick="edit(<?= $row['tprp_idtprp']; ?>)"><i class="fa-solid fa-pencil"></i> Editar</a>

                  <?php if($row['tprp_status']): ?>

                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminaModal"  data-bs-id="<?= $row['tprp_idtprp']; ?>"><i class="fa-solid fa-trash"></i> Eliminar</a>

                  <?php else: ?>

                    <a href="#" class="btn btn-sm btn-secondary" disabled style="pointer-events: none;" data-bs-toggle="modal"><i class="fa-solid fa-trash"></i> Eliminar</a>

                  <?php endif; ?>



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

    ?>

    <?php
    include 'nuevoModal.php';
    include 'eliminaModal.php';
    ?>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>

    <script>
      $(document).ready(function(){
    
    var table = $('#example').DataTable({

        responsive: true,
        
        buttons:['copy',  'excel', 'pdf', 'print'],

        "language": {
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "info": "Mostrando la pagina _PAGES_ de _PAGES_",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "loadingRecords": "Cargando...",
            "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
          }  
    });
    
    table.buttons().container()
    .appendTo('#example_wrapper .col-md-6:eq(0)');

});

    </script>

<script>

     let editaModal = document.getElementById('nuevoModal')
     let eliminaModal = document.getElementById('eliminaModal')

     function edit(val) {
        let id = val;
       validRefresh();
       openEdit();

        let inputId = editaModal.querySelector('.modal-body #id')
        let inputTipoproducto = editaModal.querySelector('.modal-body #tipoproducto')
        let inputPresentacion = editaModal.querySelector('.modal-body #presentacion')
        let inputEstado = editaModal.querySelector('.modal-body #estado')

        let url = "modulopresentaciontipoproducto/getPresTip.php"
        let formData = new FormData()
        formData.append('id', id)

        fetch(url, {
            method: "POST",
            body: formData
        }).then(response => response.json())
        .then(data => {


            inputId.value = data.tprp_idtprp
            inputTipoproducto.value = data.tprp_fktpro
            inputPresentacion.value = data.tprp_fkpres
            inputEstado.value = data.tprp_status

        }).catch(err => console.log(err))

     }

     eliminaModal.addEventListener('shown.bs.modal', event => {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')
        eliminaModal.querySelector('.modal-footer #id').value = id
     })
    </script>


<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>