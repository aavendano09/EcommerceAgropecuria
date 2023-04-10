<?php

require_once('conexion.php');

$id = $conexion->real_escape_string($_POST['id']);
$identificacion = $conexion->real_escape_string($_POST['rif']);
$tiprif = $conexion->real_escape_string($_POST['tiprif']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$direccion = $conexion->real_escape_string($_POST['direccion']);
$telefono = $conexion->real_escape_string($_POST['telefono']);
$correo = $conexion->real_escape_string($_POST['correo']);
$estado = $conexion->real_escape_string($_POST['estado']);








$sqlidProv = "SELECT tprov_idprov FROM tdprv_tme WHERE tprov_idprov = '$id'";

$request = $conexion->query($sqlidProv);

if(mysqli_num_rows($request) == 0){

    $sqlRifProv = "SELECT tprov_Rifpro FROM tdprv_tme WHERE tprov_Rifpro = '$identificacion'";

    $request = $conexion->query($sqlRifProv);

    if(mysqli_num_rows($request) == 0){
    
        $sqlCorreo= "SELECT tprov_emailp FROM tdprv_tme WHERE tprov_emailp = '$correo'";

        $request = $conexion->query($sqlCorreo);
    
        if(mysqli_num_rows($request) == 0){
            
            $sqlproveedores = "INSERT INTO tdprv_tme (tprov_idprov, tprov_Rifpro, tprov_Razsoc, tprov_direpr, tprov_telepr, tprov_emailp, tprov_status, tprov_tiprif) 
            VALUES ('$id','$identificacion','$nombre','$direccion','$telefono','$correo','$estado','$tiprif')";

            if($conexion->query($sqlproveedores)){

            }

            header('Location: ../paneladmin.php?modulo=proveedores');
        } else {
            echo "<script>alert('El correo electronico ingresado ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=proveedores';</script>";
    
        }

    } else {
        echo "<script>alert('El RIF ingresado ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=proveedores';</script>";

    }



} else {
    echo "<script>alert('Ya existe este id de proveedor, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=proveedores';</script>";
}





$sqlproveedores = "INSERT INTO tdprv_tme (tprov_idprov, tprov_Rifpro, tprov_Razsoc, tprov_direpr, tprov_telepr, tprov_emailp, tprov_status) 
VALUES ('$id','$identificacion','$nombre','$direccion','$telefono','$correo','$estado')";

if($conexion->query($sqlproveedores)){

}

header('Location: ../paneladmin.php?modulo=proveedores');

?>

