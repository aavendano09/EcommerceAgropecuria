<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$nombre = $conexion->real_escape_string($_POST['nombre2']);
$descripcion = $conexion->real_escape_string($_POST['descripcion']);
$presentacion = $conexion->real_escape_string($_POST['presentacion']);
$tprod_precic = $conexion->real_escape_string($_POST['preciocosto']);
$tprod_preciv = $conexion->real_escape_string($_POST['precioventa']);
$fechavencimiento = $conexion->real_escape_string($_POST['fechavencimiento']);
$fechaingreso = $conexion->real_escape_string($_POST['fechaingreso']);
$cantidad = $conexion->real_escape_string($_POST['cantidad']);
$status = $conexion->real_escape_string($_POST['estado']);
$tipoproducto=mysqli_real_escape_string($conexion, $_REQUEST['tipoproducto']);

$sqltprp = "SELECT tprp_idtprp FROM tprp_tts WHERE tprp_fktpro = '$tipoproducto' AND tprp_fkpres = '$presentacion';";

$request = $conexion->query($sqltprp);
$idtprp = $request->fetch_assoc();
$idtprp = $idtprp['tprp_idtprp'];


$maxsize = 1000000;
$band = true;

$size = intval(filesize($_FILES['ara']['tmp_name']));

if ($size <= $maxsize) {
    $band = true;
}else{
    $band = false;
}


$fecha_actual = date("Y-m-d");

$valiVencimiento = date("Y-m-d", strtotime($fecha_actual."+ 30 days"));



if(empty($_FILES['ara']['tmp_name'])){

    if($fechavencimiento >= $valiVencimiento){
        $sqlproducto = "UPDATE tprod_tme 
        SET tprod_namepr = '$nombre', tprod_descpr = '$descripcion', tprod_fktprp = '$idtprp', tprod_precic = '$tprod_precic', tprod_preciv = '$tprod_preciv', tprod_fechve = '$fechavencimiento', tprod_fechin = '$fechaingreso', tprod_cantpr = '$cantidad', tprod_status = '$status'
        WHERE tprod_idprod='$id'";
    
        if($conexion->query($sqlproducto)){
        }
        header('Location: ../paneladmin.php?modulo=productos');
   
    }else{
        echo "<script>alert('La fecha de vencimiento del producto no puede ser menor a 30 dias'); window.location.href = '../paneladmin.php?modulo=productos';</script>"; 
    }

    
    
}else{

    if($fechavencimiento >= $valiVencimiento){
        $imagen = addslashes(file_get_contents($_FILES['ara']['tmp_name']));
        $sqlproducto = "UPDATE tprod_tme 
        SET tprod_namepr = '$nombre', tprod_fotopr = '$imagen', tprod_descpr = '$descripcion', tprod_fktprp = '$idtprp', tprod_precic = '$tprod_precic', tprod_preciv = '$tprod_preciv', tprod_fechve = '$fechavencimiento', tprod_fechin = '$fechaingreso', tprod_cantpr = '$cantidad', tprod_status = '$status'
        WHERE tprod_idprod='$id'";
    
        if ($band) {

            if($conexion->query($sqlproducto)){

            }

            header('Location: ../paneladmin.php?modulo=productos');

        }else{

            echo "<script>alert('La imagen supera el tamaño maximo permitido de 1MB'); window.location.href = '../paneladmin.php?modulo=productos';</script>";

        }

    }else{
        echo "<script>alert('La fecha de vencimiento del producto no puede ser menor a 30 dias'); window.location.href = '../paneladmin.php?modulo=productos';</script>"; 
    
    }

    

}









?>