<!-- Modal -->
<div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoModalLabel">Agregar Proveedor: </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="moduloproveedores/guarda.php" method="post" enctype="multipart/form-data">
             <div class="mb-3">
                 <label for="nombre" class="form-label">Id:</label>
                 <input placeholder="999" onkeypress="return SoloNumeros(event, 'id', 3);" type="text" name="id" id="id" class="form-control">
            </div>
            <div class="mb-3">
                 <label for="nombre" class="form-label d-block">Rif:</label>
                 <select name="tiprif" id="tiprif" class="form-select col-1 d-inline mx-3" required>
                  <option value="G">G</option>
                  <option value="J">J</option>
                 </select>
                 -
                 <input placeholder="28654495" onkeypress="return SoloNumeros(event, 'rif', 8);" type="number" min="1000000" max="35000000" name="rif" id="rif" type="text" name="rif" id="rif" class="form-control col-10 d-inline ml-3" required>
            </div>
            <div class="mb-3">
                 <label for="nombre" class="form-label">Razon Social:</label>
                 <input placeholder="Vendedor" onkeypress="return SoloLetras(event, true);" type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="estado" class="form-label">Direccion Fiscal: </label>
                 <input placeholder="5ta Avenida" type="text" name="direccion" id="direccion" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label">Telefono: </label>
                 <input placeholder="04165026559" onkeypress="return SoloNumeros(event, 'telefono', 11);" type="text" name="telefono" id="telefono" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label">Correo Electronico: </label>
                 <input placeholder="pedro@gmail.com" type="text" name="correo" id="correo" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Estado:</label>
                <select name="estado" id="estado" class="form-select" required>
                  <option value="">Seleccionar...</option>
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
                </select>
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