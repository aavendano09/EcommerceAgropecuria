<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$nombre = $conexion->real_escape_string($_POST['nombre']);
$descripcion = $conexion->real_escape_string($_POST['descripcion']);
$presentacion = $conexion->real_escape_string($_POST['presentacion']);
$tprod_precic = $conexion->real_escape_string($_POST['preciocosto']);
$tprod_preciv = $conexion->real_escape_string($_POST['precioventa']);
$fechavencimiento = $conexion->real_escape_string($_POST['fechavencimiento']);
$fechaingreso = $conexion->real_escape_string($_POST['fechaingreso']);
$cantidad = $conexion->real_escape_string($_POST['cantidad']);
$tipoproducto=mysqli_real_escape_string($conexion, $_REQUEST['tipoproducto']);

$sqlproductos = "INSERT INTO `tprod_tme` (`tprod_idprod`, `tprod_fotopr`, `tprod_namepr`, `tprod_descpr`, `tprod_prespr`, `tprod_precic`, `tprod_preciv`, `tprod_fechin`, `tprod_fechve`, `tprod_cantpr`, `tprod_fktipp`) 
VALUES ('$id','$imagen','$nombre','$descripcion','$presentacion','$tprod_precic','$tprod_preciv','$fechaingreso','$fechavencimiento','$cantidad','$tipoproducto')";

if($conexion->query($sqlproductos)){

}

header('Location: ../paneladmin.php?modulo=productos');

?>