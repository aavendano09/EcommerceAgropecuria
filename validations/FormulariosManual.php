
<link rel="stylesheet" href="validations/stylesManual.css">

<?php

include_once 'conexion.php';

class FormularioManual 
{
    private $inputs = '';
    private $conexion;
    private $serverDate;

    //Mensajes de error
    private $id = "Solo se pueden ingresar de 1 a 4 digitos, solo numeros sin espacios ";
    private $usuario = "Solo se permiten letras y espacios";
    private $correo = "El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.";
    private $fecha = "La fecha no puede ser menor a: ";
    private $direccion = "No puede estar vacio, no se acepta ese simbolo";
    private $razon = "Solo se permiten letras y puntos";
    private $telefono = "Solo se permiten numeros de 11 digitos, sin espacios";
    private $cedula = "Debe contener minimo 7 digitos y maximo 8";
    private $password2 = "Las contraseñas no coinciden";
    private $selects= "Debes selecionar una opcion";
    private $rif= "La identificacion debe poseer 9 digitos";
    private $password = 
    "La contraseña tiene que ser:<br>
    Minimo 8 caracteres<br>
    Maximo 15 caracteres<br>
    Al menos una letra mayúscula<br>
    Al menos una letra minucula<br>
    Al menos un dígito<br>
    No espacios en blanco<br>
    Al menos 1 caracter especial.<br>";
    

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

    public function setSelInput($type, $select, $input, $label, $ph, $required = 'required', $display = null, $options = array()){
        $msg = $this->$input;
       
        $this->inputs .= "
            <div class='formulario__grupo mr-5 d-inline' id='grupo__$select' $display>
                <label for='$input' class='formulario__label'>$label</label>
                <div class='formulario__grupo-input d-inline'>
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
                    <input type='$type' class='formulario__input ident col-12 ml-3' style='width: 74%;' name='$input' id='$input' placeholder='$ph' $required>
                    <i class='formulario__validacion-estado fas fa-times-circle' style='bottom: 2px;'></i>
                </div>
                <p id='errormsg' class='formulario__input-error'>$msg</p>
            </div>
        ";
    }
    
    public function setInput($type, $input,$label, $ph, $required = 'required', $display = null){
        if (!isset($this->$input)) {
            $msg = "";
        }else{
            $msg = $this->$input;
        }
        
        
        $this->inputs .= "
            <div class='formulario__grupo' id='grupo__$input' $display>
                <label for='$input' class='formulario__label'>$label</label>
                <div class='formulario__grupo-input'>
                    <input type='$type' class='formulario__input d-block col-12' name='$input' id='$input' placeholder='$ph' $required>
                    <i class='formulario__validacion-estado fas fa-times-circle'></i>
                </div>
                <p class='formulario__input-error'>$msg</p>
            </div>
        ";
    }

    public function setSelect($input,$label, $html = null, $table = null, $value = null, $option = null){
    
        $msg = $this->selects;

        $this->inputs .= "
        <div class='formulario__grupo' id='grupo__$input'>
            <label for='$input' class='formulario__label'>$label</label>
            <div class='formulario__grupo-input'>
                <select type='text' class='formulario__input col-12' name='$input' id='$input' required>
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
            <i class='formulario__validacion-estado fas fa-times-circle'></i>   
            </div>
            <p class='formulario__input-error'>$msg</p>
        </div>
        ";
    }

    
    public function setHtml($html){
        $this->inputs .= $html;
    }

    public function setButton($value, $msg, $formCrud = null, $secondary = null, $id = null){

        if (!$formCrud) {
            $this->inputs .= "
            <br>
            <div class='formulario__grupo formulario__grupo-btn-enviar'>
                <button value='$id' type='submit' class='btn btn-primary btn-block mb-4 col-6'>$value</button>
                <p class='formulario__mensaje-exito' id='formulario__mensaje-exito'>$msg</p>
            </div>
            ";
        }else{
            
            $this->inputs .= "
            <br>
            <div class='formulario__grupo '>
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>$secondary</button>
                <button value='$id' type='submit' class='btn btn-primary'><i class='fa-solid fa-floppy-disk'></i>$value</button>
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

