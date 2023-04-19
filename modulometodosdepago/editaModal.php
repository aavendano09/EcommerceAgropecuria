<!-- Modal -->
<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editaModalLabel">Editar metodo de pago</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="modulometodosdepago/actualiza.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                 <label for="nombre" class="form-label">Id:</label>
                 <input type="text" name="id" id="id" class="form-control" readonly="readonly" required>
            </div>
            <div class="mb-3">
                 <label for="nombre" class="form-label">Nombre:</label>
                 <input placeholder="Efectivo" onkeypress="return SoloLetras(event, true);" type="text" name="nombre" id="nombre" class="form-control" required>
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