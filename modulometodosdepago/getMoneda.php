<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$sql = "SELECT tmpag_idmetd, tmpag_namemt, tmpag_status FROM tmpag_tme WHERE tmpag_idmetd=$id LIMIT 1";
$resultado = $conexion->query($sql);
$rows = $resultado->num_rows;

$moneda = [];

if($rows > 0){

    $moneda = $resultado->fetch_array();

}

echo json_encode($moneda, JSON_UNESCAPED_UNICODE);

?>