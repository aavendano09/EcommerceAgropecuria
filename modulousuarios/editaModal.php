<?php

include_once "conexion.php";

$sqltipousuairo = "SELECT ttusu_descus FROM ttusu_tme";
$generos = $conexion->query($sqltipousuairo);

?>

<!-- Modal -->
<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editaModalLabel">Editar Usuario:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="modulousuarios/actualiza.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
                        <label>ID</label>
                        <input type="text" name="id" id="id" class="form-control" readonly="readonly" required="required">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input placeholder="Pedro Peréz" onkeypress="return SoloLetras(event, true);" type="text" name="username" id="username" class="form-control" required="required" >
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input placeholder="pedro@gmail.com" onkeypress="return ValidarNotEspacios(event);" type="email" name="email" id="email" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <input placeholder="pedro@gmail.com" onkeypress="return ValidarNotEspacios(event);" type="email" name="emailOld" id="emailOld" class="form-control" hidden>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input placeholder="********" onkeypress="return ValidarNotEspacios(event);" type="password" name="password" id="password" class="form-control" required="required" >
                    </div>
                    <div class="form-group">
                        <label>Tipo Usuario</label>
                        <select name="tipousuario" id="tipousuario" class="form-select" required>
                          <option value="">Seleccionar...</option>
                          <?php while($row_genero = $generos->fetch_assoc()){ ?>
                                <option value="<?php echo $row_genero['ttusu_descus']; ?>"><?= $row_genero['ttusu_descus'] ?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <select name="estado" id="estado" class="form-select" required>
                          <option value="">Seleccionar...</option>
                          <option value="1">Activo</option>
                          <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Fecha ingreso</label>
                        <input type="date" name="fechaingreso" id="fechaingreso" class="form-control" required="required" >
                    </div>
                    <div class="form-group">
                        <label>Domicilio</label>
                        <input type="text" name="domicilio" id="domicilio" class="form-control" required="required">
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