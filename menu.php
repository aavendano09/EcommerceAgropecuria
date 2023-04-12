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

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-0 pe-5">
        <a href="index.php" class="navbar-brand ps-5 me-0">
            <h1 style="width: 320px;" class="text-white m-0">El Agricultor C.A.</h1>
        </a>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a style="margin-left: 20px;" href="index.php" class="nav-item nav-link active">Inicio</a>
                <a href="home.php?modulo=productos" class="nav-item nav-link">Productos</a>
                <a href="home.php?modulo=promociones" class="nav-item nav-link">Promociones</a>
                <a href="home.php?modulo=contacto" class="nav-item nav-link">Contactos</a>
                <a href="home.php?modulo=carrito" class="nav-item nav-link">Ver Carrito</a>
                
                <div>
        <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" id="iconoCarrito">
          <i class="fa fa-cart-plus" aria-hidden="true"></i>
          <span class="badge badge-danger navbar-badge" id="badgeProducto" >0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listaCarrito">
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          Cliente
          <i class="fa fa-user" aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
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

          <a href="home.php?modulo=usuario" class="dropdown-item">
             <i class="fas fa-user mr-2 text-primary"></i>Hola <?php echo $_SESSION['usernameCliente']; ?>
          </a>
          <form action="home.php?modulo=productos" method="post">
            <button name="accion" class="btn btn-danger dropdown-item" type="submit" value="cerrar">
                 <i class="fas fa-door-closed mr-2 text-danger"></i>Cerrar Sesion
            </button>
          </form>
          <?php
            }
          ?>
        </div>
      </li>
      <li>
      <a style="margin-top: 10px; margin-bottom: 10px;" href="fronted/tipoadmin.php" class="btn btn-primary px-3  d-lg-block pt-2">Iniciar Sesion</a>
        
      </li>
    </ul>
    </div>
            </div>
              </div>
        
    
      </div>
    <!-- Navbar End -->
</nav>
  <!-- /.navbar -->
  <?php

  $mensaje = $_REQUEST['mensaje'];
  if($mensaje){
    ?>
     <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               <span class="sr-only">Close</span>
        </button>
        <?php echo $mensaje; ?>
     </div>
    <?php
  }
  ?>





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