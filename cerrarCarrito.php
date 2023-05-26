<?php

session_start();

$_SESSION['productosSession'] = array();
setcookie("productos","");

header("location: home.php?modulo=productos");