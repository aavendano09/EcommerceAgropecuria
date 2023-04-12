<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$identificacion = $conexion->real_escape_string($_POST['identificacion']);
$identificacionOld = $conexion->real_escape_string($_POST['ediidentificacionHide']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$telefono = $conexion->real_escape_string($_POST['telefono']);
$correo = $conexion->real_escape_string($_POST['correo']);
$correoOld = $conexion->real_escape_string($_POST['correoHide']);







if($identificacionOld == $identificacion){
    if ($correoOld == $correo) {

        $sqlmonedas = "UPDATE tclic_tme
        SET tclie_identc = '$identificacion', tclie_namecl = '$nombre', tclie_telecl = '$telefono', tclie_emailc = '$correo' WHERE tclie_idclie='$id'";

        if($conexion->query($sqlmonedas)){
        }

        header('Location: ../paneladmin.php?modulo=clientes');

    } else {
        $sqlemailCliente = "SELECT tclie_emailc FROM tclic_tme WHERE tclie_emailc = '$correo'";

        $request = $conexion->query($sqlemailCliente);
    
        if(mysqli_num_rows($request) == 0){

            $sqlmonedas = "UPDATE tclic_tme
            SET tclie_identc = '$identificacion', tclie_namecl = '$nombre', tclie_telecl = '$telefono', tclie_emailc = '$correo' WHERE tclie_idclie='$id'";
    
            if($conexion->query($sqlmonedas)){
            }

            
    
           header('Location: ../paneladmin.php?modulo=clientes');

        } else {
           echo "<script>alert('El correo electronico ingresado ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=clientes';</script>";
           
        }
    }

}else {

    if ($correoOld == $correo) {

        $sqlidenCliente = "SELECT tclie_identc FROM tclic_tme WHERE tclie_identc = '$identificacion'";

        $request = $conexion->query($sqlidenCliente);
    
        if(mysqli_num_rows($request) == 0){
            
            $sqlmonedas = "UPDATE tclic_tme
            SET tclie_identc = '$identificacion', tclie_namecl = '$nombre', tclie_telecl = '$telefono', tclie_emailc = '$correo' WHERE tclie_idclie='$id'";

            if($conexion->query($sqlmonedas)){
            }

            header('Location: ../paneladmin.php?modulo=clientes');
        
        } else {
            echo "<script>alert('La identificacion ingresada ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=clientes';</script>";

        }

        

    } else {

        $sqlidenCliente = "SELECT tclie_identc FROM tclic_tme WHERE tclie_identc = '$identificacion'";

        $request = $conexion->query($sqlidenCliente);
    
        if(mysqli_num_rows($request) == 0){

            $sqlemailCliente = "SELECT tclie_emailc FROM tclic_tme WHERE tclie_emailc = '$correo'";

            $request = $conexion->query($sqlemailCliente);
        
            if(mysqli_num_rows($request) == 0){

                $sqlmonedas = "UPDATE tclic_tme
                SET tclie_identc = '$identificacion', tclie_namecl = '$nombre', tclie_telecl = '$telefono', tclie_emailc = '$correo' WHERE tclie_idclie='$id'";
        
                if($conexion->query($sqlmonedas)){
                }

               header('Location: ../paneladmin.php?modulo=clientes');

            } else {
              echo "<script>alert('El correo electronico ingresado ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=clientes';</script>";

            }

        } else {
           echo "<script>alert('La identificacion ingresada ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=clientes';</script>";

        }

        
    }
    
}










?>