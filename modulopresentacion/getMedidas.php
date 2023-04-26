<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$sql = "SELECT tmpro_idmedi, tmpro_descmd, tmpro_status FROM tmpro_tme WHERE tmpro_idmedi='$id' LIMIT 1";
$resultado = $conexion->query($sql);
$rows = $resultado->num_rows;

$medida = [];

if($rows > 0){

    $medida = $resultado->fetch_array();

}

echo json_encode($medida, JSON_UNESCAPED_UNICODE);

?>