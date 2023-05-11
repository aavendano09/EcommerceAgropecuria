<?php

session_start();
error_reporting(0);
$modulo=$_REQUEST['modulo'];

$accion = $_REQUEST['accion'];
if($accion=='cerrar'){
session_destroy();
header("Refresh:0");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ferreagro El Agricultor</title>

 
  <!-- Favicon -->
  <link href="fronted/img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="fronted/lib/animate/animate.min.css" rel="stylesheet">
<link href="fronted/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="fronted/css/bootstrap.min.css" rel="stylesheet">

<link href="fronted/lib/animate/animate.min.css" rel="stylesheet">

<link href="fronted/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="fronted/css/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="fronted/css/style.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="fronted/css/style.css" rel="stylesheet">
<script src="validations/minivalid.js"></script>

</head>
<?php
include_once "conexion.php";
?>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
    <?php

    include_once "menu.php";

  if($modulo=="productos"|| $modulo==""){
    include_once "productos.php";
  }

  if($modulo=="promociones"|| $modulo==""){
    include_once "promociones.php";
  }

  if($modulo=="contacto"|| $modulo==""){
    include_once "contacto.php";
  }

  if($modulo=="detalleproducto"|| $modulo==""){
    include_once "detalleproducto.php";
  }

  if($modulo=="carrito"|| $modulo==""){
    include_once "carrito.php";
  }

  if($modulo=="envio"|| $modulo==""){
    include_once "envio.php";
  }

  if($modulo=="pasarela"|| $modulo==""){
    include_once "pasarela.php";
  }

  if($modulo=="ordendeentrega"|| $modulo==""){
    include_once "ordendeentrega.php";
  }

  if($modulo=="historialcompras"|| $modulo==""){
    include_once "historialcompras.php";
  }


  ?>
  </div>

 	
    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Nuestra Oficina</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>La Grita, Estado Tachira</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0277-2917101</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>elagricultor@gmail.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Enlaces Rapidos:</h5>
                    <a class="btn btn-link" href="home.php?modulo=productos">Productos</a>
                    <a class="btn btn-link" href="home.php?modulo=contacto">Contactanos</a>
                    <a class="btn btn-link" href="home.php?modulo=promociones">Promociones</a>
                    <a class="btn btn-link" href="fronted/tipoadmin.php">Iniciar Sesion</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Horas de Trabajo</h5>
                    <p class="mb-1">Lunes - Viernes</p>
                    <h6 class="text-light">09:00 am - 06:00 pm</h6>
                    <p class="mb-1">Sabado</p>
                    <h6 class="text-light">09:00 am - 2:00 pm</h6>
                    <p class="mb-1">Domingo</p>
                    <h6 class="text-light">07:00 am - 1:00 pm</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Boletin Informativo</h5>
                    <p>Recuerda que si deseas visulizar nuestros productos puedes hacerlo accediendo
                        al siguiente enlace. Bienvenido!
                    </p>
                    <div class="position-relative w-100">
                        <a href="home.php?modulo=productos" class="btn btn-primary  position-absolute ">Catalogo de productos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
 
  <script src="js/carritocompra.js"></script>

   <!-- JavaScript Libraries -->


    <script src="fronted/lib/wow/wow.min.js"></script>
    <script src="fronted/lib/easing/easing.min.js"></script>
    <script src="fronted/lib/waypoints/waypoints.min.js"></script>
    <script src="fronted/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="fronted/lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="fronted/js/main.js"></script>

</body>
</html>
