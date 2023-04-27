<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$query_delete = "UPDATE tmpro_tme SET tmpro_status = 0 WHERE tmpro_idmedi = $id";

if($conexion->query($query_delete)){
}

header('Location: ../paneladmin.php?modulo=medidas');

?>