<!-- Modal -->
<div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoModalLabel">Agregar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="moduloclientes/guarda.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                 <label for="nombre" class="form-label">Id:</label>
                 <input placeholder="999" onkeypress="return SoloNumeros(event, 'id', 3);" type="text" name="id" id="id" class="form-control">
            </div>
            <div class="mb-3">
                  <label for="cambio" class="form-label d-block">Cedula/Rif: </label>
                 <select name="cedrif" id="cedrif" class="form-select col-1 d-inline mx-3" required>
                  <option value="V">V</option>
                  <option value="J">J</option>
                  <option value="G">G</option>
                 </select>
                 -
                 <input placeholder="28654495" onkeypress="return CedRif(event, 'identificacion', 'cedrif');" min="1000000" type="number" name="identificacion" id="identificacion" class="form-control col-10 d-inline ml-3" required>
            </div>
            <div class="mb-3">
                 <label for="estado" class="form-label">Nombre: </label>
                 <input placeholder="Pedro Pérez" onkeypress="return SoloLetras(event, true);" type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label">Telefono: </label>
                 <input placeholder="04165026559" onkeypress="return SoloNumeros(event, 'telefono', 11);" type="text" name="telefono" id="telefono" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label">Correo electronico: </label>
                 <input onkeypress="return ValidarNotEspacios(event)" placeholder="pedro@gmail.com"type="text" name="correo" id="correo" class="form-control" required>
            </div>
            <div class="">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
               <button type="submit" id="sub" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

