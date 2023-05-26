<?php

require '../conexion.php';

$idUsuario=mysqli_real_escape_string($conexion, $_REQUEST['id']);
$username=mysqli_real_escape_string($conexion, $_REQUEST['usuario']);
$email=mysqli_real_escape_string($conexion, $_REQUEST['correo']);
$password=mysqli_real_escape_string($conexion, $_REQUEST['password']);
$tipousuario=mysqli_real_escape_string($conexion, $_REQUEST['tipousuario']);
$estado=mysqli_real_escape_string($conexion, $_REQUEST['estado']);
$domicilio=mysqli_real_escape_string($conexion, $_REQUEST['direccion']);

$fecha_actual = date("Y-m-d");

$sqlidusuario = "SELECT tuser_iduser FROM tuser_tme WHERE tuser_iduser = '$idUsuario'";

$request = $conexion->query($sqlidusuario);

if(mysqli_num_rows($request) == 0){

    $sqlemailusuario = "SELECT tuser_emailu FROM tuser_tme WHERE tuser_emailu = '$email'";

    $request = $conexion->query($sqlemailusuario);

    if(mysqli_num_rows($request) == 0){
        $sqlcategorias = "INSERT INTO `tuser_tme` (`tuser_iduser`, `tuser_userna`, `tuser_emailu`, `tuser_passus`, `tuser_fktipu`, `tuser_status`, `tuser_fechin`, `tuser_direus`) 
        VALUES ('".$idUsuario."','".$username."','".$email."','".$password."','".$tipousuario."','".$estado."','".$fecha_actual."','".$domicilio."');
        ";

        if($conexion->query($sqlcategorias)){

        }

        header('Location: ../paneladmin.php?modulo=usuarios');
    }else{
        echo "<script>alert('El email ingresado ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=usuarios';</script>";
    }
    
} else {
    echo "<script>alert('Ya existe este id de usuario, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=usuarios';</script>";
}





?>