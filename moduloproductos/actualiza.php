<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$nombre = $conexion->real_escape_string($_POST['nombre']);
$descripcion = $conexion->real_escape_string($_POST['descripcion']);
$presentacion = $conexion->real_escape_string($_POST['presentacion']);
$tprod_precic = $conexion->real_escape_string($_POST['preciocosto']);
$tprod_preciv = $conexion->real_escape_string($_POST['precioventa']);
$fechavencimiento = $conexion->real_escape_string($_POST['fechavencimiento']);
$fechaingreso = $conexion->real_escape_string($_POST['fechaingreso']);
$cantidad = $conexion->real_escape_string($_POST['cantidad']);
$status = $conexion->real_escape_string($_POST['estado']);
$tipoproducto=mysqli_real_escape_string($conexion, $_REQUEST['tipoproducto']);


$fecha_actual = date("Y-m-d");

$valiVencimiento = date("Y-m-d", strtotime($fecha_actual."+ 30 days"));



if(empty($_FILES['imagen']['tmp_name'])){

    if($fechavencimiento >= $valiVencimiento){
        $sqlproducto = "UPDATE tprod_tme 
        SET tprod_namepr = '$nombre', tprod_descpr = '$descripcion', tprod_prespr = '$presentacion', tprod_precic = '$tprod_precic', tprod_preciv = '$tprod_preciv', tprod_fechve = '$fechavencimiento', tprod_fechin = '$fechaingreso', tprod_cantpr = '$cantidad', tprod_fktipp = '$tipoproducto', tprod_status = '$status'
        WHERE tprod_idprod='$id'";
    
        if($conexion->query($sqlproducto)){
        }
        header('Location: ../paneladmin.php?modulo=productos');
   
    }else{
        echo "<script>alert('La fecha de vencimiento del producto no puede ser menor a 30 dias'); window.location.href = '../paneladmin.php?modulo=productos';</script>"; 
    }

    
    
}else{

    if($fechavencimiento >= $valiVencimiento){
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $sqlproducto = "UPDATE tprod_tme 
        SET tprod_namepr = '$nombre', tprod_fotopr = '$imagen', tprod_descpr = '$descripcion', tprod_prespr = '$presentacion', tprod_precic = '$tprod_precic', tprod_preciv = '$tprod_preciv', tprod_fechve = '$fechavencimiento', tprod_fechin = '$fechaingreso', tprod_cantpr = '$cantidad', tprod_fktipp = '$tipoproducto', tprod_status = '$status'
        WHERE tprod_idprod='$id'";
    
        if($conexion->query($sqlproducto)){
        }
    
        header('Location: ../paneladmin.php?modulo=productos');
    }else{
        echo "<script>alert('La fecha de vencimiento del producto no puede ser menor a 30 dias'); window.location.href = '../paneladmin.php?modulo=productos';</script>"; 
    
    }

    

}









?>