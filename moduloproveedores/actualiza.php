<?php

require_once('conexion.php');

$id = $conexion->real_escape_string($_POST['id']);
$tiprif = $conexion->real_escape_string($_POST['tiprif']);
$rif = $conexion->real_escape_string($_POST['rif']);
$tiprifOld = $conexion->real_escape_string($_POST['tiprifOld']);
$rifOld = $conexion->real_escape_string($_POST['rifOld']);
$razon = $conexion->real_escape_string($_POST['razon']);
$direccion = $conexion->real_escape_string($_POST['direccion']);
$telefono = $conexion->real_escape_string($_POST['telefono']);
$correo = $conexion->real_escape_string($_POST['correo']);
$correoOld = $conexion->real_escape_string($_POST['correoOld']);
$estado = $conexion->real_escape_string($_POST['estado']);

$fullRif = $tiprif.$rif;
$fullRifOld = $tiprifOld.$rifOld;

if($fullRif == $fullRifOld){
    if ($correoOld == $correo) {

        $sqlproveedor = "UPDATE tdprv_tme
        SET  tprov_Rifpro = '$rif', tprov_Razsoc = '$razon', tprov_direpr = '$direccion', tprov_telepr = '$telefono', tprov_emailp = '$correo', tprov_status = '$estado' WHERE tprov_idprov='$id'";

        if($conexion->query($sqlproveedor)){
        }

        header('Location: ../paneladmin.php?modulo=proveedores');

    } else {
        $sqlemailProv = "SELECT tprov_emailp FROM tdprv_tme WHERE tprov_emailp = '$correo'";

        $request = $conexion->query($sqlemailProv);
    
        if(mysqli_num_rows($request) == 0){

            $sqlproveedor = "UPDATE tdprv_tme
            SET  tprov_Rifpro = '$rif', tprov_Razsoc = '$razon', tprov_direpr = '$direccion', tprov_telepr = '$telefono', tprov_emailp = '$correo', tprov_status = '$estado' WHERE tprov_idprov='$id'";
            
            if($conexion->query($sqlproveedor)){
            }
            
            header('Location: ../paneladmin.php?modulo=proveedores');

        } else {
            echo "<script>alert('El correo electronico ingresado ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=proveedores';</script>";
    
        }
    }

}else {

    if ($correoOld == $correo) {

        $sqlrifProv= "SELECT tprov_Rifpro FROM tdprv_tme WHERE tprov_Rifpro = '$rif' AND tprov_tiprif = '$tiprif'";

        $request = $conexion->query($sqlrifProv);
    
        if(mysqli_num_rows($request) == 0){
            
            $sqlproveedor = "UPDATE tdprv_tme
            SET  tprov_Rifpro = '$rif', tprov_Razsoc = '$razon', tprov_direpr = '$direccion', tprov_telepr = '$telefono', tprov_emailp = '$correo', tprov_status = '$estado', tprov_tiprif = '$tiprif' WHERE tprov_idprov='$id'";
            
            if($conexion->query($sqlproveedor)){
            }
            
            header('Location: ../paneladmin.php?modulo=proveedores');
        
        } else {
            echo "<script>alert('El RIF ingresado ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=proveedores';</script>";

        }

        

    } else {

        $sqlrifProv = "SELECT tprov_Rifpro FROM tdprv_tme WHERE tprov_Rifpro = '$rif' AND tprov_tiprif = '$tiprif'";

        $request = $conexion->query($sqlrifProv);
    
        if(mysqli_num_rows($request) == 0){

            $sqlemailProv = "SELECT tprov_emailp FROM tdprv_tme WHERE tprov_emailp = '$correo'";

            $request = $conexion->query($sqlemailProv);
        
            if(mysqli_num_rows($request) == 0){

                $sqlproveedor = "UPDATE tdprv_tme
                SET  tprov_Rifpro = '$rif', tprov_Razsoc = '$razon', tprov_direpr = '$direccion', tprov_telepr = '$telefono', tprov_emailp = '$correo', tprov_status = '$estado', tprov_tiprif = '$tiprif' WHERE tprov_idprov='$id'";

                if($conexion->query($sqlproveedor)){
                }

                header('Location: ../paneladmin.php?modulo=proveedores');


            } else {
                echo "<script>alert('El correo electronico ingresado ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=proveedores';</script>";
        
            }

        } else {
            echo "<script>alert('La rif ingresada ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=proveedores';</script>";

        }

        
    }
    
}







?>