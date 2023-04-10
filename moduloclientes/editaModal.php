<!-- Modal -->
<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editaModalLabel">Editar datos del cliente: </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="moduloclientes/actualiza.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
                 <label for="nombre" class="form-label">Id:</label>
                 <input type="text" name="id" id="id" class="form-control" readonly="readonly" required>
            </div>
            <div class="mb-3">
                 <label for="nombre" class="form-label">identificacion:</label>
                 <input placeholder="28654495" onkeypress="return SoloNumeros(event, 'ediidentificacion', 8);" min="1000000" max="35000000" type="number" name="identificacion" id="ediidentificacion" class="form-control" required>
                 <input min="1000000" max="35000000" type="number" name="identificacionHide" id="ediidentificacionHide" class="form-control" hidden>
            </div>
            <div class="mb-3">
                 <label for="estado" class="form-label">Nombre: </label>
                 <input placeholder="Pedro Pérez" onkeypress="return SoloLetras(event, true);" type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label">Telefono: </label>
                 <input placeholder="04165026559" onkeypress="return SoloNumeros(event, 'editelefono', 11);" type="text" name="telefono" id="editelefono" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label">Correo electronico: </label>
                 <input placeholder="pedro@gmail.com" type="text" name="correo" id="correo" class="form-control" required>
                 <input placeholder="pedro@gmail.com" type="text" name="correoHide" id="correoHide" class="form-control" hidden>
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