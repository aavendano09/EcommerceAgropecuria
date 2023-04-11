
<?php

require_once('conexion.php');

$sqltipoproducto = "SELECT ttpro_nametp FROM ttpro_tme";
$tipoproducto = $conexion->query($sqltipoproducto);

$sql = "SELECT tprod_idprod, tprod_fotopr, tprod_descpr, tprod_prespr, tprod_precic, tprod_preciv, tprod_fechve, tprod_fechin, tprod_cantpr,tprod_fktipp FROM tprod_tme WHERE tprod_status = 1;";
$productos = $conexion->query($sql);


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
        <form action="moduloproductos/guarda.php" method="post" enctype="multipart/form-data">
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
        </form>
      </div>
    </div>
  </div>
</div>