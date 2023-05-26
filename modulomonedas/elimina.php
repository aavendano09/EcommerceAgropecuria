<?php

require '../conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$sqlmonedas = "DELETE FROM tmone_tme WHERE tmone_idmone =$id";

if($conexion->query($sqlmonedas)){
}

header('Location: ../paneladmin.php?modulo=monedas');

?>