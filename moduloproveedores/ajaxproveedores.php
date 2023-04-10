<?php
error_reporting(0);

include_once "conexion.php";
session_start();

//Eliminar proveedor Logicamente

$idproveedor = $conexion->real_escape_string($_POST['id']);

    //query delete del proveedor logicamente

    $query_delete = mysqli_query($conexion,"UPDATE tdprv_tme SET tprov_status = 'inactivo' WHERE tprov_idprov = $idproveedor");
    mysqli_close($conexion);

    if($conexion->query($sqlmedidas)){
    }
    
    header('Location: ../paneladmin.php?modulo=eliminaproveedores');
  

exit;

?>