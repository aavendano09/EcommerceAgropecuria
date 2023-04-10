<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$sql = "SELECT tprod_idprod, tprod_descpr, tprod_prespr, tprod_precic, tprod_preciv, tprod_fechve, tprod_fechin, tprod_cantpr, tprod_fktipp 
FROM tprod_tme 
WHERE tprod_idprod=$id LIMIT 1";
$resultado = $conexion->query($sql);
$rows = $resultado->num_rows;

$producto = [];

if($rows > 0){

    $producto = $resultado->fetch_array();

}

echo json_encode($producto, JSON_UNESCAPED_UNICODE);

?>