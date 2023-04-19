<?php


function Query($tabla, $haystack, $needle){

    include_once 'conexion.php';
    
    $sql = "SELECT * FROM '$tabla' WHERE '$haystack' = '$needle'";
    
    $request = $conexion->query($sqlidusuario);
    
    $request = $request->FETCH_ASSOC();

    echo json_encode($request, JSON_UNESCAPED_UNICODE);
}
