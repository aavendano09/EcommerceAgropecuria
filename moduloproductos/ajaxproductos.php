<?php
error_reporting(0);

include_once "conexion.php";
session_start();

//Eliminar Producto Logicamente

$idproducto = $conexion->real_escape_string($_POST['id']);

    //query delete del producto logicamente

    $query_delete = mysqli_query($conexion,"UPDATE tprod_tme SET tprod_status = 0 WHERE tprod_idprod = $idproducto");
    mysqli_close($conexion);

    if($conexion->query($sqlmedidas)){
    }
    
    header('Location: ../paneladmin.php?modulo=eliminaproductos');
exit;

?>