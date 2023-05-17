<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$estado = $conexion->real_escape_string($_POST['estado']);

$sqlmonedas = "UPDATE tmpag_tme 
SET tmpag_namemt = '$nombre', tmpag_status = '$estado' WHERE tmpag_idmetd='$id'";

if($conexion->query($sqlmonedas)){
}

header('Location: ../paneladmin.php?modulo=metodosdepago');

?>