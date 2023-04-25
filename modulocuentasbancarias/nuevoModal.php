<!-- Modal -->
<div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoModalLabel">Agregar cuenta bancaria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


<?php
  $formulario = new Formulario("modulocuentasbancarias/guarda.php", "formulario", "formulario");
  $formulario->setInput("number", "id", "ID", "9999");
  $formulario->setInput("text", "nombre", "Nombre: ", "Banco de venezuela");
  $formulario->setInput("number", "nro_cuenta", "Numero de cuenta:", "01029999999999999999");
  $formulario->setInput("number", "nro_cuentahide", "Numero de cuenta:", "01029999999999999999", '', 'hidden');
  $formulario->setSelInput("number", "tiprif", "rif", "Rif", "407898280", "required", null, ['V','J']);
  $html = "<option value='Ahorro'>Ahorro</option>
          <option value='Corriente'>Corriente</option>
  ";
  $formulario->setSelect("tipo_cuenta", "Tipo de cuentas", $html, null, null, null);
  $formulario->setButton("Enviar", "Formulario enviado exitosamente!", true, "Cerrar", 1);
  $formulario->getRender();
?>




      </div>
    </div>
  </div>
</div>