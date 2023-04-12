<!-- Modal -->
<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editaModalLabel">Editar datos del Proveedor: </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="moduloproveedores/actualiza.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                 <label for="nombre" class="form-label">Id:</label>
                 <input type="text" name="id" id="id" class="form-control" readonly="readonly">
            </div>
            <div class="mb-3">
            <label for="nombre" class="form-label d-block">Rif:</label>
                 <select name="tiprif" id="editiprif" class="form-select col-1 d-inline mx-3" required>
                  <option value="G">G</option>
                  <option value="J">J</option>
                 </select>
                 -
                 <input placeholder="28654455" onkeypress="return CedRif(event, 'edirif', 'editiprif');" type="number" min="100000000" name="edirif" id="edirif" class="form-control col-10 d-inline ml-3" required>
                 <input type="text" name="edirifHide" id="edirifHide" class="form-control col-10 d-none ml-3" >
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
                 <input type="text" name="correoHide" id="correoHide" class="form-control" hidden>
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