
<?php

require_once('conexion.php');


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
        <!-- <form action="moduloproductos/guarda.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                 <label for="nombre" class="form-label">Codigo:</label>
                 <input placeholder="9999" onkeypress="return SoloNumeros(event, 'id', 4);" type="text" name="id" id="id" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="imagen" class="form-label">Imagen:</label>
                 <input type="file" name="imagen" id="imagen" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="nombre" class="form-label">Nombre:</label>
                 <input placeholder="Nombre de producto" type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="nombre" class="form-label">Descripcion:</label>
                 <input placeholder="Informacion adicional" type="text" name="descripcion" id="descripcion" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="estado" class="form-label">Presentacion:</label>
                 <input placeholder="Sacos" type="text" name="presentacion" id="presentacion" class="form-control" required>
            </div>
            <div class="form-group">
                        <label>Tipo Producto</label>
                        <select name="tipoproducto" id="tipoproducto" class="form-select" required>
                          <option value="">Seleccionar...</option>
                          <?php while($row_producto = $tipoproducto->fetch_assoc()){ ?>
                                <option value="<?php echo $row_producto['ttpro_nametp']; ?>"><?= $row_producto['ttpro_nametp'] ?></option>
                          <?php } ?>
                        </select>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label">Precio Costo:</label>
                 <input placeholder="99,99" onkeypress="return NumerosConComas(event, true);" type="text" name="preciocosto" id="preciocosto" class="form-control" required>
            </div> 
            <div class="mb-3">
                 <label for="cambio" class="form-label">Precio Venta:</label>
                 <input placeholder="69,99" onkeypress="return NumerosConComas(event, true);" type="text" name="precioventa" id="precioventa" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label">Fecha de Vencimiento:</label>
                 <input type="date" name="fechavencimiento" id="fechavencimiento" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label">Fecha de ingreso:</label>
                 <input type="date" name="fechaingreso" id="fechaingreso" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label">Cantidad:</label>
                 <input placeholder="99" onkeypress="return SoloNumeros(event, 'cantidad', 4);" type="number" name="cantidad" id="cantidad" class="form-control" required>
            </div>
            <div class="">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
               <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
            </div>
        </form> -->

<?php
  $formulario = new Formulario("moduloproductos/guarda.php", "formulario", "formulario");

  $formulario->setInput("number", "id", "ID", 12, "9999");
  $formulario->setInput("text", "nombre2", "Nombre:", 12, "Fertilizantes");
  $formulario->setImages("imagen", "Imagen:", 12);
  $formulario->setInput("text", "descripcion", "Descripcion:", 12, "Informacion adicional");
  $formulario->setSelect("tipoproducto", "Tipo Producto:", 12, null, "ttpro_tme", "ttpro_idtipp", "ttpro_nametp");
  $formulario->setSelect("presentacion", "Presentacion:", 12, null);
  $formulario->setQuantity("number", "contenidoneto", "Contenido Neto:", 12, "40");
  $formulario->setInput("number", "preciocosto", "Precio Costo:", 12, "50");
  $formulario->setInput("number", "precioventa", "Precio Venta:", 12, "80");
  $formulario->setInput("date", "fechavencimiento", "Fecha de Vencimiento:", 12, "");
  $formulario->setInput("date", "fechaingreso", "Fecha de Ingreso:", 12, "");
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