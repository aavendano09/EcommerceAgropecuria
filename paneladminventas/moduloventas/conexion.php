<?php
// conectando a base de datos de forma en PROGRAMACION ORIENTADA A OBJETOS

$conexion= new mysqli("localhost","root","","ecommerce_agropecuaria");

if($conexion->connect_errno){

  echo "fallo la conexion a la base de datos" . $conexion->connect_errno;
}

$conexion->set_charset ("utf8");

?>