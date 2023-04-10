<?php

require_once('conexion.php');

$id = $conexion->real_escape_string($_POST['id']);

$sqlproveedores = "DELETE FROM tdprv_tme WHERE tprov_idprov =$id";

if($conexion->query($sqlproveedores)){
}

header('Location: ../paneladmin.php?modulo=proveedores');

?>