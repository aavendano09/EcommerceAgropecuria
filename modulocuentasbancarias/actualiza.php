<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$numero = $conexion->real_escape_string($_POST['numero']);
$oldnumero = $conexion->real_escape_string($_POST['hidenumero']);
$identificacion = $conexion->real_escape_string($_POST['identificacion']);
$cedrif = $conexion->real_escape_string($_POST['cedrif']);
$tipocuenta = $conexion->real_escape_string($_POST['tipocuenta']);


if($oldnumero == $numero){

    $sqlmonedas = "UPDATE tcuba_tme
    SET tcuba_nameba = '$nombre', tcuba_Nocuba = '$numero', tcuba_identi = '$identificacion', tcuba_tpcuba = '$tipocuenta', tcuba_rifba = '$cedrif' WHERE tcuba_idcuBa='$id'";

    if($conexion->query($sqlmonedas)){
    }

    header('Location: ../paneladmin.php?modulo=cuentasbancarias');
    

} else {

    $sqlNoCuenta = "SELECT tcuba_Nocuba FROM tcuba_tme WHERE tcuba_Nocuba = '$numero'";

    $request = $conexion->query($sqlNoCuenta);

    if(mysqli_num_rows($request) == 0){
        $sqlmonedas = "UPDATE tcuba_tme
        SET tcuba_nameba = '$nombre', tcuba_Nocuba = '$numero', tcuba_identi = '$identificacion', tcuba_tpcuba = '$tipocuenta', tcuba_rifba = '$cedrif' WHERE tcuba_idcuBa='$id'";

        if($conexion->query($sqlmonedas)){
        }

        header('Location: ../paneladmin.php?modulo=cuentasbancarias');
    } else {
        echo "<script>alert('El numero de cuenta ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=cuentasbancarias';</script>";
    }


}




?>