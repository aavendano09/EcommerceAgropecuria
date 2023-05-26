<?php


include_once "conexion.php";
session_start();

//BUSCAR CLIENTE

if($_POST['action'] == 'searchCliente'){
    if(!empty($_POST['cliente'] && !empty($_POST['tipo_rif']))){
        $id = $_POST['cliente'];
        $tipo = $_POST['tipo_rif'];

        $query =  "SELECT * FROM tclic_tme WHERE tclie_identc = '$id' AND tclie_cedrif = '$tipo'";

        $resultado = $conexion->query($query);


        $rows = $resultado->num_rows;

        $data = [];
        if($rows > 0){
            $data = $resultado->fetch_array();
        }else{
            $data = 0;
        }
    }
   echo json_encode($data, JSON_UNESCAPED_UNICODE);
}

//Registrar cliente - venta

if ($_POST['action'] == 'addCliente') {

    $id = $_POST['idcliente'];
    $tipo = $_POST['tipo_rif'];
    if (!empty($_POST['rif_m'])) {
        $cedula = $_POST['rif_m'];
    }else{
        $cedula = $_POST['cedula_m'];
    } 
    $nombre = $_POST['nombre_m'];
    $telefono = $_POST['telefono_m'];
    $correo = $_POST['correo_m'];
    $contrasena = $_POST['password_m'];
    $direccion = $_POST['direccion_m'];
   

    $sqlCorreo= "SELECT tclie_emailc FROM tclic_tme WHERE tclie_emailc = '$correo'";

    $request = $conexion->query($sqlCorreo);

    if(mysqli_num_rows($request) == 0){
        
        $sqlcliente = "INSERT INTO tclic_tme (tclie_idclie, tclie_identc, tclie_namecl, tclie_telecl, tclie_emailc,tclie_passcl,tclie_direcl,tclie_cedrif) 
        VALUES ('$id','$cedula','$nombre','$telefono','$correo','$contrasena','$direccion', '$tipo');";

        if($conexion->query($sqlcliente)){
            $codCliente = mysqli_insert_id($conexion);
            $msg = [
                'msg'=>'exito', 
                'cod'=>$codCliente
                ];
            echo json_encode($msg);
            exit;
        }else{
            $msg = [
                'msg'=>'Ha ocurrido un error al registrar.', 
                ];
                echo json_encode($msg);
                exit;
        }


    } else {
        $msg = [
            'msg'=>'El correo electronico ya se encuentra registrado', 
            ];
            echo json_encode($msg);
            exit;
    }






    $sqlclientes = mysqli_query($conexion, "INSERT INTO tclic_tme (tclie_idclie, tclie_identc, tclie_namecl, tclie_telecl, tclie_emailc,tclie_passcl,tclie_direcl,tclie_cedrif) 
    VALUES ('$id','$cedula','$nombre','$telefono','$correo','$contrasena','$direccion', '$tipo');");

    if($sqlclientes){
        $codCliente = mysqli_insert_id($conexion);
        $msg = $codCliente;
    }else{
        $msg = 'error';
    }
    mysqli_close($conexion);
    echo $msg;
    exit;

}

//extraer datos del producto

if(!empty($_POST)){

    //extraer datos del producto
    
   if($_POST['action'] == 'infoProducto')
   {
    $producto_id = $_POST['producto'];

    $query = mysqli_query($conexion, "SELECT tprod_idprod,tprod_namepr,tprod_preciv,tprod_cantpr 
    FROM tprod_tme 
    WHERE tprod_idprod = $producto_id AND tprod_status = '1' AND tprod_cantpr > 0");

    mysqli_close($conexion);

    $result = mysqli_num_rows($query);
    if($result > 0){
        $data = mysqli_fetch_assoc($query);
        if(isset($_SESSION['productos'][$producto_id])){
            $data['tprod_cantpr'] = $_SESSION['productos'][$producto_id]['max'];
        }else{
            $_SESSION['productos'][$producto_id]['max'] = $data['tprod_cantpr'];
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }
    echo 'error';
    exit;
   }

   //agregar productos a entrada

}

//agregar productos al detalle temporal

//agregar al detalle temporal

if($_POST['action'] == 'addProductoDetalle'){

    if(empty($_POST['producto']) || empty($_POST['cantidad']))
    {
        echo 'error';
    }else{
        $codproducto = $_POST['producto'];
        $cantidad = $_POST['cantidad'];
        $token = md5($_SESSION['tidAdmin']);

        $query_iva = mysqli_query($conexion, "SELECT tbiva_valiva FROM tbiva_tme");
        $result_iva = mysqli_num_rows($query_iva);

        $_SESSION['productos'][$codproducto]['max'] = ($_SESSION['productos'][$codproducto]['max'] - $cantidad);


        $query_detalle_temp = mysqli_query($conexion, "CALL add_tdtem_tts($codproducto, $cantidad, '$token')");
        $result_detalle = mysqli_num_rows($query_detalle_temp);

        $detalleTabla = '';
        $sub_total = 0;
        $iva = 0;
        $total = 0;
        $arraydata = array();

        if($result_detalle > 0){
            if($result_iva > 0){
                $info_iva = mysqli_fetch_assoc($query_iva);
                $iva = $info_iva['tbiva_valiva'];
            }

            while ($data1 = mysqli_fetch_assoc($query_detalle_temp)){
                $preciototal = round($data1['tdtem_cantid']* $data1['tdtem_preciv'], 2);
                $sub_total = round($sub_total + $preciototal, 2);
                $total = round($total + $preciototal, 2);
                
                $detalleTabla .= 
                '<tr id="product_info'.$data1['tdtem_idprod'].'">
                    <td class="id_producto" id="id_producto'.$data1['tdtem_idprod'].'">'.$data1['tdtem_idprod'].'</td>
                    <td colspan="2">'.$data1['tprod_namepr'].'</td>
                    <td ALIGN="center">'.$data1['tdtem_cantid'].'</td>
                    <td ALIGN="right">'.$data1['tdtem_preciv'].'</td>
                    <td ALIGN="right">'.$preciototal.'</td>
                    <td class="">
                        <a class="btn_anular link_delete" href="#" onclick="event.preventDefault();del_product_detalle('.$data1['tdtem_correl'].', '.$data1['tdtem_idprod'].');"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>';
            }

            $impuesto = round($sub_total*($iva/100), 2);
            $tl_sniva = round($sub_total - $impuesto, 2);
            $total = round($tl_sniva + $impuesto, 2);

            $detalleTotales = '<tr>
                                    <td colspan="5" ALIGN="right">SUBTOTAL $.</td>
                                    <td ALIGN="right">'.$tl_sniva.'</td>
                                </tr>
                                <tr>
                                    <td colspan="5" ALIGN="right">IVA ('.$iva.'%)</td>
                                    <td ALIGN="right">'.$impuesto.'</td>
                                </tr>
                                <tr>
                                    <td colspan="5" ALIGN="right">TOTAL $.</td>
                                    <td ALIGN="right">'.$total.'</td>
                                </tr>';

            $arraydata['detalle'] = $detalleTabla;
            $arraydata['totales'] = $detalleTotales;

            echo json_encode($arraydata, JSON_UNESCAPED_UNICODE);
        }else{
            echo 'error';
        }
        mysqli_close($conexion);
    }
    exit;
    
}

if($_POST['action'] == 'updateProductoDetalle'){

    if(empty($_POST['producto']) || empty($_POST['cantidad']))
    {
        echo 'error';
    }else{
        $codproducto = $_POST['producto'];
        $cantidad = $_POST['cantidad'];
        $token = md5($_SESSION['tidAdmin']);

        $query_iva = mysqli_query($conexion, "SELECT tbiva_valiva FROM tbiva_tme");
        $result_iva = mysqli_num_rows($query_iva);

        $_SESSION['productos'][$codproducto]['max'] = ($_SESSION['productos'][$codproducto]['max'] - $cantidad);


        // $query_detalle_temp = mysqli_query($conexion, "CALL add_tdtec_tts($codproducto, $cantidad, '$token')");
        // $result_detalle = mysqli_num_rows($query_detalle_temp);

        //$precio_actual = mysqli_query($conexion,"SELECT tprod_precic into precio_actual FROM tprod_tme WHERE tprod_idprod = '$codproducto'");
        $update_detalle_temp = mysqli_query($conexion, "UPDATE tdtem_tts SET tdtem_cantid = (tdtem_cantid +'$cantidad') WHERE tdtem_idprod = '$codproducto'");
        $query_detalle_temp = mysqli_query($conexion, "SELECT tmp.tdtem_correl, tmp.tdtem_idprod, p.tprod_namepr, tmp.tdtem_cantid, tmp.tdtem_preciv FROM tdtem_tts tmp
        INNER JOIN tprod_tme p
        ON tmp.tdtem_idprod = p.tprod_idprod
        WHERE tmp.tdtem_tokuse ='$token';
        ");
        $result_detalle = mysqli_num_rows($query_detalle_temp);

        $detalleTabla = '';
        $sub_total = 0;
        $iva = 0;
        $total = 0;
        $arraydata = array();

        if($result_detalle > 0){
            if($result_iva > 0){
                $info_iva = mysqli_fetch_assoc($query_iva);
                $iva = $info_iva['tbiva_valiva'];
            }

            while ($data1 = mysqli_fetch_assoc($query_detalle_temp)){
                $preciototal = round($data1['tdtem_cantid']* $data1['tdtem_preciv'], 2);
                $sub_total = round($sub_total + $preciototal, 2);
                $total = round($total + $preciototal, 2);
                
                $detalleTabla .= 
                '<tr id="product_info'.$data1['tdtem_idprod'].'">
                    <td class="id_producto" id="id_producto'.$data1['tdtem_idprod'].'">'.$data1['tdtem_idprod'].'</td>
                    <td colspan="2">'.$data1['tprod_namepr'].'</td>
                    <td ALIGN="center">'.$data1['tdtem_cantid'].'</td>
                    <td ALIGN="right">'.$data1['tdtem_preciv'].'</td>
                    <td ALIGN="right">'.$preciototal.'</td>
                    <td class="">
                        <a class="btn_anular link_delete" href="#" onclick="event.preventDefault();del_product_detalle('.$data1['tdtem_correl'].', '.$data1['tdtem_idprod'].');"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>';
            }

            $impuesto = round($sub_total*($iva/100), 2);
            $tl_sniva = round($sub_total - $impuesto, 2);
            $total = round($tl_sniva + $impuesto, 2);

            $detalleTotales = '<tr>
                                    <td colspan="5" ALIGN="right">SUBTOTAL $.</td>
                                    <td ALIGN="right">'.$tl_sniva.'</td>
                                </tr>
                                <tr>
                                    <td colspan="5" ALIGN="right">IVA ('.$iva.'%)</td>
                                    <td ALIGN="right">'.$impuesto.'</td>
                                </tr>
                                <tr>
                                    <td colspan="5" ALIGN="right">TOTAL $.</td>
                                    <td ALIGN="right">'.$total.'</td>
                                </tr>';

            $arraydata['detalle'] = $detalleTabla;
            $arraydata['totales'] = $detalleTotales;

            echo json_encode($arraydata, JSON_UNESCAPED_UNICODE);
        }else{
            echo 'error';
        }
        mysqli_close($conexion);
    }
    exit;


}

//extraer datos del detalle temporal

if($_POST['action'] == 'serchForDetalle'){

    if(empty($_POST['user']))
    {
        echo 'error';
    }else{
        $token = md5($_SESSION['tidAdmin']);
        $query_tmp = mysqli_query($conexion,"SELECT tmp.tdtem_correl,
                                                    tmp.tdtem_tokuse,
                                                    tmp.tdtem_cantid,
                                                    tmp.tdtem_preciv,
                                                    p.tprod_idprod,
                                                    p.tprod_namepr
                                            FROM  tdtem_tts tmp
                                            INNER JOIN tprod_tme p
                                            ON tmp.tdtem_idprod = p.tprod_idprod
                                            WHERE tmp.tdtem_tokuse = '$token'");
        
        $result = mysqli_num_rows($query_tmp);

        $query_iva = mysqli_query($conexion, "SELECT tbiva_valiva FROM tbiva_tme");
        $result_iva = mysqli_num_rows($query_iva);

        $detalleTabla = '';
        $sub_total = 0;
        $iva = 0;
        $total = 0;
        $arraydata = array();

       if($result > 0){
            if($result_iva > 0){
                $info_iva = mysqli_fetch_assoc($query_iva);
                $iva = $info_iva['tbiva_valiva']; 
            }

            while ($data1 = mysqli_fetch_assoc($query_tmp)){
                $preciototal = round($data1['tdtem_cantid']* $data1['tdtem_preciv'], 2);
                $sub_total = round($sub_total + $preciototal, 2);
                $total = round($total + $preciototal, 2);
                
                $detalleTabla .= 
                '<tr id="product_info'.$data1['tprod_idprod'].'">
                    <td class="id_producto" id="id_producto'.$data1['tprod_idprod'].'">'.$data1['tprod_idprod'].'</td>
                    <td colspan="2">'.$data1['tprod_namepr'].'</td>
                    <td ALIGN="center">'.$data1['tdtem_cantid'].'</td>
                    <td ALIGN="right">'.$data1['tdtem_preciv'].'</td>
                    <td ALIGN="right">'.$preciototal.'</td>
                    <td class="">
                        <a class="btn_anular link_delete" href="#" onclick="event.preventDefault();del_product_detalle('.$data1['tdtem_correl'].', '.$data1['tprod_idprod'].');"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>';
            }

            $impuesto = round($sub_total*($iva/100), 2);
            $tl_sniva = round($sub_total - $impuesto, 2);
            $total = round($tl_sniva + $impuesto, 2);

            $detalleTotales = '<tr>
                                    <td colspan="5" ALIGN="right">SUBTOTAL $.</td>
                                    <td ALIGN="right">'.$tl_sniva.'</td>
                                </tr>
                                <tr>
                                    <td colspan="5" ALIGN="right">IVA ('.$iva.'%)</td>
                                    <td ALIGN="right">'.$impuesto.'</td>
                                </tr>
                                <tr>
                                    <td colspan="5" ALIGN="right">TOTAL $.</td>
                                    <td ALIGN="right">'.$total.'</td>
                                </tr>';
            $arraydata['detalle'] = $detalleTabla;
            $arraydata['totales'] = $detalleTotales;

            echo json_encode($arraydata, JSON_UNESCAPED_UNICODE);
        }else{
            echo 'error';
        }
        mysqli_close($conexion);
    }
    exit;
    
}

//eliminar datos del detalle temporal

if($_POST['action'] == 'delProductoDetalle'){
    if(empty($_POST['id_detalle']))
    {
        echo 'error';
    }else{

        $id_detalle = $_POST['id_detalle'];
        $id_prod = $_POST['id_prod'];
        $token      = md5($_SESSION['tidAdmin']);
        
        $query_iva = mysqli_query($conexion, "SELECT tbiva_valiva FROM tbiva_tme");
        $result_iva = mysqli_num_rows($query_iva);

        $query_det_temp = mysqli_query($conexion,"CALL del_tdtem_tts($id_detalle, '$token')");
        $resultt = mysqli_num_rows($query_det_temp);

        unset($_SESSION['productos'][$id_prod]);

        $detalleTabla = '';
        $sub_total = 0;
        $iva = 0;
        $total = 0;
        $arraydata = array();

       if($resultt > 0){
            if($result_iva > 0){
                $info_iva = mysqli_fetch_assoc($query_iva);
                $iva = $info_iva['tbiva_valiva']; 
            }

            while ($data1 = mysqli_fetch_assoc($query_det_temp)){
                $preciototal = round($data1['tdtem_cantid']* $data1['tdtem_preciv'], 2);
                $sub_total = round($sub_total + $preciototal, 2);
                $total = round($total + $preciototal, 2);
                
                $detalleTabla .= 
                '<tr id="product_info'.$data1['tdtem_idprod'].'">
                    <td class="id_producto" id="id_producto'.$data1['tdtem_idprod'].'">'.$data1['tdtem_idprod'].'</td>
                    <td colspan="2">'.$data1['tprod_namepr'].'</td>
                    <td ALIGN="center">'.$data1['tdtem_cantid'].'</td>
                    <td ALIGN="right">'.$data1['tdtem_preciv'].'</td>
                    <td ALIGN="right">'.$preciototal.'</td>
                    <td class="">
                        <a class="btn_anular link_delete" href="#" onclick="event.preventDefault();del_product_detalle('.$data1['tdtem_correl'].', '.$data1['tdtem_idprod'].');"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>';
            }

            $impuesto = round($sub_total*($iva/100), 2);
            $tl_sniva = round($sub_total - $impuesto, 2);
            $total = round($tl_sniva + $impuesto, 2);

            $detalleTotales = '<tr>
                                    <td colspan="5" ALIGN="right">SUBTOTAL $.</td>
                                    <td ALIGN="right">'.$tl_sniva.'</td>
                                </tr>
                                <tr>
                                    <td colspan="5" ALIGN="right">IVA ('.$iva.'%)</td>
                                    <td ALIGN="right">'.$impuesto.'</td>
                                </tr>
                                <tr>
                                    <td colspan="5" ALIGN="right">TOTAL $.</td>
                                    <td ALIGN="right">'.$total.'</td>
                                </tr>';
            $arraydata['detalle'] = $detalleTabla;
            $arraydata['totales'] = $detalleTotales;

            echo json_encode($arraydata, JSON_UNESCAPED_UNICODE);
        }else{
            echo 'error';
        }
        mysqli_close($conexion);
    }
    exit;

}

// boton Anular venta

if($_POST['action'] == 'anularVenta'){

    $token = md5($_SESSION['tidAdmin']);

    unset($_SESSION['productos']);

    $query_eliminar = mysqli_query($conexion, "DELETE FROM tdtem_tts WHERE tdtem_tokuse='$token'");
    mysqli_close($conexion);
    if($query_eliminar){
        echo 'ok'; 
    }else{
        echo 'error';
    }
    exit;
}

//procesar venta manual

 //procesar venta
 if($_POST['action'] == 'procesarVenta'){
    if(empty($_POST['codcliente'])){
        $codcliente = 16;
    }else{
        $codcliente = $_POST['codcliente'];
    }


    $token = md5($_SESSION['tidAdmin']);
    $usuario = $_SESSION['tidAdmin'];

    $query_p = mysqli_query($conexion, "SELECT * FROM tdtem_tts WHERE tdtem_tokuse = '$token'");
    $resultp = mysqli_num_rows($query_p);

    if($resultp > 0)
    {
        $query_procesar = mysqli_query($conexion, "CALL procesar_venta_manual($usuario, $codcliente, '$token')");
        $resultpp = mysqli_num_rows($query_procesar);

        if($resultpp > 0){
            $data2 = mysqli_fetch_assoc($query_procesar);
            echo json_encode($data2, JSON_UNESCAPED_UNICODE);
        }else{
            echo 'error';
        }

    }else{
        echo 'error';
    }
    mysqli_close($conexion);
    exit();
}

//info del modal

if($_POST['action'] == 'infoFactura'){
    if(!empty($_POST['nofactura'])){

        $nofactura = $_POST['nofactura'];
        $queryeliminar = mysqli_query($conexion, "SELECT * FROM tvenn_tts WHERE tvent_idvent = '$nofactura'");
        mysqli_close($conexion);

        $resultelim = mysqli_num_rows($queryeliminar);
        if($resultelim > 0){

            $dataeliminar = mysqli_fetch_assoc($queryeliminar);
            echo json_encode($dataeliminar, JSON_UNESCAPED_UNICODE);
            exit;
        }
    }
    echo 'error';
    exit;
}

//ANULAR VENTAS O ORDENES DE ENTREGA

if($_POST['action'] == 'anularFactura'){

    if(!empty($_POST['noFactura']))
    {
        $noFactura = $_POST['noFactura'];

        $query_anular = mysqli_query($conexion, "CALL anular_factura($noFactura)");
        mysqli_close($conexion);
        $result = mysqli_num_rows($query_anular);
        if($result > 0){
            $dataanular =mysqli_fetch_assoc($query_anular);
            echo json_encode($dataanular, JSON_UNESCAPED_UNICODE);
            exit; 
        }
    }
    echo 'error';
    exit;
}

exit;

?>