<?php

session_start();

include_once "conexion.php";

// datos del cliente que recibe

$queryRecibe = "SELECT tclir_nombre, tclir_emailr, tclir_direcc 
                FROM tclre_tts 
                WHERE tclir_fkcodc='".$_SESSION['idCliente']."';";
                $resRecibe=mysqli_query($conexion,$queryRecibe);
                $rowRecibe=mysqli_fetch_assoc($resRecibe);

                // datos del cliente 

                $queryCliente = "SELECT tclie_namecl,tclie_identc, tclie_emailc, tclie_direcl, tclie_telecl
                FROM tclic_tme 
                WHERE tclie_idclie='".$_SESSION['idCliente']."';";
                $resCliente=mysqli_query($conexion,$queryCliente);
                $rowCliente=mysqli_fetch_assoc($resCliente);

                // datos de la venta

$idVenta = mysqli_real_escape_string($conexion,$_REQUEST['idVenta']);
$queryVentas = "SELECT tvent_idvent, tvent_fechav, tvent_status 
                FROM tvenn_tts 
                WHERE tvent_idvent = '$idVenta';";
                $resVentas=mysqli_query($conexion,$queryVentas);
                $rowVentas=mysqli_fetch_assoc($resVentas);

                $query_config   = mysqli_query($conexion,"SELECT * FROM tbiva_tme");
                $configuracion = mysqli_fetch_assoc($query_config);
?>

<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de entrega</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="page_pdf">
    <table id="factura_head">
        <tr>
            <td class="logo_factura">
                <div>
                    <img style="width: 250px; height: 150px;" src="images/logotipo.jpg">
                </div>
            </td>
            <td class="info_empresa">
                <div>
                    <span class="h2"><?php echo strtoupper($configuracion['tbiva_nombre']); ?></span>
                    <p><?php echo $configuracion['tbiva_razsoc']; ?></p>
                    <p><?php echo $configuracion['tbiva_diriva']; ?></p>
                    <p>RIF: <?php echo $configuracion['tbiva_rifiva']; ?></p>
                    <p>Teléfono: <?php echo $configuracion['tbiva_teliva']; ?></p>
                    <p>Email: <?php echo $configuracion['tbiva_emaili']; ?></p>
                </div>
            </td>
            <td class="info_factura">
                <div class="round">
                    <p>No. Orden: <strong><?php echo $idVenta ?></strong></p>
                    <p>Fecha: <?php echo $rowVentas['tvent_fechav']; ?></p>
                    <p>Status: <?php echo $rowVentas['tvent_status']; ?></p>
                </div>
            </td>
        </tr>
    </table>
    <table style="margin-bottom: 30px;" id="factura_cliente">
        <tr>
            <td class="info_cliente">
                <div class="round">
                    <span class="h3">Cliente</span>
                    <table class="datos_cliente">
                        <tr>
                            <td><label>Cedula:</label><p><?php echo $rowCliente['tclie_identc']; ?></p></td>
                            <td><label>Teléfono:</label> <p><?php echo $rowCliente['tclie_telecl']; ?></p></td>
                        </tr>
                        <tr>
                            <td><label>Nombre:</label> <p><?php echo $rowCliente['tclie_namecl']; ?></p></td>
                            <td><label>Dirección:</label> <p><?php echo $rowCliente['tclie_direcl']; ?></p></td>
                        </tr>
                    </table>
                </div>
            </td>

        </tr>
    </table>

    <table id="factura_detalle">
            <thead>
                <tr>
                    <th width="50px">Cant.</th>
                    <th class="textleft">Descripción</th>
                    <th class="textright" width="150px">Precio Unitario.</th>
                    <th class="textright" width="150px"> Precio Total</th>
                </tr>
            </thead>
            <tbody id="detalle_productos">

            <?php
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
                    <td class="textcenter"><?php echo $row['tdven_cantpr']; ?></td>
                    <td><?php echo $row['tprod_namepr']; ?></td>
                    <td class="textright"><?php echo $row['tdven_precio']; ?></td>
                    <td class="textright"><?php echo $total; ?></td>
                </tr>
            <?php
                    }
                
            ?>
            </tbody>
            <tfoot id="detalle_totales">
                <tr>
                    <td colspan="3" class="textright"><span>SUBTOTAL $.</span></td>
                    <td class="textright"><span><?php echo $total; ?></span></td>
                </tr>
                <tr>
                    <td colspan="3" class="textright"><span>TOTAL $.</span></td>
                    <td class="textright"><span><?php echo $total; ?></span></td>
                </tr>
        </tfoot>
    </table>
    <div>
    <h4 class="label_gracias" style="float: left;">Firma del Cliente:</h4>
    <h4 class="label_gracias" style="float: right;">Sello de la empresa:</h4>
    <br>
    <br>
    </div>
    <div>
        <p class="nota">Amigo productor, si presenta alguna inquietud con su orden de entrega, <br>pongase en contacto al 04147166765/02772917101</p>
        <h4 class="label_gracias">¡Gracias por su compra!</h4>

    </div>

</div>
</body>
<?php $html= ob_get_clean(); ?>
<?php

include_once "dompdf/autoload.inc.php";
use Dompdf\Dompdf;

$pdf = new Dompdf();
$pdf->loadHtml($html);
$pdf->setPaper("A4", "landscape");
$pdf->render();
$pdf->stream('Orden_'.$rowVentas['tvent_idvent'].'.pdf');
?>
</html>
