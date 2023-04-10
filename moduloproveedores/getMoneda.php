<?php

require_once('conexion.php');

$id = $conexion->real_escape_string($_POST['id']);

$sql = "SELECT tprov_idprov, tprov_Rifpro, tprov_Razsoc, tprov_direpr, tprov_telepr, tprov_emailp, tprov_status, tprov_tiprif FROM tdprv_tme WHERE tprov_idprov=$id LIMIT 1";
$resultado = $conexion->query($sql);
$rows = $resultado->num_rows;

$clientes = [];

if($rows > 0){

    $clientes = $resultado->fetch_array();

}

echo json_encode($clientes, JSON_UNESCAPED_UNICODE);

?>