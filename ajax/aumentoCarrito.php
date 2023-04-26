<?php
session_start();
    $productos= unserialize($_COOKIE['productos']);
    if (!isset($_SESSION['productosSession'])) {
        $_SESSION['productosSession'] = array();
    }

    foreach ($productos as $key => $value) {
        if($value['id']==$_REQUEST['id']){
            $productos[$key]['cantidad']=$productos[$key]['cantidad']+$_REQUEST['cantidad'];
            $siYaEstaProducto=true;
        }
    }
    foreach ($_SESSION['productosSession'] as $key => $value) {
        if($value['id']==$_REQUEST['id']){
            $_SESSION['productosSession'][$key]['cantidad']=$_SESSION['productosSession'][$key]['cantidad']+$_REQUEST['cantidad'];
            $siYaEstaProducto=true;
        }
    }

    setcookie("productos",serialize($productos));
    echo json_encode($productos);

?>