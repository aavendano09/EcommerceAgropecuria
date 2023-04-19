<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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

if($_POST){
   session_start();
   $username=$_REQUEST['usuario'];
   $correo=$_REQUEST['correo'];
   $password=$_REQUEST['password'];
   $direccion=$_REQUEST['direccion'];
   $cedula=$_REQUEST['cedula'];
   $telefono=$_REQUEST['telefono'];
   include_once "conexion.php";

  $consulta = "SELECT tclie_identc FROM tclic_tme WHERE tclie_identc = '$cedula' LIMIT 1";
  
  $request = $conexion->query($consulta);

  if(mysqli_num_rows($request) == 0){

    $consulta = "SELECT tclie_emailc FROM tclic_tme WHERE tclie_emailc = '$correo' LIMIT 1";
  
    $request = $conexion->query($consulta);

    if(mysqli_num_rows($request) == 0){

   $consulta="INSERT INTO tclic_tme (tclie_identc,tclie_namecl,tclie_telecl,tclie_emailc,tclie_passcl,tclie_direcl, tclie_cedrif) VALUES ('$cedula','$username','$telefono','$correo','$password','$direccion', 'V')";
   $resultado=mysqli_query($conexion,$consulta);
   if($resultado){
 ?>

   <div class="alert alert-primary" role="alert">
        <strong>Registro exitoso</strong> <a href="logincliente.php">Ir a login</a>
   </div>

 <?php  

   }else{
?>
   <div id="verif" class="alert alert-danger" role="alert">
     <h5>Error de Registro!!!</h5>
    </div>
    
    <script>
      
      setTimeout(() => {
        document.getElementById('verif').style.display = "none";
      }, 2500);
      
      
      </script>
<?php
   }
  }else{
  ?>
    
    <div id="verif" class="alert alert-danger" role="alert">
  <h5>El correo electronico ya se encuentra registrado.</h5>
 </div>
 
 <script>
   
   setTimeout(() => {
     document.getElementById('verif').style.display = "none";
   }, 2500);
   
   
   </script>

  <?php
  }

}else{
  
?>
  <div id="verif" class="alert alert-danger" role="alert">
  <h5>La cedula ya se encuentra registrada.</h5>
 </div>
 
 <script>
   
   setTimeout(() => {
     document.getElementById('verif').style.display = "none";
   }, 2500);
   
   
   </script>
<?php 
} 
}
require_once 'validations/Formulario.php';
?>

<?php
  $formulario = new Formulario("", "formulario", "formulario");
  $formulario->setHeader("Registrate estimado cliente:");
  $formulario->setInput("text", "usuario", "Nombre de usuario", "Pedro Pérez");
  $formulario->setInput("number", "cedula", "Cedula", "25984693");
  $formulario->setInput("email", "correo", "Correo Electrónico", "pedro@gmail.com");
  $formulario->setInput("number", "telefono", "Telefono", "04165026859");
  $formulario->setInput("password", "password", "Contraseña", "********");
  $formulario->setInput("password", "password2", "Confirmar contraseña", "********");
  $formulario->setInput("text", "direccion", "Direccion", "La grita");
  $formulario->setButton("Enviar", "Formulario enviado exitosamente!");
  $formulario->setHtml(" <a href='logincliente.php' class='text-success'>Ir al Login</a>");
  $formulario->setFoot("@Since 2021");
  $formulario->getRender();
?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

<script src="validaciones.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>
</body>
</html>

