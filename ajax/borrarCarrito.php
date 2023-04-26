<?php
session_start();
    setcookie("productos","");
session_destroy();
    echo json_encode(array());
?>