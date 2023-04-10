<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$descripcion = $conexion->real_escape_string($_POST['descripcion']);
$estado = $conexion->real_escape_string($_POST['estado']);

$sqlmedidas = "UPDATE tmpro_tme
SET tmpro_descmd = '$descripcion', tmpro_status = '$estado' WHERE tmpro_idmedi='$id'";

if($conexion->query($sqlmedidas)){
}

header('Location: ../paneladmin.php?modulo=medidas');

?>