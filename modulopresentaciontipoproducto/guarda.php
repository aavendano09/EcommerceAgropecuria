<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$tipoproducto = $conexion->real_escape_string($_POST['tipoproducto']);
$presentacion = $conexion->real_escape_string($_POST['presentacion']);
$estado = $conexion->real_escape_string($_POST['estado']);




$sql = "SELECT * FROM tprp_tts WHERE tprp_idtprp = '$id'";

$request = $conexion->query($sql);

if (mysqli_num_rows($request) == 0) {



$sql = "SELECT * FROM tprp_tts WHERE tprp_fktpro = '$tipoproducto' AND tprp_fkpres = '$presentacion'";

$request = $conexion->query($sql);

    if (mysqli_num_rows($request) == 0) {

        
        $sql = "INSERT INTO tprp_tts (tprp_idtprp, tprp_fktpro, tprp_fkpres, tprp_status) 
        VALUES ('$id','$tipoproducto','$presentacion','$estado')";
        
        if($conexion->query($sql)){
            
        }
        
        header('Location: ../paneladmin.php?modulo=presentaciontipoproducto');
    }else{
        echo "<script>alert('Esta relacion presentacion y tipo producto ya se encuentra registrada, porfavor ingrese otra'); window.location.href = '../paneladmin.php?modulo=presentaciontipoproducto';</script>";
    
    }

}else{
    echo "<script>alert('El id de la presentacion y tipo producto ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=presentaciontipoproducto';</script>";
    
}






?>