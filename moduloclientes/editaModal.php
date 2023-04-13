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
                <label for="cambio" class="form-label d-block">Cedula/Rif: </label>
                 <select onchange="actualizaInput('ediidentificacion');" name="cedrif" id="edicedrif" class="form-select col-1 d-inline mx-3" required>
                  <option value="V">V</option>
                  <option value="J">J</option>
                  <option value="G">G/option>
                 </select>
                 -
                 <input placeholder="28654495" onkeypress="return CedRif(event, 'ediidentificacion', 'edicedrif');" min="1000000" type="number" name="identificacion" id="ediidentificacion" class="form-control col-10 d-inline ml-3" required>
                 <input  min="1000000" type="number" name="ediidentificacionHide" id="ediidentificacionHide" class="form-control d-none col-10 d-inline ml-3" >
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

