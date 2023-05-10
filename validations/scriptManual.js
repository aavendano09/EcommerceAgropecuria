const formulario_m = document.getElementById('formulario_m');
const inputs_m = document.querySelectorAll('#formulario_m input');
const factura = document.querySelectorAll('#nofactura');
const selects_m = document.querySelectorAll('#formulario_m select');

var input_m = new Array();
var arrInput_m = new Array();
i = 0;

var select_m = new Array();
var arrSelect_m = new Array();

$('#formulario_m input').each(function () {
input_m[this.name] = false;
arrInput_m[i] = this.name;
i++;
});

i=0;

$('#formulario_m select').each(function () {

	select_m[this.name] = false;
	arrSelect_m[i] = this.name;
	i++;
});

console.log(input_m);
console.log(select_m);
console.log(arrInput_m);
console.log(arrSelect_m);

const expresiones_m = {
	id_m: /^\d{1,4}$/,
	usuario_m: /^[a-zA-ZÀ-ÿ\s]{3,40}$/, // Letras y espacios, pueden llevar acentos.
	nombre_m: /^[a-zA-ZÀ-ÿ\s]{3,40}$/, // Letras y espacios, pueden llevar acentos.
	nombre2_m: /^([a-zA-Z0-9_. ,-]){1,50}$/, // Letras y espacios, pueden llevar acentos.
	descripcion_m: /^([a-zA-Z0-9_. ,-]){1,50}$/,
	mensaje_m: /^([a-zA-Z0-9_. ,-]){1,50}$/,
	asunto_m: /^([a-zA-Z0-9_. ,-]){1,30}$/,
	password_m: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$#!%*?&]{8,15}$/, // 4 a 12 digitos.
	correo_m: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/,
	correoOld_m: /.*/,
	telefono_m: /^\d{11,11}$/, // 7 a 14 numeros.
	cedula_m: /^\d{7,8}$/,
	rif_m: /^\d{9,9}$/, // 9 a 9 numeros.
	tipo_rif: /^[a-zA-ZÀ-ÿ\d\-_,.#\/\s]+$/,
	direccion_m: /^([a-zA-ZÀ-ÿ0-9#_. ,-]){1,60}$/,
	tipousuario_m: /^\d{1,3}$/,
	razon_m: /^[a-zA-ZÀ-ÿ\.\s]{1,50}$/,
	estado_m: /^\d{1,3}$/,
	fecha_m: /^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/,
	extranjero_m: /^(\d[0-9][0-9][0-9][0-9][0-9][0-9]|[1-3][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9])$/, // 7 a 14 numeros.
	nro_cuenta_m: /^\d{20,20}$/,
	tipo_cuenta_m: /^[a-zA-Z\s]{3,40}$/,
	imagen_m: /(png|jpg|wepg|jpeg|jfif)$/,
	ara_m: /(^$)|\b(png|jpg|wepg|jpeg|jfif)\b/,
	cantidad_m: /^\d{1,4}$/,
	preciocosto_m: /[0-9,]+[^.]/,
	precioventa_m: /[0-9,]+[^.]/,
	fechavencimiento_m: /^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/,
	fechaingreso_m: /^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/,
	tipoproducto_m: /^\d{1,3}$/,
	presentacion_m: /^\d{1,3}$/,
}
$('#fechaingreso').on('change', function(){

	console.log($('#fechaingreso').val())
})

i = 0;

const validarFormulario_m = (e) => {

	if (!$('#'+e.target.name).prop("readonly") && !$('#'+e.target.name).prop("hidden")) {
		var iname = e.target.name
		if ((iname == 'password' || iname == 'password2') && $('#password2').length > 0) {
			validarCampo_m(expresiones_m.password, e.target, iname)
			validarPassword2_m();
		}else{
			validarCampo_m(expresiones_m[iname], e.target, iname)
		}
	}
		
}

function validarFormularioSubmit_m(campo){
	object = document.getElementById(campo)
	validarCampo_m(expresiones_m[campo], object, campo)
}

const validarCampo_m = (expresion, Oinput, campo) => {
	console.log(Oinput);
	if(expresion.test(Oinput.value)){
		input_m[campo] = true;
		select_m[campo] = true;
		//console.log(input_m[campo]);
		document.getElementById(`grupo__${campo}`).classList.remove('formulario-m__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario-m__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario-m__input-error`).classList.remove('formulario-m__input-error-activo');
		

	} else {
		input_m[campo] = false;
		select_m[campo] = false;
		//console.log(input_m[campo]);
		document.getElementById(`grupo__${campo}`).classList.add('formulario-m__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario-m__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario-m__input-error`).classList.add('formulario-m__input-error-activo');
		
	}
}

const validarPassword2_m = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('password2');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__password2`).classList.add('formulario-m__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.remove('formulario-m__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario-m__input-error`).classList.add('formulario-m__input-error-activo');
		campos['password'] = false;
	} else {
		document.getElementById(`grupo__password2`).classList.remove('formulario-m__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.add('formulario-m__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario-m__input-error`).classList.remove('formulario-m__input-error-activo');
		campos['password'] = true;
	}
}

$('#correo_m').keyup(function(){
	let string = $('#correo_m').val();
	$('#correo_m').val(string.replace(/ /g, ""));
})

//$('#imagen').addClass("form-control");
$('#imagen').prop("accept", "image/png, .jpeg, .jpg, image/gif, .jfif");
$('#imagen').prop("required", "false");

factura.forEach((input) => {
	input.addEventListener('keyup', validarFormulario_m);
	input.addEventListener('blur', validarFormulario_m);
});

inputs_m.forEach((input) => {
	input.addEventListener('keyup', validarFormulario_m);
	input.addEventListener('blur', validarFormulario_m);
});

inputs_m.forEach((input) => {
	input.addEventListener('change', validarFormulario_m);
	input.addEventListener('blur', validarFormulario_m);
});

selects_m.forEach((select) => {
	select.addEventListener('change', validarFormulario_m);
	select.addEventListener('blur', validarFormulario_m);
});


function submit(input, arrInput, select, arrSelect, form = null) {

	// console.log(input)
	// console.log(arrInput)
	// console.log(select)
	// console.log(arrSelect)
	band = true;
	
	//console.log(input)
	for (let i = 0; i < arrInput.length; i++) {
		
		if ( (($("#"+arrInput[i]).prop('required') == false) ||  ($("#"+arrInput[i]).prop('readonly')))  ) {
			//console.log(arrInput[i]+" "+"input")
			input[arrInput[i]] = true;
		}		
	}

	
	
	//console.log(input)
	for (let i = 0; i < arrInput.length; i++) {
		console.log(arrInput[i]+"input")
		if ( !($("#"+arrInput[i]).prop('required') == false) && ($("#"+arrInput[i]).length > 0) && !(($("#"+arrInput[i]).prop('required') == false)) ){
			//console.log(arrInput[i]+" "+"input")
			if ( $("#"+arrInput[i]).attr("name") === "ara") {
				input['imagen']=true;
				if (form == 'proveedor' || form == 'cliente') {
					//console.log(arrInput[i]+" "+"input")
					validarFormularioSubmit_m(arrInput[i]);					
				}else{
					validarFormularioSubmit(arrInput[i]);	
				}
			}else{
				//console.log(arrInput[i]+" "+"input")
				if (form == 'proveedor' || form == 'cliente') {
					console.log(arrInput[i]+" "+"input")
					validarFormularioSubmit_m(arrInput[i]);					
				}else{
					validarFormularioSubmit(arrInput[i]);	
				}
			}
			
			
		}
	}
	
	for (let i = 0; i < arrSelect.length; i++) {
		if (!($("#"+arrSelect[i]).prop('required') == false) && !($("#"+arrSelect[i]).prop('readonly'))){
			//console.log(arrSelect[i]+" "+"select")
			if (form == 'proveedor' || form == 'cliente') {
				validarFormularioSubmit_m(arrSelect[i]);					
			}else{
				validarFormularioSubmit(arrSelect[i]);	
			}
		}
		
	}

	for (let i = 0; i < arrInput.length; i++) {
		//console.log(input[arrInput[i]] + arrInput[i])
		if (!input[arrInput[i]] &&  $("#"+arrInput[i]).length > 0) {
			//console.log(arrInput[i])
			band = false;
		}
		
	}
	
	for (let i = 0; i < arrSelect.length; i++) {
		//console.log(!input[arrSelect[i]])
		if (!select[arrSelect[i]]) {
			band = false;
		}	
		//console.log(band+"select")
	}
	

	if(band){

		document.getElementById('formulario-m__mensaje-exito').classList.add('formulario-m__mensaje-exito-activo');
		
		setTimeout(() => {
			document.getElementById('formulario-m__mensaje-exito').classList.remove('formulario-m__mensaje-exito-activo');
		}, 3500);

		document.querySelectorAll('.formulario-m__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario-m__grupo-correcto');
		});

		return true;

		$('#formulario-m').submit();
	} else {
		
		document.getElementById('formulario-m__mensaje').classList.add('formulario-m__mensaje-activo');
		
		return false;
	}
}


function openModal(){
	$("#nuevoModal").modal('show')
  }

  $("#new").on(
	"click",
	function(){
		$('body').addClass('modal-open');
		$('#preview').attr('src', "//placehold.it/50?text=IMAGE").fadeIn('slow');
		formulario_m.reset();
		$("#formulario-m").prop("action", modulo+"/guarda.php");
		$("#id").prop("readonly", false);
		$("#id").css('background', '#fafafaec');
		$("#nuevoModalLabel").text("Agregar "+modaltitle+":");
		openModal();
		validRefresh();
	}
  )


  function validRefresh(){
	
		
	$(".formulario-m__grupo-incorrecto").removeClass('formulario-m__grupo-incorrecto')
	$(".fa-times-circle").removeClass('fa-times-circle')
	$(".formulario-m__grupo-correcto").removeClass('formulario-m__grupo-correcto')
	$(".fa-check-circle").removeClass('fa-check-circle')
	$(".formulario-m__input-error-activo").removeClass('formulario-m__input-error-activo')
	


  }


	function openEdit(){
	$('#preview').attr('src', "//placehold.it/50?text=IMAGE").fadeIn('slow');
	$("#formulario-m").prop("action", modulo+"/actualiza.php");
    $("#nuevoModalLabel").text("Editar "+modaltitle+":");
    $("#id").prop("readonly", 'readonly');
    $("#id").prop("tabinex", '-1');
    $("#id").css('background', '#ddddddec');
  }


  


$('#guardar').prop('type', 'button');
$('.formulario').prop('id', 'hola');
