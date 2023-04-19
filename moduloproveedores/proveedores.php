<?php

require_once('conexion.php');

$sql = "SELECT tprov_idprov, tprov_Rifpro, tprov_Razsoc, tprov_direpr, tprov_telepr, tprov_emailp, tprov_status, tprov_tiprif FROM tdprv_tme;";
$proveedores = $conexion->query($sql);

 require_once 'validations/Formulario.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet">
    <link href="assets/images/favicon.png" rel="icon">
    <link href="assets/images/favicon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script>
      const modulo = "moduloproveedores";
      const modaltitle = "proveedor";
    </script>
</head>
<body>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Proveedores</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
            
    <div class="col-auto mb-3">
        <a href="#" id="new" class="btn btn-primary" data-bs-toggle="modal" ><i class="fa-solid fa-circle-plus"></i> Nuevo Proveedor</a>
    </div>

          <div class="card">
            <!-- /.card-header -->
            <div class="data_table card-body table-responsive">
            <table id="example" class="table table-sm table-striped table-hover mt-4">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Rif</th>
                <th>Razon Social</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo Electronico</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row_proveedores = $proveedores->fetch_assoc()){ ?>
               <tr>
                 <td><?= $row_proveedores['tprov_idprov'] ?></td>
                 <td><?= $row_proveedores['tprov_tiprif']."-".$row_proveedores['tprov_Rifpro'] ?></td>
                 <td><?= $row_proveedores['tprov_Razsoc'] ?></td>
                 <td><?= $row_proveedores['tprov_direpr'] ?></td>
                 <td><?= $row_proveedores['tprov_telepr'] ?></td>
                 <td><?= $row_proveedores['tprov_emailp'] ?></td>
                 <td>
                  
                 <?php if($row_proveedores['tprov_status']): ?>
                
                  Activo

                  <?php else: ?>
                  
                  Inactivo
                  
                  <?php endif; ?>
                  
                  
                  </td>
                 <td>

                  <a href="#" id="edit" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#nuevoModal" data-bs-id="<?= $row_proveedores['tprov_idprov']; ?>"><i class="fa-solid fa-pencil"></i> Editar</a>

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

editaModal.addEventListener('show.bs.modal', event => {
  let button = event.relatedTarget
  let id = button.getAttribute('data-bs-id')
  validRefresh();
   openEdit();

   let inputId = editaModal.querySelector('.modal-body #id')
   let inputIdentificacion = editaModal.querySelector('.modal-body #rif')
   let inputIdentificacionHide = editaModal.querySelector('.modal-body #rifOld')
   let inputTiprif= editaModal.querySelector('.modal-body #tiprif')
   let inputTiprifOld= editaModal.querySelector('.modal-body #tiprifOld')
   let inputRazon = editaModal.querySelector('.modal-body #razon')
   let inputDireccion = editaModal.querySelector('.modal-body #direccion')
   let inputTelefono = editaModal.querySelector('.modal-body #telefono')
   let inputCorreo = editaModal.querySelector('.modal-body #correo')
   let inputCorreoHide = editaModal.querySelector('.modal-body #correoOld')
   let inputEstado = editaModal.querySelector('.modal-body #estado')

   let url = "moduloproveedores/getMoneda.php"
   let formData = new FormData()
   formData.append('id', id)

   fetch(url, {
       method: "POST",
       body: formData
   }).then(response => response.json())
   .then(data => {

       inputId.value = data.tprov_idprov
       inputIdentificacion.value = data.tprov_Rifpro
       inputTiprif.value = data.tprov_tiprif
       inputRazon.value = data.tprov_Razsoc
       inputDireccion.value = data.tprov_direpr
       inputTelefono.value = data.tprov_telepr
       inputCorreo.value = data.tprov_emailp
       inputEstado.value = data.tprov_status
       inputIdentificacionHide.value = data.tprov_Rifpro
       inputCorreoHide.value = data.tprov_emailp
       inputTiprifOld.value = data.tprov_tiprif
       console.log(data.tprov_status);
       
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