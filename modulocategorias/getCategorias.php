<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$sql = "SELECT tctpr_idcatg, tctpr_namect, tctpr_status FROM tctpr_tme WHERE tctpr_idcatg='$id' LIMIT 1";
$resultado = $conexion->query($sql);
$rows = $resultado->num_rows;

$categoria = [];

if($rows > 0){

    $categoria = $resultado->fetch_array();

}

echo json_encode($categoria, JSON_UNESCAPED_UNICODE);

?>