<!-- Modal -->
<div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoModalLabel">Agregar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

  <?php
    $formulario = new Formulario("moduloclientes/guarda.php", "formulario", "formulario");
    $formulario->setInput("number", "id", "ID", "9999");
    $formulario->setSelInput("number", "tiprif", "rif", "Cedula/Rif:", "407898280", 'required', 'null', ['V','J','G']);
    $formulario->setInput("text", "tiprifOld", "Tiprif", "V", '', 'hidden');
    $formulario->setInput("number", "rifOld", "Rif", "0000000000", '', 'hidden');
    $formulario->setInput("text", "nombre", "Nombre: ", "Pedro Pérez");
    $formulario->setInput("number", "telefono", "Telefono", "0416848888");
    $formulario->setInput("email", "correo", "Correo Electrónico", "pedro@gmail.com");
    $formulario->setInput("email", "correoOld", "Correo Electrónico", "pedro@gmail.com", '', 'hidden');
    $formulario->setInput("text", "direccion", "Direccion", "5ta Avenida");
    $formulario->setInput("text", "cedula", "cedula", "44444", '', 'hidden');
    $formulario->setButton("Enviar", "Formulario enviado exitosamente!", true, "Cerrar", 1);
    $formulario->getRender();
  ?>





      </div>
    </div>
  </div>
</div>

