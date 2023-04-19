<?php

include_once "conexion.php";

$id = $conexion->real_escape_string($_POST['id']);

$sql = "SELECT `tuser_iduser`, `tuser_userna`, `tuser_emailu`, `tuser_passus`, `tuser_fktipu`, `tuser_status`, `tuser_direus` 
FROM `tuser_tme`  
WHERE tuser_iduser='$id' LIMIT 1";
$resultado = $conexion->query($sql);
$rows = $resultado->num_rows;

$usuarios = [];

if($rows > 0){

    $usuarios = $resultado->fetch_array();

}

echo json_encode($usuarios, JSON_UNESCAPED_UNICODE);

?>