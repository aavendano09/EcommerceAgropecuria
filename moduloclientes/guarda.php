<?php

require 'conexion.php';


$id = $conexion->real_escape_string($_POST['id']);
$identificacion = $conexion->real_escape_string($_POST['identificacion']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$telefono = $conexion->real_escape_string($_POST['telefono']);
$correo = $conexion->real_escape_string($_POST['correo']);


$sqlmonedas = "INSERT INTO tclic_tme (tclie_idclie, tclie_identc, tclie_namecl, tclie_telecl, tclie_emailc) 
VALUES ('$id','$identificacion','$nombre','$telefono','$correo')";

echo $sqlmonedas;

if($conexion->query($sqlmonedas)){
    
}

echo "hola";

header('Location: ../paneladmin.php?modulo=clientes');

?>

