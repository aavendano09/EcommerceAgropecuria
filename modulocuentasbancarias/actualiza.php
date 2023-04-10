<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$numero = $conexion->real_escape_string($_POST['numero']);
$identificacion = $conexion->real_escape_string($_POST['identificacion']);
$tipocuenta = $conexion->real_escape_string($_POST['tipocuenta']);

$sqlmonedas = "UPDATE tcuba_tme
SET tcuba_nameba = '$nombre', tcuba_Nocuba = '$numero', tcuba_identi = '$identificacion', tcuba_tpcuba = '$tipocuenta' WHERE tcuba_idcuBa='$id'";

if($conexion->query($sqlmonedas)){
}

header('Location: ../paneladmin.php?modulo=cuentasbancarias');

?>