
<?php

session_start();

echo json_encode($_SESSION['productosSession'][$_REQUEST['id']]['cantidad']);

