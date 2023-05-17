<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$sqlmonedas = "DELETE FROM tclic_tme WHERE tclie_idclie =$id";

if($conexion->query($sqlmonedas)){
}

header('Location: ../paneladmin.php?modulo=clientes');

?>