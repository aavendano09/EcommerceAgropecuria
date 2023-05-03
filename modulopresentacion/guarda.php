<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$descripcion = $conexion->real_escape_string($_POST['descripcion']);
$medida = $conexion->real_escape_string($_POST['tipoproducto']);
$estado = $conexion->real_escape_string($_POST['estado']);




$sql = "SELECT tpre_idpres FROM tpre_tts WHERE tpre_idpres = '$id'";

$request = $conexion->query($sql);

if (mysqli_num_rows($request) == 0) {

    $sql = "INSERT INTO tpre_tts (tpre_idpres, tpre_despre, tpre_fkmedi, tpre_status) 
    VALUES ('$id','$descripcion','$medida','$estado')";
    
    if($conexion->query($sql)){
    
    }
    
    header('Location: ../paneladmin.php?modulo=presentacion');

}else{
    echo "<script>alert('El id de la presentacion ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=presentacion;</script>";
    
}






?>