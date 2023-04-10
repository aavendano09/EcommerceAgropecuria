<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$descripcion = $conexion->real_escape_string($_POST['descripcion']);
$estado = $conexion->real_escape_string($_POST['estado']);

$sqlmedidas = "INSERT INTO tmpro_tme (tmpro_idmedi, tmpro_descmd, tmpro_status) 
VALUES ('$id','$descripcion','$estado')";

if($conexion->query($sqlmedidas)){

}

header('Location: ../paneladmin.php?modulo=medidas');

?>