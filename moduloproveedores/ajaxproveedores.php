<?php
error_reporting(0);

include_once "conexion.php";
session_start();

//Eliminar proveedor Logicamente

$idproveedor = $conexion->real_escape_string($_POST['id']);

    //query delete del proveedor logicamente

    $sqldelete = "UPDATE tdprv_tme SET tprov_status = '0' WHERE tprov_idprov = $idproveedor";

    if($conexion->query($sqldelete)){
    }
    
    header('Location: ../paneladmin.php?modulo=eliminaproveedores');
  


?>