<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$tipoproducto = $conexion->real_escape_string($_POST['tipoproducto']);
$presentacion = $conexion->real_escape_string($_POST['presentacion']);
$estado = $conexion->real_escape_string($_POST['estado']);


$sql = "SELECT tprp_fktpro, tprp_fkpres FROM tprp_tts WHERE tprp_idtprp = '$id'";

$request = $conexion->query($sql);

$array = $request->fetch_assoc();

if ($array['tprp_fktpro'] == $tipoproducto && $array['tprp_fkpres'] == $presentacion) {
    
    $sql = "UPDATE tprp_tts SET tprp_status = '$estado' WHERE tprp_idtprp='$id'";


    if($conexion->query($sql)){
    
    }
    header('Location: ../paneladmin.php?modulo=presentaciontipoproducto');
}else{
    
    $sql = "SELECT * FROM tprp_tts WHERE tprp_fktpro = '$tipoproducto' AND tprp_fkpres = '$presentacion'";

    $request = $conexion->query($sql);

    if (mysqli_num_rows($request) == 0) {

        $sql = "UPDATE tprp_tts SET tprp_fktpro = '$tipoproducto', tprp_fkpres = '$presentacion', tprp_status = '$estado' WHERE tprp_idtprp='$id'";


        if($conexion->query($sql)){
        
        }
        header('Location: ../paneladmin.php?modulo=presentaciontipoproducto');

    }else{
        echo "<script>alert('Esta relacion presentacion y tipo producto ya se encuentra registrada, porfavor ingrese otra'); window.location.href = '../paneladmin.php?modulo=presentaciontipoproducto';</script>";
    
    }
}



?>