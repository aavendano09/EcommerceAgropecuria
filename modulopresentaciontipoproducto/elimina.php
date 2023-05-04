<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$query_delete = "UPDATE tprp_tts SET tprp_status = 0 WHERE tprp_idtprp = $id";

if($conexion->query($query_delete)){
}

header('Location: ../paneladmin.php?modulo=presentaciontipoproducto');

?>