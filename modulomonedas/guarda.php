<?php

require '../conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$estado = $conexion->real_escape_string($_POST['estado']);
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$maxsize = 1000000;
$band = true;

$size = intval(filesize($_FILES['imagen']['tmp_name']));

if ($size <= $maxsize) {
    $band = true;
}else{
    $band = false;
}


$sqlIdMoneda = "SELECT tmone_idmone FROM tmone_tme WHERE tmone_idmone = '$id'";

$request = $conexion->query($sqlIdMoneda);

if (mysqli_num_rows($request) == 0) {

    $sqlNombreMoneda = "SELECT tmone_namemo FROM tmone_tme WHERE tmone_namemo = '$nombre'";

    $request2 = $conexion->query($sqlNombreMoneda);

    if(mysqli_num_rows($request2) == 0){

        $sqlmonedas = "INSERT INTO tmone_tme (tmone_idmone, tmone_namemo, tmone_status, tmone_imagen) 
        VALUES ('$id','$nombre','$estado','$imagen')";

        if ($band) {
            if($conexion->query($sqlmonedas)){

            }
            header('Location: ../paneladmin.php?modulo=monedas');
        }else{
            echo "<script>alert('La imagen supera el tamaño maximo permitido de 1MB'); window.location.href = '../paneladmin.php?modulo=monedas';</script>";
        }


        
    } else {
        echo "<script>alert('El nombre de la moneda ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=monedas';</script>";
    }



} else {

    echo "<script>alert('El id de la moneda ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=monedas';</script>";
    
}












?>