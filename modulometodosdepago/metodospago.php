<?php

require_once('conexion.php');

$sql = "SELECT tmpag_idmetd, tmpag_namemt, tmpag_status FROM tmpag_tme;";
$metodos = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metodos de pago</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet">
    <link href="assets/images/favicon.png" rel="icon">
    <link href="assets/images/favicon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="validaciones.js"></script>
</head>
<body>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Metodos de pago</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
            
    <div class="col-auto mb-3">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i class="fa-solid fa-circle-plus"></i> Nuevo Metodo de pago</a>
    </div>

          <div class="card">
            <!-- /.card-header -->
            <div class="data_table card-body table-responsive">
            <table id="example" class="table table-sm table-striped table-hover mt-4">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th style="width: 300px;">Nombre</th>
                <th style="width: 300px;">Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $metodos->fetch_assoc()){ ?>
              <tr>
                <td><?= $row['tmpag_idmetd'] ?></td>
                <td><?= $row['tmpag_namemt'] ?></td>
                <td>

                <?php if($row['tmpag_status']): ?>
                
                Activo

                <?php else: ?>
                
                Inactivo
                
                <?php endif; ?>
                
                </td>

                <td>

                  <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editaModal" data-bs-id="<?= $row['tmpag_idmetd']; ?>"><i class="fa-solid fa-pencil"></i> Editar</a>

                  <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-id="<?= $row['tmpag_idmetd']; ?>"><i class="fa-solid fa-trash"></i> Eliminar</a>

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
    include 'editaModal.php';
    include 'eliminaModal.php';
    ?>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script src="assets/js/pdfmake.min.js"></script>
    <script src="assets/js/vfs_fonts.js"></script>

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

     let editaModal = document.getElementById('editaModal')
     let eliminaModal = document.getElementById('eliminaModal')

     editaModal.addEventListener('show.bs.modal', event => {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')

        let inputId = editaModal.querySelector('.modal-body #id')
        let inputNombre = editaModal.querySelector('.modal-body #nombre')
        let inputEstado = editaModal.querySelector('.modal-body #estado')

        let url = "modulometodosdepago/getMoneda.php"
        let formData = new FormData()
        formData.append('id', id)

        fetch(url, {
            method: "POST",
            body: formData
        }).then(response => response.json())
        .then(data => {

            inputId.value = data.tmpag_idmetd
            inputNombre.value = data.tmpag_namemt
            inputEstado.value = data.tmpag_status

        }).catch(err => console.log(err))

     })

     eliminaModal.addEventListener('shown.bs.modal', event => {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')
        eliminaModal.querySelector('.modal-footer #id').value = id
     })
    </script>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>