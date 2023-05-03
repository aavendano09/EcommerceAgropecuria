<?php
error_reporting(0);

include_once "conexion.php";
session_start();

//BUSCAR PROVEEDOR

if($_POST['action'] == 'searchProveedor'){
    if(!empty($_POST['proveedor'] && !empty($_POST['tipo_rif']))){
        $id = $_POST['proveedor'];
        $tiprif = $_POST['tipo_rif'];

        $query = "SELECT * FROM tdprv_tme WHERE tprov_Rifpro = '$id' AND tprov_tiprif = '$tiprif'";

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

//Registrar proveedor - venta

if ($_POST['action'] == 'addCliente') {

    $id = $_POST['idproveedor'];
    $tipo = $_POST['tipo_rif'];
    $Rif = $_POST['rif_m'];
    $nombre = $_POST['razon_m'];
    $telefono = $_POST['telefono_m'];
    $correo = $_POST['correo_m'];
    $direccion = $_POST['direccion_m'];

    $sqlRifProv = "SELECT tprov_Rifpro FROM tdprv_tme WHERE tprov_Rifpro = '$Rif' AND tprov_tiprif = '$tipo'";

    $request = $conexion->query($sqlRifProv);

    if(mysqli_num_rows($request) == 0){
    
        $sqlCorreo= "SELECT tprov_emailp FROM tdprv_tme WHERE tprov_emailp = '$correo'";

        $request = $conexion->query($sqlCorreo);
    
        if(mysqli_num_rows($request) == 0){
            
            $sqlproveedor = "INSERT INTO tdprv_tme (tprov_idprov, tprov_Rifpro, tprov_Razsoc, tprov_direpr, tprov_telepr, tprov_emailp, tprov_tiprif)  
            VALUES ('$id','$Rif','$nombre','$direccion','$telefono','$correo','$tipo');";

            if($conexion->query($sqlproveedor)){
                $codProveedor = mysqli_insert_id($conexion);
                $msg = [
                    'msg'=>'exito', 
                    'cod'=>$codProveedor
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

    } else {
        $msg = [
            'msg'=>'El RIF ya se encuentra registrado', 
            ];
            echo json_encode($msg);
            exit;
    }
   

}

//extraer datos del producto

if(!empty($_POST)){

    //extraer datos del producto
    
   if($_POST['action'] == 'infoProducto')
   {
    $producto_id = $_POST['producto'];

    $query = mysqli_query($conexion, "SELECT tprod_idprod,tprod_namepr,tprod_precic,tprod_cantpr 
    FROM tprod_tme 
    WHERE tprod_idprod = $producto_id AND tprod_status = '1'");

    mysqli_close($conexion);

    $result = mysqli_num_rows($query);
    if($result > 0){
        $data = mysqli_fetch_assoc($query);
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

        $query_detalle_temp = mysqli_query($conexion, "CALL add_tdtec_tts($codproducto, $cantidad, '$token')");
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
                $preciototal = round($data1['tdtec_cantid']* $data1['tdtec_precic'], 2);
                $sub_total = round($sub_total + $preciototal, 2);
                $total = round($total + $preciototal, 2);
                
                $detalleTabla .= 
                '<tr>
                    <td>'.$data1['tdtec_idprod'].'</td>
                    <td colspan="2">'.$data1['tprod_namepr'].'</td>
                    <td ALIGN="center">'.$data1['tdtec_cantid'].'</td>
                    <td ALIGN="right">'.$data1['tdtec_precic'].'</td>
                    <td ALIGN="right">'.$preciototal.'</td>
                    <td class="">
                        <a class="btn_anular link_delete" href="#" onclick="event.preventDefault();del_product_detalle('.$data1['tdtec_correl'].');"><i class="fa fa-trash"></i></a>
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
        $query_tmp = mysqli_query($conexion,"SELECT tmp.tdtec_correl,
                                                    tmp.tdtec_tokuse,
                                                    tmp.tdtec_cantid,
                                                    tmp.tdtec_precic,
                                                    p.tprod_idprod,
                                                    p.tprod_namepr
                                            FROM  tdtec_tts tmp
                                            INNER JOIN tprod_tme p
                                            ON tmp.tdtec_idprod = p.tprod_idprod
                                            WHERE tmp.tdtec_tokuse = '$token'");
        
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
                $preciototal = round($data1['tdtec_cantid']* $data1['tdtec_precic'], 2);
                $sub_total = round($sub_total + $preciototal, 2);
                $total = round($total + $preciototal, 2);
                
                $detalleTabla .= 
                '<tr>
                    <td>'.$data1['tprod_idprod'].'</td>
                    <td colspan="2">'.$data1['tprod_namepr'].'</td>
                    <td ALIGN="center">'.$data1['tdtec_cantid'].'</td>
                    <td ALIGN="right">'.$data1['tdtec_precic'].'</td>
                    <td ALIGN="right">'.$preciototal.'</td>
                    <td class="">
                        <a class="btn_anular link_delete" href="#" onclick="event.preventDefault();del_product_detalle('.$data1['tdtec_correl'].');"><i class="fa fa-trash"></i></a>
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

if($_POST['action'] == 'delProductDetalle'){
    if(empty($_POST['id_detalle']))
    {
        echo 'error';
    }else{

        $id_detalle = $_POST['id_detalle'];
        $token      = md5($_SESSION['tidAdmin']);
        
        $query_iva = mysqli_query($conexion, "SELECT tbiva_valiva FROM tbiva_tts");
        $result_iva = mysqli_num_rows($query_iva);

        $query_det_temp = mysqli_query($conexion,"CALL del_tdtec_tts($id_detalle, '$token')");
        $resultt = mysqli_num_rows($query_det_temp);

        
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
                $preciototal = round($data1['tdtec_cantid']* $data1['tdtec_precic'], 2);
                $sub_total = round($sub_total + $preciototal, 2);
                $total = round($total + $preciototal, 2);
                
                $detalleTabla .= 
                '<tr>
                    <td>'.$data1['tdtec_idprod'].'</td>
                    <td colspan="2">'.$data1['tprod_namepr'].'</td>
                    <td ALIGN="center">'.$data1['tdtec_cantid'].'</td>
                    <td ALIGN="right">'.$data1['tdtec_precic'].'</td>
                    <td ALIGN="right">'.$preciototal.'</td>
                    <td class="">
                        <a class="btn_anular link_delete" href="#" onclick="event.preventDefault();del_product_detalle('.$data1['tdtec_correl'].');"><i class="fa fa-trash"></i></a>
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

    $query_eliminar = mysqli_query($conexion, "DELETE FROM tdtec_tts WHERE tdtec_tokuse='$token'");
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
    if(empty($_POST['codproveedor'])){
        $codproveedor = 3;
    }else{
        $codproveedor = $_POST['codproveedor'];
    }

    $nofactura = $_POST['nofactura'];
    $token = md5($_SESSION['tidAdmin']);
    $usuario = $_SESSION['tidAdmin'];

    $query_p = mysqli_query($conexion, "SELECT * FROM tdtec_tts WHERE tdtec_tokuse = '$token'");
    $resultp = mysqli_num_rows($query_p);

    if($resultp > 0)
    {
        $query_procesar = mysqli_query($conexion, "CALL procesar_compra_manual($usuario, $codproveedor, '$token','$nofactura')");
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


exit;

?>