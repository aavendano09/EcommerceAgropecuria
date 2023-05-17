<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$sql = "SELECT tpre_idpres, tpre_despre, tpre_fkmedi, tpre_status FROM tpre_tts WHERE tpre_idpres = '$id' LIMIT 1";

$resultado = $conexion->query($sql);
$rows = $resultado->num_rows;

$presentacion = [];

if($rows > 0){

    $presentacion = $resultado->fetch_array();

}

echo json_encode($presentacion, JSON_UNESCAPED_UNICODE);

?>