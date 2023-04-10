<?php
error_reporting(0);

include_once "conexion.php";
session_start();

//Eliminar Usuario Logicamente

$idusuario = $conexion->real_escape_string($_POST['id']);
    
    //query delete del usuario logicamente

    $query_delete = mysqli_query($conexion,"UPDATE tuser_tme SET tuser_status = 'inactivo' WHERE tuser_iduser = $idusuario");
    mysqli_close($conexion);

    if($conexion->query($sqlmedidas)){
    }
    
    header('Location: ../paneladmin.php?modulo=eliminausuarios');


exit;

?>