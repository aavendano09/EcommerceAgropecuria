<!-- Modal -->
<div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoModalLabel">Agregar medida:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        



<?php
  $formulario = new Formulario("modulopresentaciontipoproducto/guarda.php", "formulario", "formulario");
  $formulario->setInput("number", "id", "ID", 12, "9999");
  $formulario->setSelect("tipoproducto", "Tipo producto:", 12, null, "ttpro_tme", "ttpro_idtipp", "ttpro_nametp");
  $formulario->setSelect("presentacion", "Presentacion:", 12, null, "tpre_tts", "tpre_idpres", "tpre_despre");
  $html = "<option value='1'>Activo</option>
          <option value='0'>Inactivo</option>
  ";
  $formulario->setSelect("estado", "Estado", 12, $html, null, null, null);
  $formulario->setButton("Enviar", "Formulario enviado exitosamente!", true, "Cerrar", 1);
  $formulario->getRender();
?>




      </div>
    </div>
  </div>
</div>