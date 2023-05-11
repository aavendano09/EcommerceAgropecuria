<?php
    

    if($_SESSION['idCliente']==true){
    $total = 0;       

        $cantProd=count($_REQUEST['id']);
    for ($i = 0; $i < $cantProd; $i++) {
        $subTotal = $_REQUEST['precio'][$i] * $_REQUEST['cantidad'][$i];
        $total = $total + $subTotal;
    }

        $idcliente = $conexion->real_escape_string($_SESSION['idCliente']);
        $estadofactura = $conexion->real_escape_string($_POST['estadofactura']);
        $tipocliente = $conexion->real_escape_string($_POST['tipocliente']);
        $tipomoneda = $conexion->real_escape_string($_POST['tipomoneda']);

        $queryVenta = "INSERT INTO tvenn_tts (tvent_fkclie,tvent_fechav,tvent_uservt,tvent_totalv,tvent_status,tvenn_tvmone)
        VALUES ('$idcliente',now(),'$tipocliente','$total','$estadofactura', '$tipomoneda');";
echo $tipocliente;
        $resVenta=mysqli_query($conexion,$queryVenta);
        $id=mysqli_insert_id($conexion);
        /*
        if($resVenta){
            echo "La venta fue exitosa con el id=".$id;
        }
        */
        $insertaDetalle="";
        $cantProd=count($_REQUEST['id']);
        for($i=0;$i<$cantProd;$i++){
            $subTotal=$_REQUEST['precio'][$i]*$_REQUEST['cantidad'][$i];
            $insertaDetalle=$insertaDetalle."('$id','".$_REQUEST['id'][$i]."','".$_REQUEST['cantidad'][$i]."','".$_REQUEST['precio'][$i]."','$subTotal'),";
            //descontar del stock

            $queryCantidad = "SELECT tprod_cantpr FROM tprod_tme WHERE tprod_idprod='".$_REQUEST['id'][$i]."';";
            $resultadoCantidad = mysqli_query($conexion, $queryCantidad);
            $rowCantidad= mysqli_fetch_assoc($resultadoCantidad);
            $cantidadstock = $rowCantidad['tprod_cantpr'];
            $cantidadpedida = mysqli_real_escape_string($conexion,$_REQUEST['cantidad'][$i]);
            $cantidadNueva = abs($cantidadstock - $cantidadpedida);
            $sqldescontar = "UPDATE tprod_tme SET tprod_cantpr='$cantidadNueva' WHERE tprod_idprod='".$_REQUEST['id'][$i]."';";
            $resultadoDescuento = mysqli_query($conexion, $sqldescontar);
        }

       
        $insertaDetalle=rtrim($insertaDetalle,",");
        $queryDetalle = "INSERT INTO tdevt_tts 
        (tdven_fkidvt, tdven_fkcodp, tdven_cantpr, tdven_precio, tdven_Subtot) VALUES 
         $insertaDetalle;";


        $resDetalle=mysqli_query($conexion,$queryDetalle);
        if($resVenta && $resDetalle){
        ?>
        <div class="row">
            <div class="col-6">
                <?php muestraRecibe($id); ?>
            </div>
            <div class="col-6">
                <?php muestraDetalle($id); ?>
            </div>
        </div>
        <?php
        borrarCarrito();
        }
    }
    function borrarCarrito(){
        $_SESSION['productosSession'] = array();
        ?>
            <script>
                $.ajax({
                    type: "post",
                    url: "ajax/borrarCarrito.php",
                    dataType: "json",
                    success: function (response) {
                        $("#badgeProducto").text("");
                        $("#listaCarrito").text("");
                    }
                });
            </script>
            
        <?php
    }
    function muestraRecibe($idVenta){
    ?>
    <table class="table">
        <thead>
            <tr>
                <th colspan="3" class="text-center">Persona que recibe:</th>
            </tr>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Direccion</th>
            </tr>
        </thead>
        <tbody>
            <?php
                global $conexion;
                $queryRecibe = "SELECT tclir_nombre, tclir_emailr, tclir_direcc 
                FROM tclre_tts 
                WHERE tclir_fkcodc='".$_SESSION['idCliente']."';";
                $resRecibe=mysqli_query($conexion,$queryRecibe);
                $row=mysqli_fetch_assoc($resRecibe);
            ?>
            <tr>
                <td><?php echo $row['tclir_nombre'] ?></td>
                <td><?php echo $row['tclir_emailr'] ?></td>
                <td><?php echo $row['tclir_direcc'] ?></td>
            </tr>
        </tbody>
    </table>
    <?php
    }
    function muestraDetalle($idVenta){
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th colspan="3" class="text-center">Detalle de venta:</th>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>SubTotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    global $conexion;

                    $queryDetalle="SELECT
                    p.tprod_namepr,
                    dv.tdven_cantpr,
                    dv.tdven_precio,
                    dv.tdven_Subtot
                    FROM
                    tvenn_tts AS v
                    INNER JOIN tdevt_tts AS dv ON dv.tdven_fkidvt = v.tvent_idvent
                    INNER JOIN tprod_tme AS p ON p.tprod_idprod = dv.tdven_fkcodp
                    WHERE
                    v.tvent_idvent = '$idVenta'";
                    $resDetalle=mysqli_query($conexion,$queryDetalle);
                    $total=0;
                    while($row=mysqli_fetch_assoc($resDetalle)){
                        $total=$total+$row['tdven_Subtot'];
                ?>
                <tr>
                    <td><?php echo $row['tprod_namepr'] ?></td>
                    <td><?php echo $row['tdven_cantpr'] ?></td>
                    <td><?php echo $row['tdven_precio'] ?></td>
                    <td><?php echo $row['tdven_Subtot'] ?></td>
                </tr>
                <?php
                    }
                ?>
                <tr>
                    <td colspan="3" class="text-right">Total:</td>
                    <td><?php echo $total; ?></td>
                </tr>

            </tbody>
        </table>
        <a class="btn btn-primary float-right m-3" target="_blank" href="imprimirOrden.php?idVenta=<?php echo $idVenta; ?>" role="button">Descargar Orden de entrega <i class="fas fa-file-pdf"></i></a>
        <a class="btn btn-warning float-right m-3" href="home.php?modulo=productos" role="button">Finalizar Compra <i class="fa fa-shopping-bag nav-icon"></i></a>
       <?php
        }
    
?>
