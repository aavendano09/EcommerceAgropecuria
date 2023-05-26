<?php
session_start();

$_SESSION['productosSession'] = array();
    setcookie("productos","");
    echo json_encode(array());
?>