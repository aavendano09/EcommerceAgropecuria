<?php

   session_start();
   if(isset($_SESSION['idAdminVentas'])==false){
    header("location:../loginadminventas.php");
   }


$modulo=$_REQUEST['modulo'];

require '../vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administración de Ventas</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link href="assets/webfonts">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/all.min.css" rel="stylesheet">
    <link href="../assets/images/favicon.png" rel="icon">
    <link href="../assets/images/favicon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.bootstrap5.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchbuilder/1.4.0/css/searchBuilder.bootstrap5.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/2.1.0/css/searchPanes.bootstrap5.min.css"/>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="../exitadminventas.php">
                        <i class="fas fa-share mr-2"></i>Cerrar Seccion</br>
                        </a>
                    </div>
                </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../home.php?modulo=productos" class="brand-link">
      <img src="../images/logotipo.jpg" alt="logotipo empresa" class="brand-image img-circle elevation-3" style="width: 40px; height: 50px; margin-left: 10px;">
      <span class="brand-text font-weight-light">El Agricultor C.A.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../imagenes/usuario.png" class="img-circle elevation-2" alt="User Imagen">
        </div>
        <div class="info">
          <span class="text-info"><?php echo $_SESSION['usernameAdminVentas']; ?></span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="panel.php?modulo=home" class="nav-link <?php echo ($modulo=="home" || $modulo=="" )?" active ":" "; ?>">
                  <i class="fas fa-chalkboard-teacher nav-icon"></i>
                  <p>Home</p>
                </a>
               </li>
            <li class="nav-item menu-open">
            <a href="#" class="nav-link <?php echo ($modulo=="ventas" )?" active ":" "; ?>">
            <i class="fa-sharp fa-solid fa-store nav-icon"></i>
              <p>Ventas</p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="panel.php?modulo=nuevaventa" class="nav-link <?php echo ($modulo=="nuevaventa" )?" active ":" "; ?>">
                  <i class="fas fa-chevron-right nav-icon"></i>
                  <p>Nueva Venta</p>
                </a>
             </li>
            </ul>
            <li class="nav-item menu-open">
            <a href="#" class="nav-link <?php echo ($modulo=="reportes" )?" active ":" "; ?>">
            <i class="fas fa-file-pdf"></i>
              <p class="ms-1">Reportes</p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="panel.php?modulo=inventario" class="nav-link <?php echo ($modulo=="inventario" )?" active ":" "; ?>">
                  <i class="fas fa-calendar-alt nav-icon"></i>
                  <p>Inventario</p>
                </a>
             </li>
             <li class="nav-item">
                <a href="panel.php?modulo=historialdeventas" class="nav-link <?php echo ($modulo=="historialdeventas" )?" active ":" "; ?>">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Historial de Ventas</p>
                </a>
             </li>
            </ul>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <?php
    if(isset($_REQUEST['mensaje'])){
    ?>
    <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
      </button>
      <?php echo $_REQUEST['mensaje'] ?>
    </div>
    <?php
    }

  if($modulo=="home"|| $modulo==""){
    include_once "estadisticasadminventas.php";
  }

  if($modulo=="inventario"){
    include_once "moduloinventario/inventario.php";
  }


  if($modulo=="nuevaventa"){
    include_once "moduloventas/ventas.php";
  }
  
  if($modulo=="historialdeventas"){
    include_once "moduloventas/reporteventa.php";
  }

  ?>
  </div>

  <!--Footer-->

  <footer class="main-footer">
    <strong>Since &copy; 2020 <a href="paneladmin.php?modulo=home">Administracion de la empresa</a>.</strong>
    Su cosecha en buenas manos
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2023
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
  <!-- jQuery UI 1.11.4 -->
  <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../plugins/moment/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
 

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap5.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/searchbuilder/1.4.0/js/dataTables.searchBuilder.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/searchbuilder/1.4.0/js/searchBuilder.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/searchpanes/2.1.0/js/dataTables.searchPanes.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/searchpanes/2.1.0/js/searchPanes.bootstrap5.min.js"></script>
 

<script>

  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<script>
      $(document).ready(function () {
         $(".borrar").click(function (e) {
            e.preventDefault();
            var res=confirm("Realmente quieres eliminar ese usuario?");
            if(res==true){
              var link=$(this).attr("href");
              window.location=link;
            }
         });
      });
</script>
</body>
</html>
