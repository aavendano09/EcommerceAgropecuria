
<link rel="stylesheet" href="validations/styles.css">

<?php

include_once 'conexion.php';

class Formulario 
{
    private $inputs = '';
    private $conexion;
    private $serverDate;

    //Mensajes de error
    private $id = "<i class='fa-solid fa-xmark'> </i> Solo se pueden ingresar de 1 a 4 digitos, solo numeros sin espacios ";
    private $usuario = "<i class='fa-solid fa-xmark'> </i> Solo se permiten letras y espacios";
    private $nombre = "<i class='fa-solid fa-xmark'> </i> Solo se permiten letras y espacios";
    private $nombre2 = "<i class='fa-solid fa-xmark'> </i> Solo se permiten letras espacios y numeros";
    private $correo = "<i class='fa-solid fa-xmark'> </i> El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.";
    private $fecha = "<i class='fa-solid fa-xmark'> </i> La fecha no puede ser menor a: ";
    private $direccion = "<i class='fa-solid fa-xmark'> </i> No puede estar vacio, no se acepta ese simbolo";
    private $razon = "<i class='fa-solid fa-xmark'> </i> Solo se permiten letras y puntos";
    private $telefono = "<i class='fa-solid fa-xmark'> </i> Solo se permiten numeros de 11 digitos, sin espacios";
    private $cedula = "<i class='fa-solid fa-xmark'> </i> Debe contener minimo 7 digitos y maximo 8";
    private $password2 = "<i class='fa-solid fa-xmark'> </i> Las contraseñas no coinciden";
    private $selects= "<i class='fa-solid fa-xmark'> </i> Debes selecionar una opcion";
    private $rif= "<i class='fa-solid fa-xmark'> </i> La identificacion debe poseer 9 digitos";
    private $nro_cuenta = "
    <i class='fa-solid fa-xmark'> </i> Solo pueden ser numeros <br>
    <i class='fa-solid fa-xmark'> </i> Los 4 primeros numeros deben concidir con el codigo del banco<br>
    <i class='fa-solid fa-xmark'> </i> Debe tener 20 digitos <br>
    <i class='fa-solid fa-xmark'> </i> El numero de cuenta no puede ser solo 0";
    private $imagen = "Solo se permiten archivos jpg, png, jpeg, jfif";
    private $descripcion = "<i class='fa-solid fa-xmark'> </i> Solo se permiten letras espacios y numeros";
    private $preciocosto = "<i class='fa-solid fa-xmark'> </i> Solo se permiten numeros";
    private $precioventa = "<i class='fa-solid fa-xmark'> </i> Solo se permiten numeros";
    private $cantidad = "<i class='fa-solid fa-xmark'> </i> Solo se permiten numeros";
    private $password = 
    "La contraseña tiene que ser:<br>
    <i class='fa-solid fa-xmark'> </i> Minimo 8 caracteres<br>
    <i class='fa-solid fa-xmark'> </i> Maximo 15 caracteres<br>
    <i class='fa-solid fa-xmark'> </i> Al menos una letra mayúscula<br>
    <i class='fa-solid fa-xmark'> </i> Al menos una letra minucula<br>
    <i class='fa-solid fa-xmark'> </i> Al menos un dígito<br>
    <i class='fa-solid fa-xmark'> </i> No espacios en blanco<br>
    <i class='fa-solid fa-xmark'> </i> Al menos 1 caracter especial.<br>";
    

    public function __construct($action = '', $class, $id)
    {
        $this->serverDate = date("Y-m-d");
        $this->fecha .= $this->serverDate;
        $this->inputs .= "
        <form method='POST' action='$action' class='$class' id='$id' enctype='multipart/form-data'>
        
        ";
    }
    
    public function setHeader($title){
        $this->inputs .= "
            <div class='text-center mb-4'>
                <h3>$title</h3>
            </div>
        ";
    }

    public function setSelInput($type, $select, $input, $label, $ph, $size, $required = 'required', $display = null, $options = array()){
        $msg = $this->$input;
       
        $this->inputs .= "
            <div class='formulario__grupo mr-5 d-inline' id='grupo__$select' $display>
                <div class='formulario__grupo-input d-inline'>
                <label for='$input' class='formulario__label'>$label</label>
                    <br/>
                    <br/>
                    <select type='text' class='formulario__input col-2 d-inline' name='$select' id='$select' $required>
                    <option value=''>-</option>";
        for ($i=0; $i < count($options); $i++) { 
            $this->inputs .= "<option value='$options[$i]'>$options[$i]</option>";
        }
                        

        $this->inputs .= "</select>
                    <i class='formulario__validacion-estado fas fa-times-circle' style='bottom: 2px; right: 30px;'></i>    
                </div>
                <p class='formulario__input-error' style='position: absolute; color: transparent;'>$msg</p>
            </div>

            <div class='formulario__grupo d-inline' id='grupo__$input' $display>
                <div class='formulario__grupo-input d-inline'>
                    <input type='$type' class='formulario__input ident col-$size ml-3' style='width: 74%;' name='$input' id='$input' placeholder='$ph' $required>
                    <i class='formulario__validacion-estado fas fa-times-circle' style='bottom: 2px;'></i>
                </div>
                <p id='errormsg' class='formulario__input-error'>$msg</p>
            </div>
            <br/>
            <br/>
        ";
    }
    
