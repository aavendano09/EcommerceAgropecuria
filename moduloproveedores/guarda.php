<?php

require_once('conexion.php');

$id = $conexion->real_escape_string($_POST['id']);
$identificacion = $conexion->real_escape_string($_POST['rif']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$direccion = $conexion->real_escape_string($_POST['direccion']);
$telefono = $conexion->real_escape_string($_POST['telefono']);
$correo = $conexion->real_escape_string($_POST['correo']);
$estado = $conexion->real_escape_string($_POST['estado']);


$sqlproveedores = "INSERT INTO tdprv_tme (tprov_idprov, tprov_Rifpro, tprov_Razsoc, tprov_direpr, tprov_telepr, tprov_emailp, tprov_status) 
VALUES ('$id','$identificacion','$nombre','$direccion','$telefono','$correo','$estado')";

if($conexion->query($sqlproveedores)){

}

header('Location: ../paneladmin.php?modulo=proveedores');

?>

