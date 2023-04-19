<?php

require 'conexion.php';

var_dump($_POST);

$idUsuario=mysqli_real_escape_string($conexion, $_POST['id']);
$username=mysqli_real_escape_string($conexion, $_REQUEST['usuario']);
$email=mysqli_real_escape_string($conexion, $_REQUEST['correo']);
$password=mysqli_real_escape_string($conexion, $_REQUEST['password']);
$tipousuario=mysqli_real_escape_string($conexion, $_REQUEST['tipousuario']);
$estado=mysqli_real_escape_string($conexion, $_REQUEST['estado']);
$domicilio=mysqli_real_escape_string($conexion, $_REQUEST['direccion']);
$oldEmail=mysqli_real_escape_string($conexion, $_REQUEST['correoOld']);



if($oldEmail == $email){
    
    $sqlusuarios = "UPDATE tuser_tme SET
        tuser_iduser='" . $idUsuario . "',tuser_userna='" . $username . "',tuser_emailu='" . $email . "',tuser_passus='" . $password . "',tuser_fktipu='" . $tipousuario . "',tuser_status='" . $estado . "',tuser_direus='" . $domicilio . "'
        where tuser_iduser='$idUsuario';
        ";

        if($conexion->query($sqlusuarios)){
        }

        header('Location: ../paneladmin.php?modulo=usuarios');

} else {

    $sqlemailusuario = "SELECT tuser_emailu FROM tuser_tme WHERE tuser_emailu = '$email'";

    $request2 = $conexion->query($sqlemailusuario);

    if(mysqli_num_rows($request2) == 0){
        $sqlusuarios = "UPDATE tuser_tme SET
        tuser_iduser='" . $idUsuario . "',tuser_userna='" . $username . "',tuser_emailu='" . $email . "',tuser_passus='" . $password . "',tuser_fktipu='" . $tipousuario . "',tuser_status='" . $estado ."',tuser_direus='" . $domicilio . "'
        where tuser_iduser='$idUsuario';
        ";

        if($conexion->query($sqlusuarios)){
        }

        header('Location: ../paneladmin.php?modulo=usuarios');

    }else{
        echo "<script>alert('El email ingresado ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=usuarios';</script>";
    }
}

    


?>