    public function setInput($type, $input, $label, $size, $ph, $required = 'required', $hidden = null ){
        if (!isset($this->$input)) {
            $msg = "";
        }else{
            $msg = $this->$input;
        }
        
        
        $this->inputs .= "
            <div class='formulario__grupo' id='grupo__$input' $hidden>
                 <div class='formulario__grupo-input'>
                    <label for='$input' class='formulario__label d-inline'>$label</label>
                    <br/>
                    <br/>
                    <input type='$type' class='formulario__input col-$size' name='$input' id='$input' placeholder='$ph' $required >
                    <i class='formulario__validacion-estado fas fa-times-circle'></i>
                </div>
                <p class='formulario__input-error'>$msg</p>
                <br/>
                <br/>
            </div>
            

        ";
    }

    public function setQuantity($type, $input, $label, $size, $display = null, $required = 'required'){
        if (!isset($this->$input)) {
            $msg = "";
        }else{
            $msg = $this->$input;
        }
        $this->inputs .= "
            <div class='formulario__grupo' id='grupo__$input' $display>
                <label for='$input' class='formulario__label d-inline'>$label</label>
                <br/>
                <br/>
                <div class='input-group mb-3 formulario__grupo-input col-$size'>
                    <input type='$type' name='$input' id='$input' class='form-control formulario__input' placeholder='40' $required>
                    <i class='formulario__validacion-estado fas fa-times-circle' style='bottom: 13px; right: 145px;'></i>
                    <span id='medidas' class='input-group-text'>KILOGRAMOS</span>
                </div>
                <p class='formulario__input-error'>$msg</p>
                <br/>
            </div>

        ";
    }

    public function setImages($input, $label, $size){
        if (!isset($this->$input)) {
            $msg = "";
        }else{
            $msg = $this->$input;
        }

        $this->inputs .= "

                <div class='formulario__grupo col-$size' id='grupo__$input'>
                    <label for='$input' class='formulario__label'>$label</label>
                    <div class='d-flex flex-row justify-content-around align-items-center'>
                        <div class='p-2 col-8 align-items-center'>             
                            <div class=' formulario__grupo-input col-12 d-flex'>
                                <input type='file' class='form-control formulario__input' name='$input' id='imagen'>
                                <i class='formulario__validacion-estado fas fa-times-circle' style='bottom: 12px; right: 20px;'></i>
                            </div>
                            
                        </div>
                        <div id='img_content' class='border text-center rounded-lg p-2 '>
                            <img src='//placehold.it/50?text=IMAGE' maxwidth='200px' class='img-fluid' id='preview'/>
                        </div>
                        <p class='formulario__input-error'>$msg</p>
                    </div>
                    <br/>
                </div>

        ";
    }

    public function setSelect($input, $label, $size, $html = null, $table = null, $value = null, $option = null){
    
        $msg = $this->selects;

        $this->inputs .= "
        <div class='formulario__grupo col-$size' id='grupo__$input'>
            <div class='formulario__grupo-input'>
                <label for='$input' class='formulario__label'>$label</label>
                <br/>
                <br/>
                <select type='text' class='formulario__input col-$size ' name='$input' id='$input' required>
                <option value=''>Seleccione...</option>
                ";
        if ($table != null) {

            $conexion = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            if($conexion->connect_errno){
                
                echo "fallo la conexion a la base de datos" . $this->conexion->connect_errno;
                
                $conexion->set_charset ("utf8");
            } 
            
            $sql = "SELECT * FROM $table";
            $execute = $conexion->query($sql);
            
            while ($row = $execute->fetch_assoc()) {
                $x = $row["$value"];
                $y = $row["$option"];
                $this->inputs .= "
                <option value='$x'>$y</option>
                ";
            }
        }else{
            $this->inputs .= $html;
        }
       
       
        $this->inputs .= "</select>
            <i class='formulario__validacion-estado fas fa-times-circle' style='right='0''></i>   
            </div>
            <p class='formulario__input-error'>$msg</p>
            <br/>
            <br/>
        </div>
        ";
    }

    
    public function setHtml($html){
        $this->inputs .= $html;
    }

    public function setButton($value, $msg, $formCrud = null, $secondary = null, $id = null, $ident = null){

        if (!$formCrud) {
            $this->inputs .= "
            <br>
            <div class='formulario__grupo formulario__grupo-btn-enviar'>
                <button value='$id' type='submit' id='$ident' class='btn btn-primary btn-block mb-4 col-6'>$value</button>
                <p class='formulario__mensaje-exito' id='formulario__mensaje-exito'>$msg</p>
            </div>
            ";
        }else{
            
            $this->inputs .= "
            <br>
            <div class='formulario__grupo '>
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>$secondary</button>
                <button value='$id' type='submit' id='$ident' class='btn btn-primary'><i class='fa-solid fa-floppy-disk'></i>$value</button>
                <p class='formulario__mensaje-exito' id='formulario__mensaje-exito'>$msg</p>
            </div>
            ";

        }
        
    }

    public function setFoot($text){
        $this->inputs .= "
            <div class='text-center'>
                <p>$text</p>
            </div>
        ";
    }

    public function getRender(){
        $this->inputs .= "
            </form>
            <script src='validations/script.js'></script>
        ";

        echo $this->inputs;
    }
}

?>

<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>

