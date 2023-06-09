<?php

require_once('conexion.php');

$sql = "SELECT tcuba_idcuBa, tcuba_nameba, tcuba_Nocuba, tcuba_identi, tcuba_tpcuba, tcuba_rifba FROM tcuba_tme;";
$cuentas = $conexion->query($sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monedas</title>
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
            <h1>Cuentas Bancarias</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
            
    <div class="col-auto mb-3">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i class="fa-solid fa-circle-plus"></i> Nueva Cuenta Bancaria</a>
    </div>

          <div class="card">
            <!-- /.card-header -->
            <div class="data_table card-body table-responsive">
            <table id="example" class="table table-sm table-striped table-hover mt-4">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Numero de Cuenta</th>
                <th>Cedula o Rif</th>
                <th>Tipo Cuenta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row_cuentas = $cuentas->fetch_assoc()){ ?>

               <tr>
                 <td><?= $row_cuentas['tcuba_idcuBa'] ?></td>
                 <td><?= $row_cuentas['tcuba_nameba'] ?></td>
                 <td><?= $row_cuentas['tcuba_Nocuba'] ?></td>
                 <td><?= $row_cuentas['tcuba_rifba'] . "-" .number_format($row_cuentas['tcuba_identi'], 0, ",", ".") ?></td>
                 <td><?= $row_cuentas['tcuba_tpcuba'] ?></td>
                 <td>

                  <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editaModal" data-bs-id="<?= $row_cuentas['tcuba_idcuBa']; ?>"><i class="fa-solid fa-pencil"></i> Editar</a>

                  <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-id="<?= $row_cuentas['tcuba_idcuBa']; ?>"><i class="fa-solid fa-trash"></i> Eliminar</a>

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
        let inputnumero = editaModal.querySelector('.modal-body #edinumero')
        let inputhidenumero = editaModal.querySelector('.modal-body #hidenumero')
        let inputidentificacion = editaModal.querySelector('.modal-body #ediidentificacion')
        let inputcedrif = editaModal.querySelector('.modal-body #cedrif')
        let inputtipocuenta = editaModal.querySelector('.modal-body #tipocuenta')

        let url = "modulocuentasbancarias/getMoneda.php"
        let formData = new FormData()
        formData.append('id', id)

        fetch(url, {
            method: "POST",
            body: formData
        }).then(response => response.json())
        .then(data => {

            inputId.value = data.tcuba_idcuBa
            inputNombre.value = data.tcuba_nameba
            inputnumero.value = data.tcuba_Nocuba
            inputhidenumero.value = data.tcuba_Nocuba
            inputidentificacion.value = data.tcuba_identi
            inputcedrif.value = data.tcuba_rifba
            inputtipocuenta.value = data.tcuba_tpcuba

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