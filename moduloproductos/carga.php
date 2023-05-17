<?php

require 'conexion.php';

$sql = $_REQUEST['sql'];

$consulta = $conexion->query($sql);

while ($respuesta = $consulta->fetch_assoc()) {
    $array[] = $respuesta;
}



echo json_encode($array);
