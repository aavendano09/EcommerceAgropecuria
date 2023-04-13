<?php
// conectando a base de datos de forma en PROGRAMACION ORIENTADA A OBJETOS


include_once('C:\xampp\htdocs\EcommerceAgropecuaria\config.php');

$conexion= new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if($conexion->connect_errno){

  echo "fallo la conexion a la base de datos" . $conexion->connect_errno;
}

$conexion->set_charset ("utf8");

?>