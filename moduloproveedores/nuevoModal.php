<!-- Modal -->
<div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoModalLabel">Agregar Proveedor: </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">







<?php
  $formulario = new Formulario("moduloproveedores/guarda.php", "formulario", "formulario");
  $formulario->setInput("number", "id", "ID", "9999");
  $formulario->setSelInput("number", "tiprif", "rif", "Rif", "407898280");
  $formulario->setInput("text", "tiprifOld", "Tiprif", "V", '', 'hidden');
  $formulario->setInput("number", "rifOld", "Rif", "0000000000", '', 'hidden');
  $formulario->setInput("text", "razon", "Razon social", "Vendedor");
  $formulario->setInput("text", "direccion", "Direccion Fiscal", "5ta Avenida");
  $formulario->setInput("number", "telefono", "Telefono", "0416848888");
  $formulario->setInput("email", "correo", "Correo Electrónico", "pedro@gmail.com");
  $formulario->setInput("email", "correoOld", "Correo Electrónico", "pedro@gmail.com", '', 'hidden');
  $html = "<option value='1'>Activo</option>
          <option value='0'>Inactivo</option>
  ";
  $formulario->setSelect("estado", "Estado", $html, null, null, null);
  $formulario->setButton("Enviar", "Formulario enviado exitosamente!", true, "Cerrar", 1);
  $formulario->getRender();
?>


      </div>
    </div>
  </div>
</div>