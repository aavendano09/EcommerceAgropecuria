
<link rel="stylesheet" href="validations/stylesManual.css">

<?php


include_once 'conexion.php';

class FormularioManual 
{
    private $inputs = '';
    private $conexion;
    private $serverDate;
    private $inputsCounts = 0;

    //Mensajes de error
    private $id_m = "<i class='fa-solid fa-xmark'> </i> Solo se pueden ingresar de 1 a 4 digitos, solo numeros sin espacios ";
    private $usuario_m = "<i class='fa-solid fa-xmark'> </i> Solo se permiten letras y espacios";
    private $nombre_m = "<i class='fa-solid fa-xmark'> </i> Solo se permiten letras y espacios";
    private $nombre2_m = "<i class='fa-solid fa-xmark'> </i> Solo se permiten letras espacios y numeros";
    private $correo_m = "<i class='fa-solid fa-xmark'> </i> El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.";
    private $fecha_m = "<i class='fa-solid fa-xmark'> </i> La fecha no puede ser menor a: ";
    private $direccion_m = "<i class='fa-solid fa-xmark'> </i> No puede estar vacio, no se acepta ese simbolo";
    private $razon_m = "<i class='fa-solid fa-xmark'> </i> Solo se permiten letras y puntos";
    private $telefono_m = "<i class='fa-solid fa-xmark'> </i> Solo se permiten numeros de 11 digitos, sin espacios";
    private $cedula_m = "<i class='fa-solid fa-xmark'> </i> Debe contener minimo 7 digitos y maximo 8";
    private $password2_m = "<i class='fa-solid fa-xmark'> </i> Las contraseñas no coinciden";
    private $selects_m= "<i class='fa-solid fa-xmark'> </i> Debes selecionar una opcion";
    private $rif_m= "<i class='fa-solid fa-xmark'> </i> La identificacion debe poseer 9 digitos";
    private $nro_cuenta_m = "<i class='fa-solid fa-xmark'> </i> Solo se perminten 20 numeros";
    private $imagen_m = "<i class='fa-solid fa-xmark'> </i> Solo se permiten archivos jpg, png, jpeg, jfif";
    private $descripcion_m = "<i class='fa-solid fa-xmark'> </i> Solo se permiten letras espacios y numeros";
    private $preciocosto_m = "<i class='fa-solid fa-xmark'> </i> Solo se permiten numeros";
    private $precioventa_m = "<i class='fa-solid fa-xmark'> </i> Solo se permiten numeros";
    private $cantidad_m = "<i class='fa-solid fa-xmark'> </i> Solo se permiten numeros";
    private $asunto_m = "<i class='fa-solid fa-xmark'> </i> Solo se permiten letras espacios y numeros";
    private $mensaje_m = "<i class='fa-solid fa-xmark'> </i> Solo se permiten letras espacios y numeros";
    private $password_m = 
    "<i class='fa-solid fa-xmark'> </i> La contraseña tiene que ser:<br>
    <i class='fa-solid fa-xmark'> </i> Minimo 8 caracteres<br>
    <i class='fa-solid fa-xmark'> </i> Maximo 15 caracteres<br>
    <i class='fa-solid fa-xmark'> </i> Al menos una letra mayúscula<br>
    <i class='fa-solid fa-xmark'> </i> Al menos una letra minucula<br>
    <i class='fa-solid fa-xmark'> </i> Al menos un dígito<br>
    <i class='fa-solid fa-xmark'> </i> No espacios en blanco<br>
    <i class='fa-solid fa-xmark'> </i> Al menos 1 caracter especial.<br>";
    

    public function __construct($class, $id, $idrazon)
    {
        $this->serverDate = date("Y-m-d");
        $this->fecha_m .= $this->serverDate;
        $this->inputs .= "
        <form method='POST' class='$class container-fluid datos' id='$id' enctype='multipart/form-data'>
            <div class='row g-3'>
            <input type='hidden' name='action' value='addCliente' hidden>
            <input type='hidden' id='$idrazon' name='$idrazon' value='' hidden>
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
        
        <div class='col-md-4 d-flex' $display>
            <div class='formulario-m__grupo d-flex flex-column col-3' id='grupo__$select' >
                <label for='$select' class='formulario-m__label form-label pt-0'>Tipo</label>
                <div class='formulario-m__grupo-input d-inline'>
                    <select type='text' class='formulario-m__input form-control' name='$select' id='$select' $required>
                        <option value=''>-</option>";
        for ($i=0; $i < count($options); $i++) { 
            $this->inputs .= "<option value='$options[$i]'>$options[$i]</option>";
        }
                        

        $this->inputs .= "</select>
                    <i class='formulario-m__validacion-estado fas fa-times-circle''></i>    
                </div>
                <p class='formulario-m__input-error' style='position: absolute; color: transparent;'>$msg</p>
            </div>


            <div class='formulario-m__grupo col  d-flex flex-column'  id='grupo__$input' $display>
                <label for='$input' class='formulario-m__label form-label pt-0'>RIF</label>
                <div class='formulario-m__grupo-input w-100'>
                    <input type='$type' class='formulario-m__input w-100 p-3 ident form-control' style='width: 74%;' name='$input' id='$input' placeholder='$ph' $required>
                    <i class='formulario-m__validacion-estado fas fa-times-circle'></i>
            </div>
                <p id='errormsg' class='formulario-m__input-error'>$msg</p>
            </div>
        </div>

        ";
    }
    
