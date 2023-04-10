<?php

require_once('conexion.php');

$id = $conexion->real_escape_string($_POST['id']);
$identificacion = $conexion->real_escape_string($_POST['rif']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$direccion = $conexion->real_escape_string($_POST['direccion']);
$telefono = $conexion->real_escape_string($_POST['telefono']);
$correo = $conexion->real_escape_string($_POST['correo']);
$estado = $conexion->real_escape_string($_POST['estado']);


$sqlproveedor = "UPDATE tdprv_tme
SET  tprov_Rifpro = '$identificacion', tprov_Razsoc = '$nombre', tprov_direpr = '$direccion', tprov_telepr = '$telefono', tprov_emailp = '$correo', tprov_status = '$estado' WHERE tprov_idprov='$id'";

if($conexion->query($sqlproveedor)){
}

header('Location: ../paneladmin.php?modulo=proveedores');

?>