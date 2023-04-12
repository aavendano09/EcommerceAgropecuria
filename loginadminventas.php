<?php

   session_start();
   if(isset($_SESSION['idAdminVentas'])==true){
    header("location:paneladminventas/panel.php");
   }

   error_reporting(0);

include_once "conexion.php";

$sqltipousuairo = "SELECT ttusu_descus FROM ttusu_tme WHERE ttusu_idtipu = '01' OR ttusu_idtipu= '02'";
$generos = $conexion->query($sqltipousuairo);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="validaciones.js"></script>
</head>

<body>

<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
  <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>

  <div class="container px-5 py-4 px-md-5 text-center text-lg-start my-4">
    <div class="row gx-lg-5 align-items-center mb-2">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h2 class="my-5 display-9 fw-bold ls-tight text-center align-items-center" style="color: hsl(218, 81%, 95%)">
          Ferreagro El Agricultor C.A. <br />
          <span class="text-center align-items-center" style="color: hsl(218, 81%, 75%)">Su cosecha en buenas manos</span>
        </h2>
        <img class="img-fluid rounded rounded mx-auto d-block" width="400px" height="200px" src="imagenes/insumos-agricolas.jpg">
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">

          <?php

if(isset($_REQUEST['aceptar'])){
   session_start();
   $username=$_REQUEST['username'];
   $correo=$_REQUEST['email'];
   $password=$_REQUEST['password'];
   $tipousuario=$_REQUEST['tipousuario'];
   include_once "conexion.php";
   $consulta="SELECT *
   FROM tuser_tme 
   WHERE tuser_userna='$username' AND tuser_emailu='$correo' AND tuser_passus='$password'";
   $resultado=mysqli_query($conexion,$consulta);
   $row=mysqli_fetch_assoc($resultado);
   if($row['tuser_fktipu']=='Administrador de Ventas'){ //administrador de Ventas
      $_SESSION['idAdminVentas']=$row['tuser_iduser'];
      $_SESSION['emailAdminVentas']=$row['tuser_emailu'];
      $_SESSION['usernameAdminVentas']=$row['tuser_userna'];
      $_SESSION['tipousuarioAdminVentas']=$row['tuser_fktipu'];
      header("location: paneladminventas/panel.php");
   }
   else{
?>
   <div class="alert alert-danger" role="alert">
        Verifique los datos introducidos!!!
   </div>
<?php
   }
}
?>
            <form method="post">
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
              <div class="text-center mb-4">
                <h3>Ingrese los siguientes datos por favor:</h3>
              </div>

              <div class="form-outline mb-4">
                <input placeholder="Pedro Peréz" onkeypress="return SoloLetras(event, true);" type="text" id="username" class="form-control" name="username" />
                <label class="form-label" for="form3Example4">Nombre de usuario</label>
              </div>
               
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input placeholder="pedro@gmail.com" type="email" id="email" class="form-control" name="email" />
                <label class="form-label" for="form3Example3">Correo Electronico</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input placeholder="********" onkeypress="return Pass(event)" type="password" id="password" class="form-control" name="password" />
                <label class="form-label" for="form3Example4">Contraseña</label>
              </div>

             
              <!-- Submit button -->

              <div class="d-grid gap-2 col-6 mx-auto">
              <button type="submit" class=" btn btn-primary btn-block mb-4 mt-5" name="aceptar">
                Iniciar Sección
              </button>
              </div>

              <!-- Register buttons -->
              <div class="text-center">
                <p>@Since 2021</p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

