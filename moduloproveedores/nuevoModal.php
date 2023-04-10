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
                 <input type="text" name="id" id="id" class="form-control">
            </div>
            <div class="mb-3">
                 <label for="nombre" class="form-label">Rif:</label>
                 <input type="text" name="rif" id="rif" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="nombre" class="form-label">Razon Social:</label>
                 <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="estado" class="form-label">Direccion Fiscal: </label>
                 <input type="text" name="direccion" id="direccion" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label">Telefono: </label>
                 <input type="text" name="telefono" id="telefono" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label">Correo Electronico: </label>
                 <input type="text" name="correo" id="correo" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label">Estado: </label>
                 <input type="text" name="estado" id="estado" class="form-control" required>
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