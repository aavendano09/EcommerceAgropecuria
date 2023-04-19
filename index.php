<?php session_start(); ?>

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
          <a class="nav-link" href="home.php?modulo=carrito">Ver Carrito</a>
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
        <li class="nav-item">
          <a class="nav-link btn btn-primary " href="fronted/tipoadmin.php" tabindex="-1" aria-disabled="true">Iniciar Sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="images/maquinaria.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 text-start">
                                    <p class="fs-5 fw-medium text-primary text-uppercase animated slideInRight">5 Años
                                        de Experiencia Laboral</p>
                                    <h1 class="display-1 text-white mb-5 animated slideInRight">La Mejor Solución para sus Cosechas</h1>
                                    <a href="home.php?modulo=productos" class="btn btn-primary py-3 px-5 animated slideInRight">Explorar mas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-50" src="images/imagen8.png" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 text-start">
                                    <p class="fs-5 fw-medium text-primary text-uppercase animated slideInRight">5 Años
                                        de Experiencia Laboral</p>
                                    <h1 class="display-1 text-white mb-5 animated slideInRight">Las Mejores Semillas Certificadas para sus Cosechas</h1>
                                    <a href="home.php?modulo=productos" class="btn btn-primary py-3 px-5 animated slideInRight">Explorar mas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row gx-3 h-100">
                        <div class="col-6 align-self-start wow fadeInUp" data-wow-delay="0.1s">
                            <img style="height: 300px; width: 500px;" class="img-fluid" src="imagenes/agropecuario2.jpg">
                        </div>
                        <div class="col-6 align-self-end wow fadeInDown" data-wow-delay="0.1s">
                            <img style="height: 300px;" class="img-fluid" src="imagenes/agropecuario1.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="fw-medium text-uppercase text-primary mb-2">Sobre Nosotros</p>
                    <h1 class="display-5 mb-4">Somos líderes en el mercado industrial</h1>
                    <p class="mb-4 text-justify">Contamos con gran variedad en Semillas, Insumos y Fertilizantes Agricolas de alta calidad
                        para sus cosechas amigo productor, ademas disponemos de maquinaria para el arreglo de los terrenos.
                    </p>
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-shrink-0 bg-primary p-4">
                            <h1 class="display-2">5</h1>
                            <h5 class="text-white">Años de</h5>
                            <h5 class="text-white">Experiencia</h5>
                        </div>
                        <div class="ms-4">
                            <p><i class="fa fa-check text-primary me-2"></i>Poder & Energia</p>
                            <p><i class="fa fa-check text-primary me-2"></i>Ingenieros Agronomos</p>
                            <p><i class="fa fa-check text-primary me-2"></i>Ingenieros Agropecuarios</p>
                            <p><i class="fa fa-check text-primary me-2"></i>Personal Capacitado</p>
                            <p class="mb-0"><i class="fa fa-check text-primary me-2"></i>Excelente atencion & Asesoramiento</p>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-sm-7">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-envelope-open text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-2">Correo Electronico</p>
                                    <h5 class="mb-0">elagricultor@gmail.com</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-phone-alt text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-2">Telefono</p>
                                    <h5 class="mb-0">+58 4147166765</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-fluid facts my-5 p-5">
        <div class="row g-5">
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="text-center border p-5">
                    <i class="fa fa-certificate fa-3x text-white mb-3"></i>
                    <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">5</h1>
                    <span class="fs-5 fw-semi-bold text-white">años de experiencia</span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
                <div class="text-center border p-5">
                    <i class="fa fa-users-cog fa-3x text-white mb-3"></i>
                    <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">600</h1>
                    <span class="fs-5 fw-semi-bold text-white">Miembros</span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.5s">
                <div class="text-center border p-5">
                    <i class="fa fa-users fa-3x text-white mb-3"></i>
                    <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">957</h1>
                    <span class="fs-5 fw-semi-bold text-white">Clientes felices</span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.7s">
                <div class="text-center border p-5">
                    <i class="fa fa-check-double fa-3x text-white mb-3"></i>
                    <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">1839</h1>
                    <span class="fs-5 fw-semi-bold text-white">Proyectos</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative me-lg-4">
                        <img class="img-fluid w-100" src="imagenes/agropecuario.jpg" alt="">
                        <span
                            class="position-absolute top-50 start-100 translate-middle bg-white rounded-circle d-none d-lg-block"
                            style="width: 120px; height: 120px;"></span>
                            <a class="btn btn-play" target="_blank" href="https://www.youtube.com/watch?v=LVs6Y55MwQE"></a>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <p class="fw-medium text-uppercase text-primary mb-2">¡POR QUE ELEGIRNOS!</p>
                    <h1 class="display-5 mb-4">¡Razones por las que la gente nos elige!</h1>
                    <p class="mb-4">A continuación les presentamos algunas de las mas importantes razones
                        por las cuales alegirnos dia a dia en el campo agropecuario amigo agricultor...
                    </p>
                    <div class="row gy-4">
                        <div class="col-12">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-check text-white"></i>
                                </div>
                                <div class="ms-4">
                                    <h4>Trabajadores con Experiencia</h4>
                                    <span>Especialistas para diversidad de cultivos agricolas, para asi 
                                        recomendar productos efectivos y de calidad para sus necesidades.
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-check text-white"></i>
                                </div>
                                <div class="ms-4">
                                    <h4>Servicios Agropecuarios confiables</h4>
                                    <span>Puedes contar con asesorias seguras y efectivas sin ningun costo adicional</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-check text-white"></i>
                                </div>
                                <div class="ms-4">
                                    <h4>Soporte Tecnico 24/7</h4>
                                    <span>Contamos con personal capacitado en campo abierto para
                                        garantizar una excelente atencion.
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fw-medium text-uppercase text-primary mb-2">Nuestros Servicios</p>
                <h1 class="display-5 mb-4">Brindamos los mejores servicios industriales</h1>
            </div>
            <div class="row gy-5 gx-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <img class="img-fluid" src="imagenes/semillas.jpg" alt="">
                        <div class="service-img">
                            <img class="img-fluid" src="imagenes/semillasservicio.jpg" alt="">
                        </div>
                        <div class="service-detail">
                            <div class="service-title">
                                <hr class="w-25">
                                <h3 class="mb-0">Semillas Hibridas</h3>
                                <hr class="w-25">
                            </div>
                            <div class="service-text">
                                <p class="text-white mb-0">Gran variedad de semillas importadas y de la mejor
                                    calidad directa a los agricultores de la zona montaña.
                                </p>
                            </div>
                        </div>
                        <a class="btn btn-light" href="home.php?modulo=productos">Ver mas</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <img class="img-fluid" src="imagenes/insumos.jpg" alt="">
                        <div class="service-img">
                            <img class="img-fluid" src="imagenes/insumos1.jpg" alt="">
                        </div>
                        <div class="service-detail">
                            <div class="service-title">
                                <hr class="w-25">
                                <h3 class="mb-0">Insumos Agricolas</h3>
                                <hr class="w-25">
                            </div>
                            <div class="service-text">
                                <p class="text-white mb-0">Los mejores agroquimicos y bioquimicos para controlar las
                                    plagas y malezas de sus suelos y plantas.
                                </p>
                            </div>
                        </div>
                        <a class="btn btn-light" href="home.php?modulo=productos">Ver mas</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <img class="img-fluid" src="imagenes/ferti1.jpg" alt="">
                        <div class="service-img">
                            <img class="img-fluid" src="imagenes/ferti.jpg" alt="">
                        </div>
                        <div class="service-detail">
                            <div class="service-title">
                                <hr class="w-25">
                                <h3 class="mb-0">Fertilizantes Agricolas</h3>
                                <hr class="w-25">
                            </div>
                            <div class="service-text">
                                <p class="text-white mb-0">Los mejores fertilizantes para abonar sus cosechas
                                    y aumentar el rendimiento de las plantas.
                                </p>
                            </div>
                        </div>
                        <a class="btn btn-light" href="home.php?modulo=productos">Ver mas</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Project Start -->
    <div class="container-fluid bg-dark pt-5 my-5 px-0">
        <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Nuestros Proyectos</p>
            <h1 class="display-5 text-white mb-5">Vea lo que hemos completado recientemente</h1>
        </div>
        <div class="owl-carousel project-carousel wow fadeIn" data-wow-delay="0.1s">
            <a class="project-item" href="">
                <img style="height: 200px;" class="img-fluid" src="imagenes/invernadero.jpg" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Siembra en Invernadero</h5>
                </div>
            </a>
            <a class="project-item" href="">
                <img style="height: 200px;" class="img-fluid" src="imagenes/siembradepapa.jpg" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Siembra de papa</h5>
                </div>
            </a>
            <a class="project-item" href="">
                <img style="height: 200px;" class="img-fluid" src="imagenes/siembradecebolla.jpg" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Siembra de Cebolla</h5>
                </div>
            </a>
            <a class="project-item" href="">
                <img style="height: 200px;" class="img-fluid" src="imagenes/siembradetomate.jpg" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Siembra de Tomate</h5>
                </div>
            </a>
            <a class="project-item" href="">
                <img style="height: 200px;" class="img-fluid" src="imagenes/repollo.png" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Siembra de Repollo </h5>
                </div>
            </a>
            <a class="project-item" href="">
                <img style="height: 200px;" class="img-fluid" src="imagenes/zanahoria.jpg" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Siembra de Zanahoria</h5>
                </div>
            </a>
        </div>
    </div>
    <!-- Project End -->

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