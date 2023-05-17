<?php

session_start();

$_SESSION['productosSession'] = array();

header("location: home.php?modulo=productos");