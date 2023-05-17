<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$query_delete = "UPDATE tctpr_tme SET tctpr_status = 0 WHERE tctpr_idcatg = $id";

if($conexion->query($query_delete)){
}

header('Location: ../paneladmin.php?modulo=categorias');

?>