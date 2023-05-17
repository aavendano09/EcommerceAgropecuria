<?php
session_start();
    $productos= unserialize($_COOKIE['productos']);
    if (!isset($_SESSION['productosSession'])) {
        $_SESSION['productosSession'] = array();
    }

    if(is_array($productos)==false)$productos=array();
    $siYaEstaProducto=false;


    // foreach ($productos as $key => $value) {
    //     if($value['id']==$_REQUEST['id']){
    //         $productos[$key]['cantidad']=$productos[$key]['cantidad']+$_REQUEST['cantidad'];
    //         $siYaEstaProducto=true;
    //     }
    // }
    // foreach ($_SESSION['productosSession'] as $key => $value) {
    //     if($value['id']==$_REQUEST['id']){
    //         $_SESSION['productosSession'][$key]['cantidad']=$_SESSION['productosSession'][$key]['cantidad']+$_REQUEST['cantidad'];
    //         $siYaEstaProducto=true;
    //     }
    // }
    if($siYaEstaProducto==false){
        $nuevo=array(
            "id"=>$_REQUEST['id'],
            "nombre"=>$_REQUEST['nombre'],
            "cantidad"=>$_REQUEST['cantidad'],
            "precio"=>$_REQUEST['precio']
        );

        $nuevo2 = [

                "nombre"=>$_REQUEST['nombre'],
                "cantidad"=>$_REQUEST['cantidad'],
                "precio"=>$_REQUEST['precio']
         ];

        array_push($productos,$nuevo);
        $_SESSION['productosSession'][$_REQUEST['id']] = $nuevo;
    }

    setcookie("productos",serialize($productos));
    echo json_encode($productos);

?>