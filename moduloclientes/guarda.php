<?php

require 'conexion.php';


$id = $conexion->real_escape_string($_POST['id']);
if (isset($_POST['rif'])) {

    $identificacion = $conexion->real_escape_string($_POST['rif']);
}else{
    $identificacion = $conexion->real_escape_string($_POST['cedula']);
    echo $identificacion;
}
$cedrif = $conexion->real_escape_string($_POST['tiprif']);

$nombre = $conexion->real_escape_string($_POST['nombre']);
$telefono = $conexion->real_escape_string($_POST['telefono']);
$correo = $conexion->real_escape_string($_POST['correo']);
$direccion = $conexion->real_escape_string($_POST['direccion']);



$sqlidCliente = "SELECT tclie_idclie FROM tclic_tme WHERE tclie_idclie = '$id'";

$request = $conexion->query($sqlidCliente);

if(mysqli_num_rows($request) == 0){

    $sqlidenCliente = "SELECT tclie_identc FROM tclic_tme WHERE tclie_identc = '$identificacion' AND tclie_cedrif = '$cedrif'";

    $request = $conexion->query($sqlidenCliente);

    if(mysqli_num_rows($request) == 0){
    
        $sqlemailCliente = "SELECT tclie_emailc FROM tclic_tme WHERE tclie_emailc = '$correo'";

        $request = $conexion->query($sqlemailCliente);
    
        if(mysqli_num_rows($request) == 0){
            
            $sqlmonedas = "INSERT INTO tclic_tme (tclie_idclie, tclie_identc, tclie_namecl, tclie_telecl, tclie_emailc, tclie_direcl, tclie_cedrif) 
            VALUES ('$id','$identificacion','$nombre','$telefono','$correo', '$direccion', '$cedrif')";

            echo $sqlmonedas;
            
            if($conexion->query($sqlmonedas)){
                
            }
    
            header('Location: ../paneladmin.php?modulo=clientes');
        } else {
            echo "<script>alert('El correo electronico ingresado ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=clientes';</script>";
    
        }

    } else {
        echo "<script>alert('La identificacion ingresada ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=clientes';</script>";

    }



} else {
    echo "<script>alert('Ya existe este id de cliente, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=clientes';</script>";
}




?>

