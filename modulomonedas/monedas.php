<?php

require_once('conexion.php');

$sql = "SELECT tmone_idmone, tmone_namemo, tmone_status, tmone_imagen FROM tmone_tme;";
$monedas = $conexion->query($sql);

require_once 'validations/Formulario.php';
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
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script>
      const modulo = "modulomonedas";
      const modaltitle = "Moneda";
    </script>
</head>
<body>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Monedas</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
            
    <div class="col-auto mb-3">
        <a href="#" id="new" class="btn btn-primary" data-bs-toggle="modal"><i class="fa-solid fa-circle-plus"></i> Nueva Moneda</a>
    </div>

          <div class="card">
            <!-- /.card-header -->
            <div class="data_table card-body table-responsive">
            <table id="example" class="table table-sm table-striped table-hover mt-4">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row_monedas = $monedas->fetch_assoc()){ ?>
               <tr>
                 <td><?= $row_monedas['tmone_idmone'] ?></td>
                 <td><?= $row_monedas['tmone_namemo'] ?></td>
                 <td>
                  <?php if($row_monedas['tmone_status']): ?>
                  
                  Activo

                  <?php else: ?>
                  
                  Inactivo
                  
                  <?php endif; ?>
                 </td>
                 <td><img style="width: 100px;" src="data:image/jpg;base64,<?php echo base64_encode($row_monedas['tmone_imagen']) ?>" alt=""></td>
                 <td>

                  <a href="#" id="edit" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#nuevoModal" onclick="edit(<?= $row_monedas['tmone_idmone']; ?>)"><i class="fa-solid fa-pencil"></i> Editar</a>

                  <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-id="<?= $row_monedas['tmone_idmone']; ?>"><i class="fa-solid fa-trash"></i> Eliminar</a>

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
    <script src="js/jquery-3.6.0.min.js"></script>
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
      input["ara"] = false;
      arrInput[4] = "ara";
      // $('#imagen').attr("required", false);
$("#new").on(
	"click",
	function(){
    $('#ara').prop("id", "imagen");
	  $('#imagen').prop("name", "imagen");
    $('#imagen').prop("required", true);
    $('#imagen').prop('name', 'imagen');
    $('#grupo__ara').prop('id', 'grupo__imagen');
	}
  )


    
     let editaModal = document.getElementById('nuevoModal')
     let eliminaModal = document.getElementById('eliminaModal')

     function edit(val) {
       $('#imagen').prop("id", "ara");
       $('#ara').prop("name", "ara");
       $('#ara').removeAttr("required");
       $('#grupo__imagen').prop('id', 'grupo__ara');
       document.getElementById(`grupo__ara`).classList.remove('formulario__grupo-incorrecto');
       formulario.reset();

      let id = val;
      

        let inputId = editaModal.querySelector('.modal-body #id')
        let inputNombre = editaModal.querySelector('.modal-body #nombre')
        let inputNombreOld = editaModal.querySelector('.modal-body #nombreOld')
        let inputEstado = editaModal.querySelector('.modal-body #estado')
        

        let url = "modulomonedas/getMoneda.php"
        let formData = new FormData()
        formData.append('id', id)

        fetch(url, {
            method: "POST",
            body: formData
        }).then(response => response.json())
        .then(data => {

            inputId.value = data.tmone_idmone
            inputNombre.value = data.tmone_namemo
            inputEstado.value = data.tmone_status
            inputNombreOld.value = data.tmone_namemo

        }).catch(err => console.log(err))

        openEdit();
        validRefresh();
     }

     eliminaModal.addEventListener('shown.bs.modal', event => {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')
        eliminaModal.querySelector('.modal-footer #id').value = id
     })
    </script>

</body>
</html>


