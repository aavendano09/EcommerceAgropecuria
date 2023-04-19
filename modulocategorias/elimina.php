<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$sqlcategorias = "DELETE FROM tctpr_tme WHERE tctpr_idcatg ='$id'";

if($conexion->query($sqlcategorias)){
}

header('Location: ../paneladmin.php?modulo=categorias');

?>