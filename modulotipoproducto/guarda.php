<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$descripcion = $conexion->real_escape_string($_POST['descripcion']);
$categoria = $conexion->real_escape_string($_POST['tipoproducto']);
$estado = $conexion->real_escape_string($_POST['estado']);




$sql = "SELECT ttpro_nametp FROM ttpro_tme WHERE ttpro_idtipp = '$id'";

$request = $conexion->query($sql);

if (mysqli_num_rows($request) == 0) {

    $sqlmedidas = "INSERT INTO ttpro_tme (ttpro_idtipp, ttpro_nametp, ttpro_fkcat, ttpro_status) 
    VALUES ('$id','$descripcion','$categoria','$estado')";
    
    if($conexion->query($sqlmedidas)){
    
    }
    
    header('Location: ../paneladmin.php?modulo=tipoproducto');

}else{
    echo "<script>alert('El id del tipo producto ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=tipoproducto';</script>";
    
}






?>