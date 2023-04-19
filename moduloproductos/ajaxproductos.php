<?php
error_reporting(0);

include_once "conexion.php";
session_start();

//Eliminar Producto Logicamente

$idproducto = $conexion->real_escape_string($_POST['id']);

    //query delete del producto logicamente

    $query_delete = "UPDATE tprod_tme SET tprod_status = 0 WHERE tprod_idprod = $idproducto";

    if($conexion->query($query_delete)){
    }
    
    header('Location: ../paneladmin.php?modulo=eliminaproductos');


?>