<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$sql = "SELECT tclie_idclie, tclie_identc, tclie_namecl, tclie_telecl, tclie_emailc, tclie_cedrif  FROM tclic_tme WHERE tclie_idclie=$id LIMIT 1";
$resultado = $conexion->query($sql);
$rows = $resultado->num_rows;

$clientes = [];

if($rows > 0){

    $clientes = $resultado->fetch_array();

}

echo json_encode($clientes, JSON_UNESCAPED_UNICODE);

?>