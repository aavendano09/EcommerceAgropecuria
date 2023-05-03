
<?php

require_once('conexion.php');
require_once 'validations/Formulario.php';

?>
<!-- Modal -->
<div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoModalLabel">Agregar Producto:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
<?php
  $formulario = new Formulario("moduloproductos/guarda.php", "formulario", "formulario");
  $formulario->setInput("number", "id", "ID", 12, "9999");
  $formulario->setInput("text", "nombre2", "Nombre:", 12, "Fertilizantes");
  $formulario->setImages("imagen", "Imagen:", 12);
  $formulario->setInput("text", "descripcion", "Descripcion:", 12, "Informacion adicional");
  $formulario->setSelect("tipoproducto", "Tipo Producto:", 12, null, "ttpro_tme", "ttpro_idtipp", "ttpro_nametp");
  $formulario->setSelect("presentacion", "Presentacion:", 12, null);
  $formulario->setQuantity("text", "contenidoneto", "Contenido Neto:", 12, "40");
  $formulario->setInput("text", "preciocosto", "Precio Costo:", 12, "50");
  $formulario->setInput("text", "precioventa", "Precio Venta:", 12, "80");
  $formulario->setInput("date", "fechavencimiento", "Fecha de Vencimiento:", 12, "");
  $formulario->setInput("date", "fechaingreso", "Fecha de Ingreso:", 12, "");
  $html = "<option value='1'>Activo</option>
          <option value='0'>Inactivo</option>
  ";
  $formulario->setSelect("estado", "Estado", 12, $html, null, null, null);
  $formulario->setButton("Guardar", "Formulario enviado exitosamente!", true, "Cerrar", 1, 'guardar');
   $formulario->getRender();
?>




      </div>
    </div>
  </div>
</div>