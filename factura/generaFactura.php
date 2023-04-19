<?php

	//print_r($_REQUEST);
	//exit;
	//echo base64_encode('2');
	//exit;
	//session_start();
	

	include_once "../conexion.php";
	require_once '../pdf/vendor/autoload.php';
	use Dompdf\Dompdf;

	if(empty($_REQUEST['cl']) || empty($_REQUEST['f']))
	{
		echo "No es posible generar la factura.";
	}else{
		$codCliente = $_REQUEST['cl'];
		$noFactura = $_REQUEST['f'];
		$anulada = '';

		$query_config   = mysqli_query($conexion,"SELECT * FROM tbiva_tme");
		$result_config  = mysqli_num_rows($query_config);
		if($result_config > 0){
			$configuracion = mysqli_fetch_assoc($query_config);
		}


		$query = mysqli_query($conexion,"SELECT f.tvent_idvent, DATE_FORMAT(f.tvent_fechav, '%d/%m/%Y') as fecha, DATE_FORMAT(f.tvent_fechav,'%H:%i:%s') as hora, f.tvent_fkclie, f.tvent_status,
												 v.tuser_userna as vendedor,
												 cl.tclie_identc, cl.tclie_namecl, cl.tclie_telecl,cl.tclie_direcl
											FROM tvenn_tts f
											INNER JOIN tuser_tme v
											ON f.tvent_uservt = v.tuser_iduser
											INNER JOIN tclic_tme cl
											ON f.tvent_fkclie = cl.tclie_idclie
											WHERE f.tvent_idvent = $noFactura AND f.tvent_fkclie = $codCliente");

		$result = mysqli_num_rows($query);
		if($result > 0){

			$factura = mysqli_fetch_assoc($query);
			$no_factura = $factura['tvent_idvent'];

			if($factura['tvent_status'] == 'Anulada'){
				
				$nombreImage =  "img/anulado.png";
				$imageBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImage));
			

				$anulada = "<img class='anulada' src='$imageBase64' alt='Anulada'>";
			}

			$query_productos = mysqli_query($conexion,"SELECT p.tprod_namepr,dt.tdven_cantpr,dt.tdven_precio,(dt.tdven_cantpr * dt.tdven_precio) as precio_total
														FROM tvenn_tts f
														INNER JOIN tdevt_tts dt
														ON f.tvent_idvent = dt.tdven_fkidvt
														INNER JOIN tprod_tme p
														ON dt.tdven_fkcodp = p.tprod_idprod
														WHERE f.tvent_idvent = $no_factura ");
			$result_detalle = mysqli_num_rows($query_productos);

			ob_start();
			// instantiate and use the dompdf class
		    include_once('factura.php');
			$html = ob_get_clean();


			$dompdf = new Dompdf();
			$dompdf->loadhtml($html);
			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('letter', 'portrait');
			// Render the HTML as PDF
			$dompdf->render();
			// Output the generated PDF to Browser
			$dompdf->stream('Orden_'.$noFactura.'.pdf',array('Attachment'=>0));

			
		}
	}
			

?>