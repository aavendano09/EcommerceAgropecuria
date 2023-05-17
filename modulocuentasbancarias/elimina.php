<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$sqlmonedas = "DELETE FROM tcuba_tme WHERE tcuba_idcuBa =$id";

if($conexion->query($sqlmonedas)){
}

header('Location: ../paneladmin.php?modulo=cuentasbancarias');

?>