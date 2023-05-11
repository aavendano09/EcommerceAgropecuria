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

<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/styles.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
   </head>
   <!-- body -->
   <body class="main-layout">
  
      <div>
      <div class="container-fluid">
      <div class="row mt-2">
             <?php

             include_once "conexion.php";

             if (!empty($_REQUEST["numpagina"])) {
                 $_REQUEST["numpagina"] == $_REQUEST["numpagina"];
             }else{
                 $_REQUEST["numpagina"] = '1';}

             if ($_REQUEST["numpagina"] == "") {
                 $_REQUEST["numpagina"] = '1';}

             $consulta = "SELECT * FROM tprod_tme;";

             $resultado = mysqli_query($conexion, $consulta);

             $num_registros=mysqli_num_rows($resultado);

             $registros = '8';
             $pagina = $_REQUEST['numpagina'];

             if (is_numeric($pagina))
                 $inicio = (($pagina - 1) * $registros);
             else
                 $inicio = 0;
             $busqueda = mysqli_query($conexion, "SELECT * FROM tprod_tme INNER JOIN tprp_tts ON tprp_idtprp = tprod_fktprp INNER JOIN tpre_tts ON tpre_idpres = tprp_fkpres INNER JOIN tmpro_tme ON tmpro_idmedi = tpre_fkmedi WHERE tprod_status = '1' AND tprod_cantpr > '0' LIMIT $inicio,$registros;");
             $paginas = ceil($num_registros / $registros);

             ?>
             <h5 class="text-center mb-5 mt-3">Productos Disponibles: <?php echo $num_registros; ?></h5>
             <?php
             while($row=mysqli_fetch_assoc($busqueda)){
                ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div style="margin-bottom: 10px; height: 700px;" class="card border-primary">
                          <img style="height: 400px;" class="card-img-top img-thumbnail" src="data:image/jpg;base64,<?php echo base64_encode($row['tprod_fotopr']) ?>" alt="">
                          <div class="card-body">
                                <h4 class="card-title"><strong> <?=  $row['tprod_descpr'];  ?></strong></h4>
                                <p class="card-text"><?php echo $row['tpre_despre'] .' '. $row['tprod_connet'] .' '.$row['tmpro_descmd'];  ?></p>
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

       <!-- paginacion //////////////////////////////////////-->
       
    <div class="container-fluid  col-12">
        <ul class="pagination pg-dark justify-content-center pt-5 mb-0" style="float: none;" >
            <li class="page-item">
            <?php
            if($_REQUEST["numpagina"] == "1" ){
            $_REQUEST["numpagina"] == "0";
            echo  "";
            }else{
            if ($pagina>1)
            $ant = $_REQUEST["numpagina"] - 1;
            echo "<a class='page-link' aria-label='Previous' href='home.php?modulo=productos&numpagina=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>"; 
            echo "<li class='page-item '><a class='page-link' href='home.php?modulo=productos&numpagina=". ($pagina-1) ."' >".$ant."</a></li>"; }
            echo "<li class='page-item active'><a class='page-link' >".$_REQUEST["numpagina"]."</a></li>"; 
            $sigui = $_REQUEST["numpagina"] + 1;
            $ultima = $num_registros / $registros;
            if ($ultima == $_REQUEST["numpagina"] +1 ){
            $ultima == "";}
            if ($pagina<$paginas && $paginas>1)
            echo "<li class='page-item'><a class='page-link' href='home.php?modulo=productos&numpagina=". ($pagina+1) ."'>".$sigui."</a></li>"; 
            if ($pagina<$paginas && $paginas>1)
            echo "
            <li class='page-item'><a class='page-link' aria-label='Next' href='home.php?modulo=productos&numpagina=". ceil($ultima) ."'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>
            </li>";
            ?>
            </li>
        </ul>
    </div>
<!-- fin paginacion ///////////////////////// -->
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

   </body>
</html>

