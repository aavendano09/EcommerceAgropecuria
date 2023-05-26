<?php

include_once "../conexion.php";

$sqltipousuairo = "SELECT ttusu_descus FROM ttusu_tme";
$generos = $conexion->query($sqltipousuairo);
require_once 'validations/Formulario.php';
?>

<!-- Modal -->
<!-- <div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editaModalLabel">Editar Usuario:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">






      <?php
        // $formulario = new Formulario("modulousuarios/guarda.php", "formularioEdit", "formularioEdit");
        // $formulario->setInput("number", "idEdit", "ID", "El ID solo puede contener numeros, no puede llevar espacios, letras ni simbolos", "999");
        // $formulario->setInput("text", "usuarioEdit", "Nombre de usuario", "El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.", "Pedro Pérez");
        // $formulario->setInput("email", "correoEdit", "Correo Electrónico", "El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.", "pedro@gmail.com");
        // $formulario->setInput("password", "passwordEdit", "Contraseña", "La contraseña tiene que ser de 4 a 12 dígitos.", "********");
        // $formulario->setSelect("tipousuarioEdit", "Tipo usuario", "Debe elegir una de las opciones", "ttusu_tme", "ttusu_idtipu", "ttusu_descus");
        // $html = "<option value='1'>Activo</option>
        //         <option value='0'>Inactivo</option>
        // ";
        // $formulario->setSelect("estadoEdit", "Estado", "Debe elegir una de las opciones", null, null, null, $html);
        // $formulario->setInput("date", "fechaEdit", "Fecha Ingreso", "No se puede dejar en blanco", null);
        // $formulario->setInput("text", "direccionEdit", "Direccion", "Texto libre", "La grita");
        // $formulario->setButton("Enviar", "Formulario enviado exitosamente!", true, "Cerrar");
        // $formulario->getRender();
      ?>
 -->










<!-- 



        <form action="modulousuarios/actualiza.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
                        <label>ID</label>
                        <input type="text" name="id" id="id" class="form-control" readonly="readonly" required="required">
                    </div>
                    <div class="form-group">
                        <label>Nombre de usuario</label>
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
                        <label>Contraseña</label>
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
 -->
