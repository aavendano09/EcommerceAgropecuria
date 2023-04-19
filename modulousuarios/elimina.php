<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$sqlusuarios = "DELETE FROM tuser_tme WHERE tuser_iduser ='$id'";

if($conexion->query($sqlusuarios)){
}

header('Location: ../paneladmin.php?modulo=usuarios');

?>