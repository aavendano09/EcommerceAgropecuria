
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const selects = document.querySelectorAll('#formulario select');


var input = new Array();
var arrInput = new Array();
i = 0;

var select = new Array();
var arrSelect = new Array();

$('input').each(function () {

input[this.name] = false;
arrInput[i] = this.name;
i++;
});

i=0;

$('select').each(function () {

	select[this.name] = false;
	arrSelect[i] = this.name;
	i++;
});

console.log(input);
console.log(select);
console.log(arrInput);
console.log(arrSelect);

const expresiones = {
	id: /^\d{1,4}$/,
	usuario: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$#!%*?&]{8,15}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/,
	correoOld: /.*/,
	telefono: /^\d{11,11}$/, // 7 a 14 numeros.
	cedula: /^(\d[0-9][0-9][0-9][0-9][0-9][0-9]|[1-3][0-9][0-9][0-9][0-9][0-9][0-9][0-9])$/, // 7 a 14 numeros.
	rif: /^\d{9,9}$/, // 7 a 14 numeros.
	tiprif: /^[a-zA-ZÀ-ÿ\d\-_,.#\/\s]+$/,
	direccion: /^[a-zA-ZÀ-ÿ\d\-_,.#\/\s]+$/,
	tipousuario: /^\d{1,3}$/,
	razon: /^[a-zA-ZÀ-ÿ\.\s]{1,50}$/,
	estado: /^\d{1,3}$/,
	fecha: /.*/,
	extranjero: /^(\d[0-9][0-9][0-9][0-9][0-9][0-9]|[1-3][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9])$/, // 7 a 14 numeros.
}


i = 0;

const validarFormulario = (e) => {

	if (!$('#'+e.target.name).prop("readonly") && !$('#'+e.target.name).prop("hidden")) {
		var iname = e.target.name
		if ((iname == 'password' || iname == 'password2') && $('#password2').length > 0) {
			validarCampo(expresiones.password, e.target, iname)
			validarPassword2();
		}else{
			validarCampo(expresiones[iname], e.target, iname)
		}
	}
		
}

function validarFormularioSubmit(campo){
	object = document.getElementById(campo)
	validarCampo(expresiones[campo], object, campo)
}

const validarCampo = (expresion, Oinput, campo) => {

	if(expresion.test(Oinput.value)){
		input[campo] = true;
		select[campo] = true;
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		

	} else {
		input[campo] = false;
		select[campo] = false;
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		
	}
}

const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('password2');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['password'] = false;
	} else {
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['password'] = true;
	}
}



inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

selects.forEach((select) => {
	select.addEventListener('change', validarFormulario);
	select.addEventListener('blur', validarFormulario);
});


formulario.addEventListener('submit', (event) => {
	event.preventDefault();

	band = true;
	
	for (let i = 0; i < arrInput.length; i++) {
		
		if (($("#"+arrInput[i]).prop('required') == false) ||  ($("#"+arrInput[i]).prop('readonly'))) {
			input[arrInput[i]] = true;
		}		
	}
	
	
	for (let i = 0; i < arrInput.length; i++) {
		if (!($("#"+arrInput[i]).prop('required') == false) && !($("#"+arrInput[i]).prop('readonly'))){

			validarFormularioSubmit(arrInput[i]);
			
		}
	}
	
	for (let i = 0; i < arrSelect.length; i++) {
		if (!($("#"+arrSelect[i]).prop('required') == false) && !($("#"+arrSelect[i]).prop('readonly'))){
			validarFormularioSubmit(arrSelect[i]);
		}
		
	}

	for (let i = 0; i < arrInput.length; i++) {
		
		if (!input[arrInput[i]]) {
			band = false;
		}
		
	}
	
	for (let i = 0; i < arrSelect.length; i++) {
		if (!select[arrSelect[i]]) {
			band = false;
		}	
	}
	

	if(band){

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 3500);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});

		$('#formulario').submit();
	} else {
		

		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}
});


function openModal(){
	$("#nuevoModal").modal('show')
  }

  $("#new").on(
	"click",
	function(){
	  $("#formulario").prop("action", modulo+"/guarda.php");
	  $("#id").prop("readonly", false);
	  $("#id").css('background', '#fafafaec');
	  $("#nuevoModalLabel").text("Agregar "+modaltitle+":");
	  formulario.reset();
	  openModal();
	}
  )

  function validRefresh(){
	for (let i = 0; i < arrInput.length; i++) {
		console.log(arrInput[i]);
		document.getElementById(`grupo__${arrInput[i]}`).classList.remove('formulario__grupo-incorrecto');
		document.querySelector(`#grupo__${arrInput[i]} i`).classList.remove('fa-times-circle');
		document.getElementById(`grupo__${arrInput[i]}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${arrInput[i]} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${arrInput[i]} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		
		
	}
	
	for (let i = 0; i < arrSelect.length; i++) {
		console.log(arrSelect[i]);
		document.getElementById(`grupo__${arrSelect[i]}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${arrSelect[i]}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${arrSelect[i]} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${arrSelect[i]} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		document.querySelector(`#grupo__${arrSelect[i]} i`).classList.remove('fa-times-circle');
		
	}


  }


	function openEdit(){
	$("#formulario").prop("action", modulo+"/actualiza.php");
    $("#nuevoModalLabel").text("Editar "+modaltitle+":");
    $("#id").prop("readonly", 'readonly');
    $("#id").prop("tabinex", '-1');
    $("#id").css('background', '#ddddddec');
	

  }