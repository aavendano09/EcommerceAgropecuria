<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$query_delete = "UPDATE tpre_tts SET tpre_status = 0 WHERE tpre_idpres = $id";

if($conexion->query($query_delete)){
}

header('Location: ../paneladmin.php?modulo=presentacion');

?>