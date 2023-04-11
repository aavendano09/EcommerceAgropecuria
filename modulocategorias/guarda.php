<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$estado = $conexion->real_escape_string($_POST['estado']);



$sqlcat = "SELECT tctpr_idcatg FROM tctpr_tme WHERE tctpr_idcatg = '$id'";

$request = $conexion->query($sqlcat);

if (mysqli_num_rows($request) == 0) {

    $sqlcategorias = "INSERT INTO tctpr_tme (tctpr_idcatg, tctpr_namect, tctpr_status) 
    VALUES ('$id','$nombre','$estado')";

    if($conexion->query($sqlcategorias)){

    }

    header('Location: ../paneladmin.php?modulo=categorias');

}else{
    echo "<script>alert('El id de la categoria ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=categorias';</script>";
}







?>