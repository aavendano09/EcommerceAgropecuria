<?php

class ventas{
    public function obtenDatosProducto($idproducto){
        $conexion= new mysqli("localhost","root","","ecommerce_agropecuaria	");
        $sql = "SELECT tprod_idprod, tprod_namepr, tprod_descpr, tprod_prespr, tprod_preciv, tprod_cantpr FROM tprod_tme 
        WHERE tprod_idprod= '$idproducto'";

        $resultado = mysqli_query($conexion, $sql);

        $ver = mysqli_fetch_row($resultado);

        $datos = array('tprod_namepr' => $ver[1], 
                       'tprod_descpr' => $ver[2], 
                       'tprod_prespr' => $ver[3], 
                       'tprod_preciv' => $ver[4], 
                       'tprod_cantpr' => $ver[5]

        );
        return $datos;
    }
}

?>