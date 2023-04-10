<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$sql = "SELECT tcuba_idcuBa, tcuba_nameba, tcuba_Nocuba, tcuba_identi, tcuba_tpcuba, tcuba_rifba  FROM tcuba_tme WHERE tcuba_idcuBa=$id LIMIT 1";
$resultado = $conexion->query($sql);
$rows = $resultado->num_rows;

$monedas = [];

if($rows > 0){

    $monedas = $resultado->fetch_array();

}

echo json_encode($monedas, JSON_UNESCAPED_UNICODE);

?>