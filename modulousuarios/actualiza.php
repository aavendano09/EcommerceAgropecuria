<?php

require 'conexion.php';

$idUsuario=mysqli_real_escape_string($conexion, $_REQUEST['id']);
$username=mysqli_real_escape_string($conexion, $_REQUEST['username']);
$email=mysqli_real_escape_string($conexion, $_REQUEST['email']);
$password=mysqli_real_escape_string($conexion, $_REQUEST['password']);
$tipousuario=mysqli_real_escape_string($conexion, $_REQUEST['tipousuario']);
$estado=mysqli_real_escape_string($conexion, $_REQUEST['estado']);
$fechaingreso=mysqli_real_escape_string($conexion, $_REQUEST['fechaingreso']);
$domicilio=mysqli_real_escape_string($conexion, $_REQUEST['domicilio']);
$oldEmail=mysqli_real_escape_string($conexion, $_REQUEST['emailOld']);



if($oldEmail == $email){
    
    $sqlusuarios = "UPDATE tuser_tme SET
        tuser_iduser='" . $idUsuario . "',tuser_userna='" . $username . "',tuser_emailu='" . $email . "',tuser_passus='" . $password . "',tuser_fktipu='" . $tipousuario . "',tuser_status='" . $estado . "',tuser_fechin='" . $fechaingreso . "',tuser_direus='" . $domicilio . "'
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
        tuser_iduser='" . $idUsuario . "',tuser_userna='" . $username . "',tuser_emailu='" . $email . "',tuser_passus='" . $password . "',tuser_fktipu='" . $tipousuario . "',tuser_status='" . $estado . "',tuser_fechin='" . $fechaingreso . "',tuser_direus='" . $domicilio . "'
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