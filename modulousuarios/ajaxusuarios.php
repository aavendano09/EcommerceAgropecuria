<?php


include_once "conexion.php";
session_start();

//Eliminar Usuario Logicamente

$idusuario = $conexion->real_escape_string($_POST['id']);
    
    //query delete del usuario logicamente

if ($idusuario != '1') {

    $sqldelete= "UPDATE tuser_tme SET tuser_status = '0' WHERE tuser_iduser = $idusuario";

    if($conexion->query($sqldelete)){
    }
    
    header('Location: ../paneladmin.php?modulo=eliminausuarios');

}else{
    echo "<script>alert('No se puede eliminar este usuario'); window.location.href = '../paneladmin.php?modulo=eliminausuarios';</script>";
    
}

    


?>