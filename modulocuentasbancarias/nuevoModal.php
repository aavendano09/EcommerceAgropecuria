<!-- Modal -->
<div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoModalLabel">Agregar cuenta bancaria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="modulocuentasbancarias/guarda.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                 <label for="nombre" class="form-label">Id:</label>
                 <input placeholder="999" onkeypress="return SoloNumeros(event, 'id', 3);" type="text" name="id" id="id" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="nombre" class="form-label">Nombre:</label>
                 <input placeholder="Banco de Venezuela" onkeypress="return SoloLetras(event, true);" type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="numero" class="form-label">Numero de cuenta: </label>
                 <input placeholder="01029999999999999999" onkeypress="return SoloNumeros(event, 'numero', 20);"  type="number"  name="numero" id="numero" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="cambio" class="form-label d-block">Cedula/Rif: </label>
                 <select name="cedrif" id="cedrif" class="form-select col-1 d-inline mx-3" required>
                  <option value="V">V</option>
                  <option value="J">J</option>
                 </select>
                 -
                 <input placeholder="28654495" onkeypress="return CedRif(event, 'identificacion', 'cedrif');" type="number" min="1000000" name="identificacion" id="identificacion" class="form-control  col-10 d-inline ml-3" required>
            </div>

            <div class="form-group">
                <label>Tipo Cuenta:</label>
                <select name="tipocuenta" id="tipocuenta" class="form-select" required>
                  <option value="">Seleccionar...</option>
                  <option value="Ahorro">Ahorro</option>
                  <option value="Corriente">Corriente</option>
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