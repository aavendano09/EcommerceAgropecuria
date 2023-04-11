<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$descripcion = $conexion->real_escape_string($_POST['descripcion']);
$estado = $conexion->real_escape_string($_POST['estado']);




$sqlIdMoneda = "SELECT tmpro_idmedi FROM tmpro_tme WHERE tmpro_idmedi = '$id'";

$request = $conexion->query($sqlIdMoneda);

if (mysqli_num_rows($request) == 0) {

    $sqlmedidas = "INSERT INTO tmpro_tme (tmpro_idmedi, tmpro_descmd, tmpro_status) 
    VALUES ('$id','$descripcion','$estado')";
    
    if($conexion->query($sqlmedidas)){
    
    }
    
    header('Location: ../paneladmin.php?modulo=medidas');

}else{
    echo "<script>alert('El id de la medida ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=medidas';</script>";
    
}






?>