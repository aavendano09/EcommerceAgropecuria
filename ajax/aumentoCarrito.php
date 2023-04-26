<?php
session_start();

$productos= unserialize($_COOKIE['productos']);
    if (!isset($_SESSION['productosSession'])) {
        $_SESSION['productosSession'] = array();
    }

$total = 0;
$total = intval($_REQUEST['responses'])+intval($_REQUEST['cantidad']);

if ($total >= intval($_REQUEST['max'])) {

    

    foreach ($productos as $key => $value) {
        if($value['id']==$_REQUEST['id']){
            $productos[$key]['cantidad']= intval($_REQUEST['max']);
            $siYaEstaProducto=true;
        }
    }
    foreach ($_SESSION['productosSession'] as $key => $value) {
        if($value['id']==$_REQUEST['id']){
            $_SESSION['productosSession'][$key]['cantidad']=intval($_REQUEST['max']);
            $siYaEstaProducto=true;
        }
    }

    setcookie("productos",serialize($productos));
    echo json_encode($productos);
    
}else{

    foreach ($productos as $key => $value) {
        if($value['id']==$_REQUEST['id']){
            $productos[$key]['cantidad']=$productos[$key]['cantidad']+$_REQUEST['cantidad'];

        }
    }
    foreach ($_SESSION['productosSession'] as $key => $value) {
        if($value['id']==$_REQUEST['id']){
            $_SESSION['productosSession'][$key]['cantidad']=$_SESSION['productosSession'][$key]['cantidad']+$_REQUEST['cantidad'];

        }
    }

    setcookie("productos",serialize($productos));
    echo json_encode($productos);
}
   

?>