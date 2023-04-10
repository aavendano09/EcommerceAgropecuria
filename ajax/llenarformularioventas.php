
<?php

require_once "conexion.php";
include_once "obtenerdatos.php";

$obj = new ventas();
echo json_encode($obj->obtenDatosProducto($_POST['idproducto']))

?>