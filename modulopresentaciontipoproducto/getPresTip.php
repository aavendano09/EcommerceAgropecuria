<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$sql = "SELECT tprp_idtprp, tprp_fktpro, tprp_fkpres, tprp_status FROM tprp_tts WHERE tprp_idtprp = '$id' LIMIT 1";

$resultado = $conexion->query($sql);
$rows = $resultado->num_rows;

$presentacionTip = [];

if($rows > 0){

    $presentacionTip = $resultado->fetch_array();

}

echo json_encode($presentacionTip, JSON_UNESCAPED_UNICODE);

?>