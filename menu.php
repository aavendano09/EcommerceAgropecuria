<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ferreagro El Agricultor C.A.</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="fronted/img/favicon.ico" rel="icon">

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
    <link href="fronted/lib/animate/animate.min.css" rel="stylesheet">
    <link href="fronted/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="fronted/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="fronted/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand me-5" href="index.php">El Agricultor C.A.</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div style="margin-left: 10px;" class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="home.php?modulo=productos">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="home.php?modulo=promociones">Promociones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="home.php?modulo=contacto">Contacto</a>
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
<a href="logincliente.php" class="dropdown-item">
<i class="fas fa-door-open mr-2 text-primary"></i> Loguearse
</a>
<div class="dropdown-divider"></div>
<a href="registrocliente.php" class="dropdown-item">
 <i class="fas fa-sign-in-alt mr-2 text-primary"></i> Registrarse
</a>
<?php
}else{
?>

<a href="" class="dropdown-item">
 <i class="fas fa-user mr-2 text-primary"></i>Hola <?php echo $_SESSION['usernameCliente']; ?>
</a>
<div class="dropdown-divider"></div>
<a href="home.php?modulo=historialcompras" class="dropdown-item">
 <i class="fa fa-cart-arrow-down mr-2 text-primary"></i> Historial de compras
</a>
<div class="dropdown-divider"></div>
<form action="home.php?modulo=productos" method="post">
<button name="accion" class="btn btn-danger dropdown-item" type="submit" value="cerrar">
     <i class="fas fa-door-closed mr-2 text-danger"></i>Cerrar Sesion
</button>
</form>
<?php
}
?>
          </ul>
        </li>
        <li class="nav-item rounded">
          <a class="nav-link btn btn-primary p-2" style=" border-radius: 3px; margin-top: 10px;" href="fronted/tipoadmin.php" tabindex="-1" aria-disabled="true">Iniciar Sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <!-- JavaScript Libraries -->
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="fronted/lib/wow/wow.min.js"></script>
    <script src="fronted/lib/easing/easing.min.js"></script>
    <script src="fronted/lib/waypoints/waypoints.min.js"></script>
    <script src="fronted/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="fronted/lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="fronted/js/main.js"></script>
</body>

</html>