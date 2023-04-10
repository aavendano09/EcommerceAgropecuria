<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$sql = "SELECT tmone_idmone, tmone_namemo, tmone_status FROM tmone_tme WHERE tmone_idmone=$id LIMIT 1";
$resultado = $conexion->query($sql);
$rows = $resultado->num_rows;

$moneda = [];

if($rows > 0){

    $moneda = $resultado->fetch_array();

}

echo json_encode($moneda, JSON_UNESCAPED_UNICODE);

?>