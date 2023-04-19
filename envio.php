<?php

if (isset ($_SESSION['idCliente'])){
    if(isset($_REQUEST['guardar'])){
        $nombreCli=$_REQUEST['nombreCli'];
        $emailCli=$_REQUEST['emailCli'];
        $direccionCli=$_REQUEST['direccionCli'];
        $queryCli="UPDATE tclic_tme set tclie_namecl='$nombreCli',tclie_emailc='$emailCli',tclie_direcl='$direccionCli' where tclie_idclie='".$_SESSION['idCliente']."' ";
        $resCli=mysqli_query($conexion,$queryCli);

        $nombreRec=$_REQUEST['nombreRec'];
        $emailRec=$_REQUEST['emailRec'];
        $direccionRec=$_REQUEST['direccionRec'];
        $queryRec="INSERT INTO tclre_tts (tclir_nombre,tclir_emailr,tclir_direcc,tclir_fkcodc) VALUES ('$nombreRec','$emailRec','$direccionRec','".$_SESSION['idCliente']."')
        ON DUPLICATE KEY UPDATE
        tclir_nombre='$nombreRec',tclir_emailr='$emailRec',tclir_direcc='$direccionRec'; ";
        $resRec=mysqli_query($conexion,$queryRec);
        if($resCli && $resRec){
            echo '<meta http-equiv="refresh" content="0; url=home.php?modulo=pasarela" />';
        }
        else{
?>

<div class="alert alert-danger" role="alert">
     <strong>Error</strong>
</div>

<?php
        }
    }

    $queryCli="SELECT tclie_namecl,tclie_emailc,tclie_direcl from tclic_tme where tclie_idclie='".$_SESSION['idCliente']."';";
    $resCli=mysqli_query($conexion,$queryCli);
    $rowCli=mysqli_fetch_assoc($resCli);

    $queryRec="SELECT tclir_nombre,tclir_emailr,tclir_direcc from tclre_tts where tclir_fkcodc='".$_SESSION['idCliente']."';";
    $resRec=mysqli_query($conexion,$queryRec);
    $rowRec=mysqli_fetch_assoc($resRec);


?>

<form method="post">
<div class="container mt-3">
    <div class="row">
    <div class="col-6">
            <h3>Datos del Cliente</h3>
             <div class="form-group">
                  <label for="">Nombre</label>
                  <input placeholder="Pedro Peréz" onkeypress="return SoloLetras(event, true);" type="text" name="nombreCli" id="nombreCli" class="form-control" value="<?php echo $rowCli['tclie_namecl'] ?> " disabled>
             </div>
             <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" name="emailCli" id="emailCli" class="form-control" readonly="readonly" value="<?php echo $rowCli['tclie_emailc'] ?>">
             </div>
             <div class="form-group">
                  <label for="">Direccion</label>
                  <textarea disabled placeholder="Ubicacion especifica" name="direccionCli" id="direccionCli" class="form-control" row="3"><?php echo $rowCli['tclie_direcl'] ?></textarea>
             </div>
         </div>
        <div class="col-6">
            <h3>Datos de quien recibe</h3>
             <div class="form-group">
                  <label for="">Nombre</label>
                  <input placeholder="Pedro Peréz" onkeypress="return SoloLetras(event, true);" type="text" name="nombreRec" id="nombreRec" class="form-control" value="">
             </div>
             <div class="form-group">
                  <label for="">Email</label>
                  <input placeholder="pedro@gmail.com" type="email" type="email" name="emailRec" id="emailRec" class="form-control" value="">
             </div>
             <div class="form-group">
                  <label for="">Direccion</label>
                  <textarea placeholder="Ubicacion especifica" name="direccionRec" id="direccionRec" class="form-control" row="3"></textarea>
             </div>
             <div class="form-check">
                  <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="jalar">
                       Jalar Datos del Cliente
                  </label>
             </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-between mt-5">
<a style="margin-left: 10px;" class="btn btn-warning" href="home.php?modulo=carrito" role="button">Regresar al carrito</a>
<button style="margin-right: 10px;" type="submit" class="btn btn-primary float-right" name="guardar" value="guardar">Confirmar Datos de envio</button>
</div>
</form>

<br>
<br>

<?php
}
else{
?>

<div class="mt-5 mb-5 text-center">
    Debe <a href="logincliente.php">loguearse</a> o <a href="registrocliente.php">registrarse</a>
</div>

<?php

}
    
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
