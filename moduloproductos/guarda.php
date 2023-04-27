<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$nombre = $conexion->real_escape_string($_POST['nombre2']);
$descripcion = $conexion->real_escape_string($_POST['descripcion']);
$presentacion = $conexion->real_escape_string($_POST['presentacion']);
$tprod_precic = $conexion->real_escape_string($_POST['preciocosto']);
$tprod_preciv = $conexion->real_escape_string($_POST['precioventa']);
$fechavencimiento = $conexion->real_escape_string($_POST['fechavencimiento']);
$fechaingreso = $conexion->real_escape_string($_POST['fechaingreso']);
$contentneto = $conexion->real_escape_string($_POST['contenidoneto']);
$tipoproducto=mysqli_real_escape_string($conexion, $_REQUEST['tipoproducto']);
$presentacion=mysqli_real_escape_string($conexion, $_REQUEST['presentacion']);

$sqltprp = "SELECT tprp_idtprp FROM tprp_tts WHERE tprp_fktpro = '$tipoproducto' AND tprp_fkpres = '$presentacion';";

$request = $conexion->query($sqltprp);
$idtprp = $request->fetch_assoc();
$idtprp = $idtprp['tprp_idtprp'];


$maxsize = 1000000;
$band = true;

$size = intval(filesize($_FILES['imagen']['tmp_name']));

if ($size <= $maxsize) {
    $band = true;
}else{
    $band = false;
}




$sqlcodigo = "SELECT tprod_idprod FROM tprod_tme WHERE tprod_idprod = '$id'";

$request = $conexion->query($sqlcodigo);

$fecha_actual = date("Y-m-d");

$valiVencimiento = date("Y-m-d", strtotime($fecha_actual."+ 30 days"));


if (mysqli_num_rows($request) == 0) {

    if($fechavencimiento >= $valiVencimiento){
       
        $sqlproductos = "INSERT INTO `tprod_tme` (`tprod_idprod`, `tprod_fotopr`, `tprod_namepr`, `tprod_descpr`, `tprod_fktprp`, `tprod_precic`, `tprod_preciv`, `tprod_fechin`, `tprod_fechve`, `tprod_connet`) 
    VALUES ('$id','$imagen','$nombre','$descripcion','$idtprp','$tprod_precic','$tprod_preciv','$fechaingreso','$fechavencimiento','$contentneto')";

    if ($band) {
        if($conexion->query($sqlproductos)){

        }
        header('Location: ../paneladmin.php?modulo=productos');

    }else{
        echo "<script>alert('La imagen supera el tamaño maximo permitido de 1MB'); window.location.href = '../paneladmin.php?modulo=productos';</script>";

    }

    } else {
        echo "<script>alert('La fecha de vencimiento del producto no puede ser menor a 30 dias'); window.location.href = '../paneladmin.php?modulo=productos';</script>"; 

    }

}else{
    echo "<script>alert('El id de producto ya se encuentra registrado, porfavor ingrese otro'); window.location.href = '../paneladmin.php?modulo=productos';</script>";

}


?>