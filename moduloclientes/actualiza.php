<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$identificacion = $conexion->real_escape_string($_POST['identificacion']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$telefono = $conexion->real_escape_string($_POST['telefono']);
$correo = $conexion->real_escape_string($_POST['correo']);

$sqlmonedas = "UPDATE tclic_tme
SET tclie_identc = '$identificacion', tclie_namecl = '$nombre', tclie_telecl = '$telefono', tclie_emailc = '$correo' WHERE tclie_idclie='$id'";

if($conexion->query($sqlmonedas)){
}

header('Location: ../paneladmin.php?modulo=clientes');

?>