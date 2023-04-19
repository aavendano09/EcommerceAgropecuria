<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$estado = $conexion->real_escape_string($_POST['estado']);

$sqlcategorias = "UPDATE tctpr_tme
SET tctpr_namect = '$nombre', tctpr_status = '$estado' WHERE tctpr_idcatg='$id'";

if($conexion->query($sqlcategorias)){
}

header('Location: ../paneladmin.php?modulo=categorias');

?>