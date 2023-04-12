<?php

include_once "conexion.php";

$sqlmonedas = "SELECT tmone_idmone, tmone_namemo FROM tmone_tme WHERE tmone_status = '1'";
$monedas = $conexion->query($sqlmonedas);

$consulta = "SELECT ttusu_idtipu, ttusu_descus FROM ttusu_tme WHERE ttusu_idtipu='03';";
$clientes = $conexion->query($consulta);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasarela de Terminos y Condiciones</title>
</head>
<body>

<div class="container-fluid">

<form action="home.php?modulo=ordendeentrega" method="post">
<table style="margin: 10px;" class="table table-bordered border-primary table-striped table-inverse" id="tablaPasarela" >
    <thead class="thead-inverse">
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<div style="margin: 10px;" class="mt-3">
     <h4>Terminos y condiciones</h4>
     La emprese se didica a la venta directa de productos a los agricultores, prohibida la reventa de nuestros productos ya que de ser asi caeran las consecuencias de las autoridades sobre ustedes amigos agricultores, ya que estos productos deben ser utilizados estrictamente para fines agropecuarios, para asi garantizar la soberania alimentaria del pais.
     <div class="form-check">
        <label class="form-check-label mt-3 mb-3">
            <input type="checkbox" class="form-check-input" name="" id="" value="" required>
            Acepto los terminos y condiciones
        </label>
     </div> 
</div>

<div class="d-flex justify-content-around">
  <div class="col-md-3 position-relative mb-3">
    <label for="validationTooltip04" class="form-label">Seleccione el tipo de moneda a pagar al momento de retirar:</label>
    <select class="form-select" id="validationTooltip04" name="tipomoneda" required>
      <option selected disabled value="">Seleccione amigo agricultor</option>
      <?php while($row_moneda = $monedas->fetch_assoc()){ ?>
            <option value="<?php echo $row_moneda['tmone_idmone']; ?>"><?= $row_moneda['tmone_namemo'] ?></option>
      <?php } ?>
    </select>
  </div>


  
  <div class="col-md-3 position-relative mb-3">
    <p class="fw-bolder">Amigo productor selecciona la opcion predeterminada ya que su compra sera cancelada al momento de retirar el producto...</p>
    
    <select class="form-select" id="validationTooltip04" name="estadofactura" required>
      <option selected disabled value="">Seleccione por favor el estado de su compra:</option>
      <option>Pendiente por pagar al momento de retirar</option>
    </select>
  </div>

  <div class="col-md-3 position-relative mb-3">
    <p class="fw-bolder">Amigo productor selecciona la opcion predeterminada ya que eres un usuario tipo cliente...</p>
    <label for="validationTooltip04" class="form-label">Seleccione el tipo de usuario:</label>
    <select class="form-select" id="validationTooltip04" name="tipocliente" required>
      <option selected disabled value="">Seleccione la opcion de cliente:</option>
      <option value="875">Cliente</option>
    </select>
  </div>
</div>
  
<div class="d-flex justify-content-between mt-5">
   <a style="margin-left: 10px; margin-bottom: 10px;" class="btn btn-warning" href="home.php?modulo=envio" role="button">Regresar a Datos de envio</a>
   <button style="margin-right: 10px;" type="submit" class="btn btn-primary float-right">Generar orden de entrega</button>
</div>

</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>