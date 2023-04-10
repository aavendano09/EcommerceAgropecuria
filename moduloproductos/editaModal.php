<?php

$sqltipoproducto = "SELECT ttpro_nametp FROM ttpro_tme";
$productos = $conexion->query($sqltipoproducto);

?>

<!-- Modal -->
<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editaModalLabel">Editar Producto:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="moduloproductos/actualiza.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
                 <label for="nombre" class="form-label">Codigo:</label>
                 <input type="text" name="id" id="id" class="form-control" readonly="readonly" required>
            </div>
            <div class="mb-3">
                 <label for="imagen" class="form-label">Imagen:</label>
                 <input type="file" name="imagen" id="imagen" readonly="readonly" class="form-control" required> 
            </div>
            <div class="mb-3">
                 <label for="nombre" class="form-label">Descripcion:</label>
                 <input type="text" name="descripcion" id="descripcion" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="estado" class="form-label">Presentacion:</label>
                 <input type="text" name="presentacion" id="presentacion" class="form-control" required>
            </div>
            <div class="form-group">
                        <label>Tipo Producto</label>
                        <select name="tipoproducto" id="tipoproducto" class="form-select" required>
                          <option value="">Seleccionar...</option>
                          <?php while($row_producto = $productos->fetch_assoc()){ ?>
                                <option value="<?php echo $row_producto['ttpro_nametp']; ?>"><?= $row_producto['ttpro_nametp'] ?></option>
                          <?php } ?>
                        </select>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label">Precio Costo:</label>
                 <input type="text" name="preciocosto" id="preciocosto" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label">Precio Venta:</label>
                 <input type="text" name="precioventa" id="precioventa" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label">Fecha de Vencimiento:</label>
                 <input type="text" name="fechavencimiento" id="fechavencimiento" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label">Fecha de ingreso:</label>
                 <input type="text" name="fechaingreso" id="fechaingreso" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label">Cantidad:</label>
                 <input type="text" name="cantidad" id="cantidad" class="form-control" required>
            </div>
            <div class="">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
               <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>