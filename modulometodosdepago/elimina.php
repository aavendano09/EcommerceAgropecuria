<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$sqlmonedas = "DELETE FROM tmpag_tme WHERE tmpag_idmetd =$id";

if($conexion->query($sqlmonedas)){
}

header('Location: ../paneladmin.php?modulo=metodosdepago');

?>