<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$descripcion = $conexion->real_escape_string($_POST['descripcion']);
$medida = $conexion->real_escape_string($_POST['tipoproducto']);
$estado = $conexion->real_escape_string($_POST['estado']);

$sqlmedidas = "UPDATE tpre_tts
SET tpre_despre = '$descripcion', tpre_fkmedi = '$medida', tpre_status = '$estado' WHERE tpre_idpres='$id'";

if($conexion->query($sqlmedidas)){
}

header('Location: ../paneladmin.php?modulo=presentacion');

?>