<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$estado = $conexion->real_escape_string($_POST['estado']);


$sqlIdMpago = "SELECT tmpag_idmetd FROM tmpag_tme WHERE tmpag_idmetd = '$id'";

$request = $conexion->query($sqlIdMpago);

if (mysqli_num_rows($request) == 0) {

    $sqlmonedas = "INSERT INTO tmpag_tme (tmpag_idmetd, tmpag_namemt, tmpag_status) 
    VALUES ('$id','$nombre','$estado')";

    if($conexion->query($sqlmonedas)){

    }

    header('Location: ../paneladmin.php?modulo=metodosdepago');

} else {

    echo "<script>alert('El id de la moneda ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=metodosdepago';</script>";
    
}



?>