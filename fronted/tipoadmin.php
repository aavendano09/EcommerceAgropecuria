<?php
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tipo de administrador</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand me-5" href="index.php">El Agricultor C.A.</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div style="margin-left: 10px;" class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../home.php?modulo=productos">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../home.php?modulo=promociones">Promociones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../home.php?modulo=contacto">Contacto</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" onclick="carga()" href="home.php?modulo=carrito">Ver Carrito</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" id="iconoCarrito">
          <i class="fa fa-cart-plus" aria-hidden="true"></i>
          <span class="badge badge-danger navbar-badge" id="badgeProducto" >0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listaCarrito">
        </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cliente
            <i class="fa fa-user" aria-hidden="true"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php

if(isset($_SESSION['idCliente'])==false){

?>
<a href="../logincliente.php" class="dropdown-item">
<i class="fas fa-door-open mr-2 text-primary"></i> Loguearse
</a>
<div class="dropdown-divider"></div>
<a href="../registrocliente.php" class="dropdown-item">
 <i class="fas fa-sign-in-alt mr-2 text-primary"></i> Registrarse
</a>
<?php
}else{
?>

<a href="" class="dropdown-item">
 <i class="fas fa-user mr-2 text-primary"></i>Hola <?php echo $_SESSION['usernameCliente']; ?>
</a>
<form action="../home.php?modulo=productos" method="post">
<button name="accion" class="btn btn-danger dropdown-item" type="submit" value="cerrar">
     <i class="fas fa-door-closed mr-2 text-danger"></i>Cerrar Sesion
</button>
</form>
<?php
}
?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-primary " href="tipoadmin.php" tabindex="-1" aria-disabled="true">Iniciar Sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fw-medium text-uppercase text-primary mb-2">Por favor</p>
                <h1 class="display-5 mb-5">Seleccione su tipo de usuario</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <img style="height: 300px; width: 400px;" class="img-fluid" src="../imagenes/usuarioadmin.jpg" alt="">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                                <i class="fa fa-2x fa-share text-white"></i>
                            </div>
                            <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4"
                                style="height: 90px;">
                                <h5>Usuario</h5>
                                <span class="text-primary">Administrador General</span>
                                <div class="team-social">
                                    <a class="btn btn-square btn-dark rounded-circle mx-1" href="../login.php">
                                        <i class="fa fa-key"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <img style="height: 300px; width: 400px;" class="img-fluid" src="../imagenes/userventas.png" alt="">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                                <i class="fa fa-2x fa-share text-white"></i>
                            </div>
                            <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4"
                                style="height: 90px;">
                                <h5>Usuario</h5>
                                <span class="text-primary">Administrador de Ventas</span>
                                <div class="team-social">
                                    <a class="btn btn-square btn-dark rounded-circle mx-1" href="../loginadminventas.php">
                                        <i class="fa fa-key"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <img style="height: 300px; width: 400px;" class="img-fluid" src="../imagenes/usuariocliente.jpg" alt="">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                                <i class="fa fa-2x fa-share text-white"></i>
                            </div>
                            <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4"
                                style="height: 90px;">
                                <h5>Usuario</h5>
                                <span class="text-primary">Cliente</span>
                                <div class="team-social">
                                    <a class="btn btn-square btn-dark rounded-circle mx-1" href="../logincliente.php">
                                    <i class="fa fa-key"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

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


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>