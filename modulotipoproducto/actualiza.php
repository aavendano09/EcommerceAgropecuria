<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$descripcion = $conexion->real_escape_string($_POST['descripcion']);
$categoria = $conexion->real_escape_string($_POST['tipoproducto']);
$estado = $conexion->real_escape_string($_POST['estado']);


$sql = "UPDATE ttpro_tme SET ttpro_nametp = '$descripcion',ttpro_fkcat = '$categoria', ttpro_status = '$estado' WHERE ttpro_idtipp='$id'";


if($conexion->query($sql)){

}
    
header('Location: ../paneladmin.php?modulo=tipoproducto');


?>