function SoloNumeros(evt, input, max)
{
if(window.event){
keynum = evt.keyCode;
}
else{
keynum = evt.which;
}

if((keynum > 47 && keynum < 58) || keynum == 8 || keynum== 13){



    var valueBC = $('#'+input).val();

    if (valueBC.length > max-1) {
        console.log(valueBC);
        return false;
    } else {
        return true;
    }
}
else
{
alert("Ingresar solo numeros");
return false;
}
}



function SoloLetras(e, space = false)
{
key = e.keyCode || e.which;
tecla = String.fromCharCode(key).toString();
if(space){
    letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnopqrstuvwxyzáéíóú ";
} else {
    letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnopqrstuvwxyzáéíóú";
}


especiales = [8,13];
tecla_especial = false
for(var i in especiales) {
if(key == especiales[i]){
tecla_especial = true;
break;
}
}

if(letras.indexOf(tecla) == -1 && !tecla_especial)
{
alert("Ingresar solo letras");
return false;
}
}

function Especial(e)
{
key = e.keyCode || e.which;
tecla = String.fromCharCode(key).toString();
letraespecial = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnopqrstuvwxyzáéíóú.° -0123456789";

especiales = [8,13];
tecla_especial = false
for(var i in especiales) {
if(key == especiales[i]){
 tecla_especial = true;
 break;
}
}

if(letraespecial.indexOf(tecla) == -1 && !tecla_especial)
{
 alert("Simbolos especiales permitidos #°- ");
 return false;
}
}
function Especiales(e)
{
key = e.keyCode || e.which;
tecla = String.fromCharCode(key).toString();
letraespecial = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnopqrstuvwxyzáéíóú -0123456789+";

especiales = [8,13];
tecla_especial = false
for(var i in especiales) {
if(key == especiales[i]){
 tecla_especial = true;
 break;
}
}

if(letraespecial.indexOf(tecla) == -1 && !tecla_especial)
{
 alert("Simbolos especiales permitidos -+ ");
 return false;
}
}
function Especialess(e)
{
    key = e.keyCode || e.which;
tecla = String.fromCharCode(key).toString();
letraespecial = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnopqrstuvwxyzáéíóú-0123456789";

especiales = [8,13];
tecla_especial = false
for(var i in especiales) {
if(key == especiales[i]){
tecla_especial = true;
break;
}
}

if(letraespecial.indexOf(tecla) == -1 && !tecla_especial)
{
 alert("Simbolos especiales permitidos -+/_.");
 return false;
}
}

function Cedula(e)
{
    key = e.keyCode || e.which;
tecla = String.fromCharCode(key).toString();
letraespecial = "0123456789.";

especiales = [8,13];
tecla_especial = false
for(var i in especiales) {
if(key == especiales[i]){
tecla_especial = true;
break;
}
}

if(letraespecial.indexOf(tecla) == -1 && !tecla_especial)
{
 alert("Formato invalido ejemplo: 22.222.222");
 return false;
}
}

function SoloLetrasespacio(e)
{
key = e.keyCode || e.which;
tecla = String.fromCharCode(key).toString();
letras = /^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/;

especiales = [8,13];
tecla_especial = false
for(var i in especiales) {
if(key == especiales[i]){
 tecla_especial = true;
 break;
}
}

if(letras.indexOf(tecla) == -1 && !tecla_especial)
{
 alert("Ingresar solo letras");
 return false;
}
}


function ValidarNotEspacios(e)
{
key = e.keyCode || e.which;
tecla = String.fromCharCode(key).toString();
letraespecial = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnopqrstuvwxyzáéíóú@.0123456789";

especiales = [8,13];
tecla_especial = false
for(var i in especiales) {
if(key == especiales[i]){
 tecla_especial = true;
 break;
}
}

if(letraespecial.indexOf(tecla) == -1 && !tecla_especial)
{
 alert("No se permiten espacios");
 return false;
}
}