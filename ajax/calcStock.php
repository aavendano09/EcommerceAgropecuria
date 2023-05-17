<?php
    require_once '../conexion.php';
    
    $id = $_POST['id'];
    
    $sql = "SELECT tprod_cantpr FROM tprod_tme 
    WHERE tprod_idprod= '$id' LIMIT 1";

    $cantidad = $conexion->query($sql);

    $response = $cantidad->fetch_assoc();

    echo json_encode($response['tprod_cantpr']);
