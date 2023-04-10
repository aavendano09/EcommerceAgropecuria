<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$descripcion = $conexion->real_escape_string($_POST['descripcion']);
$presentacion = $conexion->real_escape_string($_POST['presentacion']);
$tprod_precic = $conexion->real_escape_string($_POST['preciocosto']);
$tprod_preciv = $conexion->real_escape_string($_POST['precioventa']);
$fechavencimiento = $conexion->real_escape_string($_POST['fechavencimiento']);
$fechaingreso = $conexion->real_escape_string($_POST['fechaingreso']);
$cantidad = $conexion->real_escape_string($_POST['cantidad']);
$tipoproducto=mysqli_real_escape_string($conexion, $_REQUEST['tipoproducto']);

$sqlproducto = "UPDATE tprod_tme 
SET tprod_fotopr = '$imagen', tprod_descpr = '$descripcion', tprod_prespr = '$presentacion', tprod_precic = '$tprod_precic', tprod_preciv = '$tprod_preciv', tprod_fechve = '$fechavencimiento', tprod_fechin = '$fechaingreso', tprod_cantpr = '$cantidad', tprod_fktipp = '$tipoproducto'
WHERE tprod_idprod='$id'";

if($conexion->query($sqlproducto)){
}

header('Location: ../paneladmin.php?modulo=productos');

?>