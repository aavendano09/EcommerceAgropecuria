<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$numero = $conexion->real_escape_string($_POST['numero']);
$identificacion = $conexion->real_escape_string($_POST['identificacion']);
$cedrif = $conexion->real_escape_string($_POST['cedrif']);
$tipocuenta = $conexion->real_escape_string($_POST['tipocuenta']);

$sqlIdCuenta = "SELECT tcuba_idcuBa FROM tcuba_tme WHERE tcuba_idcuBa = '$id'";

$request = $conexion->query($sqlIdCuenta);

if (mysqli_num_rows($request) == 0) {

    $sqlNoCuenta = "SELECT tcuba_Nocuba FROM tcuba_tme WHERE tcuba_Nocuba = '$numero'";

    $request = $conexion->query($sqlNoCuenta);

    if(mysqli_num_rows($request) == 0){
        $sqlmonedas = "INSERT INTO tcuba_tme (tcuba_idcuBa, tcuba_nameba, tcuba_Nocuba, tcuba_identi, tcuba_tpcuba, tcuba_rifba) 
        VALUES ('$id','$nombre','$numero','$identificacion','$tipocuenta','$cedrif')";

        if($conexion->query($sqlmonedas)){

        }

        header('Location: ../paneladmin.php?modulo=cuentasbancarias');
    } else {
        echo "<script>alert('El numero de cuenta ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=cuentasbancarias';</script>";
    }

    

} else {

    echo "<script>alert('El id de la cuenta ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=cuentasbancarias';</script>";
    
}




?>