<?php
error_reporting(0);

include_once "conexion.php";
session_start();

//Eliminar Usuario Logicamente

$idusuario = $conexion->real_escape_string($_POST['id']);
    
    //query delete del usuario logicamente

    $sqldelete= "UPDATE tuser_tme SET tuser_status = '0' WHERE tuser_iduser = $idusuario";

    if($conexion->query($sqldelete)){
    }
    
    header('Location: ../paneladmin.php?modulo=eliminausuarios');


?>