    public function setInput($type, $input, $label, $size, $ph, $required = 'required', $hidden = null, $disabled = 'disabled'){
        if (!isset($this->$input)) {
            $msg = "";
        }else{
            $msg = $this->$input;
        }
        
        $this->inputs .= "
        <div class='col-md-$size containerInput-$this->inputsCounts'>
            <div class='formulario-m__grupo d-flex flex-column' id='grupo__$input'>
                <label for='$input' class='formulario-m__label form-label  pt-0'>$label</label>
                <div class='formulario-m__grupo-input'>
                    <input type='$type' class='formulario-m__input form-control input-$this->inputsCounts' name='$input' id='$input' placeholder='$ph' $disabled $required >
                    <i class='formulario-m__validacion-estado fas fa-times-circle'></i>
                </div>
                <p class='formulario-m__input-error'>$msg</p>
            </div>
        </div> 

        ";

        $this->inputsCounts++;
    }

    public function setQuantity($type, $input, $label, $size, $display = null){
        if (!isset($this->$input)) {
            $msg = "";
        }else{
            $msg = $this->$input;
        }
        $this->inputs .= "
        <div class='col-md-$size containerInput-$this->inputsCounts' $display>
            <div class='formulario-m__grupo' id='grupo__$input' >
                <label for='$input' class='formulario-m__label d-inline'>$label</label>

                <div class='input-group mb-3 formulario-m__grupo-input col-$size'>
                    <input type='$type' name='$input' id='$input' class='form-control formulario-m__input' placeholder='40'>
                    <i class='formulario-m__validacion-estado fas fa-times-circle' style='bottom: 13px; right: 145px;'></i>
                    <span id='medidas' class='input-group-text'>KILOGRAMOS</span>
                </div>
                <p class='formulario-m__input-error'>$msg</p>
            </div>
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

        <div class='formulario-m__grupo col-$size'  id='grupo__$input'>
            <label for='$input' class='formulario-m__label'>$label</label>
            <div class='d-flex flex-row justify-content-around align-items-center'>
                <div class='p-2 col-8 align-items-center'>             
                    <div class=' formulario-m__grupo-input col-12 d-flex'>
                        <input type='file' class='form-control formulario-m__input' name='$input' id='imagen'>
                        <i class='formulario-m__validacion-estado fas fa-times-circle' style='bottom: 12px; right: 20px;'></i>
                    </div>
                    
                </div>
                <div id='img_content' class='border text-center rounded-lg p-2 '>
                    <img src='//placehold.it/50?text=IMAGE' maxwidth='200px' class='img-fluid' id='preview'/>
                </div>
                <p class='formulario-m__input-error'>$msg</p>
            </div>
            <br/>
        </div>

        ";
    }

    public function setSelect($input, $label, $size, $html = null, $table = null, $value = null, $option = null){
    
        $msg = $this->selects_m;

        $this->inputs .= "
        <div class='col-md-$size containerInput-$this->inputsCounts'>
            <div class='formulario-m__grupo d-flex flex-column' id='grupo__$input'>
                <label   label for='$input' class='formulario-m__label form-label'>$label</label>
                <div class='formulario-m__grupo-input'>
                    <select type='text' class='formulario-m__input col-$size form-control' disabled name='$input' id='$input' required>
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
                <i class='formulario-m__validacion-estado fas fa-times-circle' style='right='0''></i>   
                </div>
                <p class='formulario-m__input-error'>$msg</p>
            </div>
        </div>
        ";
    }

    
    public function setHtml($html){
        $this->inputs .= $html;
    }

    public function setButton($value, $msg, $formCrud = null, $secondary = null, $id = null){

   
            $this->inputs .= "

            <div id='div_registro_$id' class='col-12'>
                <button type='button'id='enviar' class='btn btn-primary btn_save'><i class='far fa-save fa-lg'></i> $value</button>
                <p class='formulario-m__mensaje-exito' id='formulario-m__mensaje-exito'>$msg</p> 
            </div>
 
            ";
       
        
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
                </div>
            </form>
            <script src='validations/scriptManual.js'></script>
        ";

        echo $this->inputs;
    }
}

?>

<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>

