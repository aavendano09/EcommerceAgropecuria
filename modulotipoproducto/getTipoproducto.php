<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$sql = "SELECT ttpro_idtipp, ttpro_nametp, ttpro_fkcat, ttpro_status FROM ttpro_tme WHERE ttpro_idtipp = '$id' LIMIT 1";

$resultado = $conexion->query($sql);
$rows = $resultado->num_rows;

$presentacion = [];

if($rows > 0){

    $presentacion = $resultado->fetch_array();

}

echo json_encode($presentacion, JSON_UNESCAPED_UNICODE);

?>