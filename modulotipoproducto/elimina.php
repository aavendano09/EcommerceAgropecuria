<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$query_delete = "UPDATE ttpro_tme SET ttpro_status = 0 WHERE ttpro_idtipp = $id";

if($conexion->query($query_delete)){
}

header('Location: ../paneladmin.php?modulo=tipoproducto');

?>