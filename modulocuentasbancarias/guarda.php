<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$numero = $conexion->real_escape_string($_POST['numero']);
$identificacion = $conexion->real_escape_string($_POST['identificacion']);
$tipocuenta = $conexion->real_escape_string($_POST['tipocuenta']);


$sqlmonedas = "INSERT INTO tcuba_tme (tcuba_idcuBa, tcuba_nameba, tcuba_Nocuba, tcuba_identi, tcuba_tpcuba) 
VALUES ('$id','$nombre','$numero','$identificacion','$tipocuenta')";

if($conexion->query($sqlmonedas)){

}

header('Location: ../paneladmin.php?modulo=cuentasbancarias');

?>