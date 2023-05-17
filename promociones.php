<!DOCTYPE html>
<html lang="en">
   <head>
       <!-- basic -->
	   <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Ferreagro El Agricultor</title>
      <!-- bootstrap css -->
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
     
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
   <!-- body -->
   <body class="main-layout">

	<!-- new collection section start -->
  <div class="collection_text">Promociones</div>
  <div class="oferta about_main layout_padding">

	<style>

.collection_text{ 
    width: 100%; 
    float: left; 
    color: #ffffff; 
    text-align: center; 
    font-weight: bold; 
    font-size: 40px; 
    background-color: #56bcdb;
    padding: 30px 0px;  
}
		.oferta{
			background-color: white;
		}
	</style>
    <div class="collection_section">
    	<div class="container">
    		<h1 class="new_text"><strong>Ofertas del dia</strong></h1>
    	    <p class="consectetur_text">Aprovecha de adquirir los siguientes productos con un super descuento amigo agricultor</p>
    	</div>
    </div>
    <div class="row mt-2">
             <?php

             include_once "conexion.php";

             $consulta = "SELECT tprod_idprod, tprod_fotopr, tprod_descpr, tprod_prespr, tprod_preciv, tprod_cantpr FROM tprod_tme WHERE tprod_idprod<='2' AND tprod_status = '1';";

             $resultado = mysqli_query($conexion, $consulta);

             while($row=mysqli_fetch_assoc($resultado)){
                ?>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card border-primary">
                          <img style="height: 400px;" class="card-img-top img-thumbnail" src="data:image/jpg;base64,<?php echo base64_encode($row['tprod_fotopr']) ?>" alt="">
                          <div class="card-body">
                                <h4 class="card-title"><strong><?php echo $row['tprod_descpr']  ?></strong></h4>
                                <p class="card-text"><?php echo $row['tprod_prespr']  ?></p>
                                <p class="card-text"><strong>Precio:</strong><?php echo $row['tprod_preciv']  ?></p>
                                <p class="card-text"><strong>Cantidad:</strong><?php echo $row['tprod_cantpr']  ?></p>
                                <a href="home.php?modulo=detalleproducto&id=<?php echo $row['tprod_idprod'] ?>" class="btn btn-primary">Ver</a>
                          </div>
                    </div>
                </div>
             <?php
             }
             ?>
        </div>
      
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>
