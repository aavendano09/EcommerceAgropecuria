<?php

require 'conexion.php';

$id = $conexion->real_escape_string($_POST['id']);

$sql = "SELECT tprod_idprod, tprod_namepr, tprod_descpr, ttpro_idtipp, tpre_idpres, tprod_precic, tprod_preciv, tprod_fechve, tprod_fechin, tprod_connet ,tprod_status FROM tprod_tme 
INNER JOIN tprp_tts ON tprp_idtprp = tprod_fktprp
INNER JOIN tpre_tts ON tpre_idpres = tprp_fkpres
INNER JOIN ttpro_tme ON tprp_fktpro = ttpro_idtipp
WHERE tprod_idprod='$id' LIMIT 1;";

$resultado = $conexion->query($sql);
$rows = $resultado->num_rows;



$producto = [];

if($rows > 0){

    $producto = $resultado->fetch_array();

}


echo json_encode($producto);

?>