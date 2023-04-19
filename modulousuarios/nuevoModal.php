<?php

include_once "conexion.php";

$sqltipousuairo = "SELECT ttusu_idtipu, ttusu_descus FROM ttusu_tme";
$option = $conexion->query($sqltipousuairo);


 


?>

<!-- Modal -->
<div  class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoModalLabel">Agregar Usuario:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">




<?php
  $formulario = new Formulario("modulousuarios/guarda.php", "formulario", "formulario");
  $formulario->setInput("number", "id", "ID", "9999");
  $formulario->setInput("text", "usuario", "Nombre de usuario", "Pedro Pérez");
  $formulario->setInput("email", "correo", "Correo Electrónico", "pedro@gmail.com");
  $formulario->setInput("email", "correoOld", "Correo Electrónico", "pedro@gmail.com", '', 'hidden');
  $formulario->setInput("password", "password", "Contraseña",  "********");
  $formulario->setSelect("tipousuario", "Tipo usuario", null, "ttusu_tme", "ttusu_idtipu", "ttusu_descus");
  $html = "<option value='1'>Activo</option>
          <option value='0'>Inactivo</option>
  ";
  $formulario->setSelect("estado", "Estado", $html, null, null, null);
  $formulario->setInput("text", "direccion", "Direccion", "La Grita");
  $formulario->setButton("Enviar", "Formulario enviado exitosamente!", true, "Cerrar", 1);
  $formulario->getRender();
?>
       
      </div>
    </div>
  </div>
</div>