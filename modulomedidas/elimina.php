<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$sqlmedidas = "DELETE FROM tmpro_tme WHERE tmpro_idmedi ='$id'";

if($conexion->query($sqlmedidas)){
}

header('Location: ../paneladmin.php?modulo=medidas');

?>