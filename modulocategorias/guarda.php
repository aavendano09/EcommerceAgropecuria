<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$estado = $conexion->real_escape_string($_POST['estado']);

$sqlcategorias = "INSERT INTO tctpr_tme (tctpr_idcatg, tctpr_namect, tctpr_status) 
VALUES ('$id','$nombre','$estado')";

if($conexion->query($sqlcategorias)){

}

header('Location: ../paneladmin.php?modulo=categorias');

?>