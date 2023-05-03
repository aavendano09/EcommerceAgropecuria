<?php
error_reporting(0);
   session_start();
   if(isset($_SESSION['tidAdmin'])==false){
    header("location:login.php");
   }
   require_once 'validations/FormularioManual.php';
   require_once 'validations/Formulario.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ventas</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet">
    <link href="assets/images/favicon.png" rel="icon">
    <link href="assets/images/favicon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="validations/minivalid.js"></script>
    <script>
      const modulo = "moduloventas";
      const modaltitle = "Venta";
    </script>
</head>
<body>
<style>

#div_registro_cliente, #add_product_venta{
  display: none;
}

</style>

<div class="content-wrapper container">

    <h1 class="ms-3 mt-2"><i class="fas fa-cube"></i> Nueva Venta</h1>

<section id="container" class="container">
         <div class="datos_cliente">
          <div class="action_cliente">
            <h4 class="text-center">Datos del Cliente:</h4>
            <a href="#" class="btn_new btn_new_cliente"><i class="fas fa-plus">Nuevo Cliente</i></a>
          </div>
          <div class="col-12 d-flex justify-content-end">
            <a href="#" id="new" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i class="fa-solid fa-circle-plus"></i> Nuevo Producto</a>
          </div>
         </div>

         <!-- Datos del Cliente -->

  <div style="margin-top: 20px; margin-right: 10px;">
  <!-- <form name="form_new_cliente_venta" id="form_new_cliente_venta" class="row g-3 datos">
  <input type="hidden" name="action" value="addCliente">
  <input type="hidden" id="idcliente" name="idcliente" value="" required>

  <div class="col-md-2">
    <label class="form-label">tipo_rif de identificacion</label>
    <select class="form-select" name="tipo_rif" id="tipo_rif">
            <option value="">Seleccionar...</option>
            <option value="V">V</option>
            <option value="J">J</option>
            <option value="G">G</option>
    </select>
  </div>

  <div class="col-md-3">
    <label class="form-label">Cedula</label>
    <input placeholder="28654495" onkeypress="return CedRif(event, 'rif_m', 'tipo_rif');" type="text" min="1000000" class="form-control" name="rif_m" id="rif_m">
  </div>
  <div class="col-md-3">
    <label class="form-label">Nombre</label>
    <input placeholder="Pedro Pérez" onkeypress="return SoloLetras(event, true);" type="text" name="nombre_m" id="nombre_m" disabled required class="form-control">
  </div>
  <div class="col-3">
    <label for="inputAddress" class="form-label">Telefono</label>
    <input placeholder="04165026559" onkeypress="return SoloNumeros(event, 'telefono_m', 11);" type="number" name="telefono_m" id="telefono_m" disabled required class="form-control">
  </div>
  <div class="col-7">
    <label class="form-label">Correo electronico</label>
    <input onkeypress="return ValidarNotEspacios(event)" placeholder="pedro@gmail.com" type="email" name="correo_m" id="correo_m" disabled required class="form-control">
  </div>
  <div class="col-4">
    <label class="form-label">Contraseña</label>
    <input placeholder="********" onkeypress="return Pass(event)" type="text" name="password_m" id="password_m" disabled required class="form-control">
  </div>
  <div class="col-8">
    <label class="form-label">Direccion</label>
    <input placeholder="La Grita estado Táchira" type="text" name="direccion_m" id="direccion_m" disabled required class="form-control">
  </div>
  <div id="div_registro_cliente" class="col-12">
    <button type="submit" class=" btn btn-primary btn_save"><i class="far fa-save fa-lg"></i> Guardar</button>
  </div>
</form> -->


<?php
  $formulario_m = new FormularioManual("formulario_m", "formulario_m", "idcliente");
  $formulario_m->setSelInput("number", "tipo_rif", "rif_m", "Rif", "407898280", 3, "required", null, ['V','G','J']);
  $formulario_m->setInput("text", "nombre_m", "Nombre", 4, "Pedro Perez");
  $formulario_m->setInput("number", "telefono_m", "Telefono", 4, "0416848888");
  $formulario_m->setInput("email", "correo_m", "Correo Electrónico", 8, "pedro@gmail.com");
  $formulario_m->setInput("password", "password_m", "Contraseña", 4, "**********");
  $formulario_m->setInput("text", "direccion_m", "Direccion", 12, "5ta Avenida");
  $html = "<option value='1'>Activo</option>
          <option value='0'>Inactivo</option>
  ";
  $formulario_m->setButton("Guardar", "Formulario enviado exitosamente!", false, "Cerrar", 'cliente');
  $formulario_m->getRender();
?>
  </div>


         <!-- Datos del Vendedor-->
         <div style="margin-top: 20px;" class="datos_venta">
          <h4 class="text-center">Datos de Venta:</h4>
             <div class="row">
                  <div class="col-9">
                  <label class="form-label">Vendedor:</label>
                  <p><?php echo $_SESSION['username']; ?></p>
                  </div>
              <div class="col-3">
              <label class="form-label">Acciones</label>
               <div class="" id="acciones_venta">
                <a href="#" class="btn_ok text-center text-danger" id="btn_anular_venta"><i class="fas fa-ban text-danger"></i> Anular</a>
                <a style="margin-left: 10px; display: none;" href="#" class="btn_new textcenter" id="btn_facturar_venta"><i class="fas fa-edit"></i> Procesar</a>
               </div>
              </div>
             </div>
         </div>
         
         <!-- Tabla de venta manuales -->

<table style="margin-top: 20px;" class="table tbl_venta table-responsive">
  <thead>
    <tr>
      <th style="width: 100px;">Codigo</th>
      <th>Descripcion</th>
      <th>Existencia</th>
      <th style="width: 100px;">Cantidad</th>
      <th class="textright">Precio</th>
      <th class="textright">Precio Total</th>
      <th>Accion</th>
    </tr>
    <tr>
      <td><input onkeypress="return SoloNumeros(event, 'txt_cod_producto', 3)" type="number" name="txt_cod_producto" id="txt_cod_producto"></td>
      <td id="txt_descripcion">-</td>
      <td id="txt_existencia">-</td>
      <td><input type="number" onkeypress="return SoloNumeros(event, 'txt_cant_producto', 9)" name="txt_cant_producto" id="txt_cant_producto" value="0" min="1" disabled></td>
      <td id="txt_precio" class="textright">0.00</td>
      <td id="txt_precio_total" class="textright">0.00</td>
      <td> <a href="#" id="add_product_venta" class="link_add"><i class="fas fa-plus"></i> Agregar</a></td>
    </tr>
    <tr>
      <th>Codigo</th>
      <th colspan="2">Descripcion</th>
      <th style="width: 100px;">Cantidad</th>
      <th class="textright">Precio</th>
      <th class="textright">Precio Total</th>
      <th>Accion</th>
    </tr>
  </thead>
  <tbody id="detalle_venta">
    <!-- Contenido ajax -->
  </tbody>
  <tfoot id="detalle_totales">
    <!-- Contenido ajax -->
  </tfoot>
</table>
</section>
</div>

<?php
  include 'moduloproductos/nuevoModal.php';
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
input["cedula_m"] = false;

arrInput[8] = "cedula_m";


$('#tipo_rif').change(
    function(){
      $('.ident').val('');
    if ($('#tipo_rif').val()=="V") {
      $('.ident').prop('name', 'cedula_m');
      //$('.ident').prop('id', 'cedula_m');
      $('.ident').prop('placeholder', '15862175');
      $('#grupo__rif_m').prop('id', 'grupo__cedula_m');
      $('#errormsg').text('La identificacion debe poseer 7 u 8 digitos');
    }else{
      $('.ident').prop('name', 'rif_m');
     // $('.ident').prop('id', 'rif_m');
      $('#grupo__cedula_m').prop('id', 'grupo__rif_m');
      $('.ident').prop('placeholder', '407898280');
      $('#errormsg').text('La identificacion debe poseer 9 digitos');
    }
  })

$('#tipo_rif').change(function(){
    $('#rif_m').val('');
});
 
   //funcion para mantener los registros en el detalle de orden de entrega

    $(document).ready(function(){
		var usuarioid = "<?php echo $_SESSION['tidAdmin'];?>";
		serchForDetalle(usuarioid);
	});

  //activa campos para registrar clientes
  $(document).ready(function () {
    $('.btn_new_cliente').click(function(e){
      e.preventDefault();
      $('#nombre_m').removeAttr('disabled');
      $('#telefono_m').removeAttr('disabled');
      $('#correo_m').removeAttr('disabled');
      $('#password_m').removeAttr('disabled');
      $('#direccion_m').removeAttr('disabled');
  
      $('#div_registro_cliente').slideDown();
   
       });
    });

    //  Buscar Cliente

    



    
  $('#rif_m').keyup(function(){
    var tipo_rif = $('#tipo_rif').val();
    var cl = $(this).val();
    searchCliente(tipo_rif,cl);
  });

  $('#tipo_rif').change(function(){
    var tipo_rif = $(this).val();
    var cl = $('#rif_m').val();
    searchCliente(tipo_rif,cl);
  });


   function searchCliente(tipo_rif, cedula){
     var action = 'searchCliente';

    //  console.log(tipo_rif)
    //  console.log(cedula)

      $.ajax({
        url: 'moduloventas/ajaxventas.php',
        type: "POST",
        async: true,
        data: {action:action,cliente:cedula,tipo_rif:tipo_rif},

        success: function(response)
        {
          if(response == 0){
            $('#idcliente').val('');
            $('#nombre_m').val('');
            $('#telefono_m').val('');
            $('#correo_m').val('');
            $('#password_m').val('');
            $('#direccion_m').val('');
            //mostrar boton de Agregar
            $('.btn_new_cliente').slideDown();
          }else{
            var data = $.parseJSON(response);
            $('#idcliente').val(data.tclie_idclie);
            $('#nombre_m').val(data.tclie_namecl);
            $('#telefono_m').val(data.tclie_telecl);
            $('#correo_m').val(data.tclie_emailc);
            $('#password_m').val(data.tclie_passcl);
            $('#direccion_m').val(data.tclie_direcl);
            //ocultar boton de Agregar
            $('.btn_new_cliente').slideUp();

            //Bloque de campos
            $('#nombre_m').attr('disabled','disabled');
            $('#telefono_m').attr('disabled','disabled');
            $('#correo_m').attr('disabled','disabled');
            $('#password_m').attr('disabled','disabled');
            $('#direccion_m').attr('disabled','disabled');

            //oculta boton Guardar
            $('#div_registro_cliente').slideUp();
          }
        },
        error: function(error){

        }
     });
   };


   //Crear Cliente - Ventas

   $('#enviar').on('click',function(e){
     e.preventDefault();

    if(submit(input_m, arrInput_m, select_m, arrSelect_m, 'cliente')) {
      
     $.ajax({
        url: 'moduloventas/ajaxventas.php',
        type: "POST",
        async: true,
        data: $('#formulario').serialize(),

        success: function(response)
        {
            var data = $.parseJSON(response);
            console.log(data.msg);
          if(data.msg == 'exito'){
            //agregar id a input hiden
            $('#idcliente').val(response);
            //bloque campos
            $('#tipo_rif').attr('disabled','disabled');
            $('#rif_m').attr('disabled','disabled');
            $('#nombre_m').attr('disabled','disabled');
            $('#telefono_m').attr('disabled','disabled');
            $('#correo_m').attr('disabled','disabled');
            $('#password_m').attr('disabled','disabled');
            $('#direccion_m').attr('disabled','disabled');

            //ocultar boton agregar
            $('.btn_new_cliente').slideUp();
            //oculta boton guardar
            $('#div_registro_cliente').slideUp();

          }else{
            alert(data.msg);
          }
          
        },
        error: function(error){

        }
     });
    }else{
      alert("fallo")
    }
   });

   $('#txt_cod_producto').on('keyup', function(e){
      searchProduct()
   });

    //Buscar producto - Ventas manuales

    function searchProduct(){

     var producto = $('#txt_cod_producto').val();
     var action = 'infoProducto';

     $.ajax({
        url: 'moduloventas/ajaxventas.php',
        type: "POST",
        async: true,
        data: {action:action,producto:producto},

        success: function(response)
        {
          if(response != 'error'){
                 var info = JSON.parse(response);
                 $('#txt_descripcion').html(info.tprod_namepr);
                 $('#txt_existencia').html(info.tprod_cantpr);
                 $('#txt_cant_producto').val('1');
                 $('#txt_precio').html(info.tprod_preciv);
                 $('#txt_precio_total').html(info.tprod_preciv);
                 //activar cantidad producto
                 $('#txt_cant_producto').removeAttr('disabled');
                 //mostrar boton agregar
                 $('#add_product_venta').slideDown();
             }else{
                 
                 $('#txt_descripcion').html('-');
                 $('#txt_existencia').html('-');
                 $('#txt_cant_producto').val('0');
                 $('#txt_precio').html('0.000');
                 $('#txt_precio_total').html('0.000');
                 //bloquear cantidad
                 $('#txt_cant_producto').attr('disabled','disabled');
                 //ocultar boton agregar
                 $('#add_product_venta').slideUp();
             }
        },
        error: function(error){

        }
     });
   };

   //CALCULAR CANTIDADES
   $('#txt_cant_producto').keyup(function(e){
         e.preventDefault();
         var precio_total = $(this).val() * $('#txt_precio').html();
         var existencia = parseInt($('#txt_existencia').html());
         $('#txt_precio_total').html(precio_total);
     
         //oculta el boton agregar si la cantidad es menor a 1
     
         if(($(this).val()<1 || isNaN($(this).val())) || ($(this).val() >existencia) ){
             $('#add_product_venta').slideUp();
         }else{
             $('#add_product_venta').slideDown();
         }
         });

         //Agregar producto al detalla de la venta 

             //AGREGAR PRODUCTO AL DETALLE

        $('#add_product_venta').click(function(e){
         e.preventDefault();
         if($('#txt_cant_producto').val() > 0){
     
             var codproducto = $('#txt_cod_producto').val();
             var cantidad = $('#txt_cant_producto').val();
             var action = 'addProductoDetalle';
     
             $.ajax({
                 url:'moduloventas/ajaxventas.php',
                 type:'POST',
                 async :true,
                 data: {action:action, producto:codproducto, cantidad:cantidad},
                 success:function(response)
                  {
                     if(response != 'error')
                     {
                         var info = JSON.parse(response);
                         $('#detalle_venta').html(info.detalle);
                         $('#detalle_totales').html(info.totales);
     
                         $('#txt_cod_producto').val('');
                         $('#txt_descripcion').html('-');
                         $('#txt_existencia').html('-');
                         $('#txt_cant_producto').val('0');
                         $('#txt_precio').html('0.00');
                         $('#txt_precio_total').html('0.00');
                         //BLOQUEAR CANTIDAD
                         $('#txt_cant_producto').attr('disabled','disabled');
     
                         //Ocultar boton agregar
     
                         $('#add_product_venta').slideUp();
                         
                     }else{
                         console.log('no data');
                     }
                     viewProcesar();
                 },
                 error:function(error){
                 }
          
             });
         }
     });

     //anular ventas manuales

     $('#btn_anular_venta').click(function(e){
         e.preventDefault();
         
         var rows = $('#detalle_venta tr').length;
         if(rows > 0){
     
             var action = 'anularVenta';
     
             $.ajax({
                 url:'moduloventas/ajaxventas.php',
                 type:'POST',
                 async :true,
                 data: {action:action},
     
                 success:function(response)
                  {
                     console.log(response);
                     if(response != 'error')
                     {
                         location.reload();
                     }
                 },
                 error:function(error){
                 }
          
             });
         }
        });

        //Generar o procesar la Venta

     $('#btn_facturar_venta').click(function(e){ 
         e.preventDefault();
         
         var rows = $('#detalle_venta tr').length;
         if(rows > 0){
     
             var action = 'procesarVenta';
             var codcliente = $('#idcliente').val();
     
             $.ajax({
                 url:'moduloventas/ajaxventas.php', 
                 type:'POST',
                 async :true,
                 data: {action:action,codcliente:codcliente},
     
                 success:function(response)
                 {
                     if(response != 'error')
                     { 
                         var info = JSON.parse(response);
                         //console.log(info);
                         
                         generarPDF(info.tvent_fkclie,info.tvent_idvent)

                         location.reload();
                      
                     }else{
                         console.log('no data');
                     }
                 },

                 error:function(error){
                 }
          
             });
         }
        });




    //END READY...

    //BEGIN FUNCIONES 

    //generar PDF

    function generarPDF(cliente,factura){
         var ancho = 1000;
         var alto = 800;
         //calcular posicion x,y para centrar la ventana

         var x = parseInt((window.screen.width/2) - (ancho / 2));
         var y = parseInt((window.screen.height/2) - (alto / 2));
     
         $url = './factura/generaFactura.php?cl='+cliente+'&f='+factura;
         window.open($url, "Factura","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no")
     
     }

   //buscar detalles
   function serchForDetalle(id){
    var action = 'serchForDetalle';
    var user = id;
    $.ajax({
        url:'moduloventas/ajaxventas.php',
        type:'POST',
        async :true,
        data: {action:action, user:user},

        success:function(response)
         {
            if(response != 'error')
            {
             var info = JSON.parse(response);
             $('#detalle_venta').html(info.detalle);
             $('#detalle_totales').html(info.totales);
            }else{
             console.log('no data');
            }
            viewProcesar();
        },
        error:function(error){
        }
    });
}

 //eliminar registros del detalle de venta temporal

 function del_product_detalle(tdtem_correl){
         var action = 'delProductoDetalle';
         var id_detalle = tdtem_correl;
         $.ajax({
             url:'moduloventas/ajaxventas.php',
             type:'POST',
             async :true,
             data: {action:action, id_detalle:id_detalle},

             success:function(response)
              {
                 if(response != 'error')
                 {
                     var info = JSON.parse(response);
     
                      $('#detalle_venta').html(info.detalle);
                      $('#detalle_totales').html(info.totales);
     
                         $('#txt_cod_producto').val('');
                         $('#txt_descripcion').html('-');
                         $('#txt_existencia').html('-');
                         $('#txt_cant_producto').val('0');
                         $('#txt_precio').html('0.00');
                         $('#txt_precio_total').html('0.00');
                         //BLOQUEAR CANTIDAD
                         $('#txt_cant_producto').attr('disabled','disabled');
     
                         //Ocultar boton agregar
     
                         $('#add_product_venta').slideUp();
                 }else{
                     $('#detalle_venta').html('');
                     $('#detalle_totales').html('');
                 }
                 viewProcesar();
              },
             error:function(error){
             }
      
         });
     }

     //quitar/ ocultar boton de procesar
     function viewProcesar(){
         if($('#detalle_venta tr').length>0){
             $('#btn_facturar_venta').show();
         }else{
             $('#btn_facturar_venta').hide();
         }
        }
        
  $('#guardar').on('click',function(e){
      e.preventDefault();
  
      if (submit(input, arrInput, select, arrSelect, 'producto')) {
  
        
        var formData = new FormData(formulario)
        
        console.log(formData);
  
        $.ajax({
            url: 'moduloventas/guarda.php',
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            async: true,
            data: formData,
  
            success: function(response)
            {
                var data = $.parseJSON(response);
                console.log(data.msg);
              if(data.msg == 'exito'){
                $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                $("#nuevoModal").modal('hide');//ocultamos el modal
                $("#nuevoModal").modal('hide');//ocultamos el modal
                formulario.reset();
                alert("El producto fue agregado exitosamente! con el ID:"+data.cod)
                $('#txt_cod_producto').val(data.cod)
                searchProduct()
  
              }else{
                alert(data.msg);
                console.log(data.input)
                document.getElementById(`grupo__${data.input}`).classList.add('formulario__grupo-incorrecto');
                document.getElementById(`grupo__${data.input}`).classList.remove('formulario__grupo-correcto');
                document.querySelector(`#grupo__${data.input} i`).classList.add('fa-times-circle');
                document.querySelector(`#grupo__${data.input} i`).classList.remove('fa-check-circle');
                
                var position = $('#' + data.input).position();
                // scroll modal to position top
                $("#nuevoModal").scrollTop(position);
                
                //$('#nuevoModal').scrollTo('#'+data.input);
  
              }
              
            },
            error: function(error){
                alert(error);
            }
        });
      }
    });

    
function cargaPresent(id, value = ""){


let sql = "SELECT tpre_idpres, tpre_despre FROM tpre_tts INNER JOIN tprp_tts ON tpre_idpres = tprp_fkpres INNER JOIN ttpro_tme ON tprp_fktpro = ttpro_idtipp WHERE ttpro_idtipp = '"+id+"'";

if (id > 0) {
   
   
   $.ajax({
       type: "post",
       url: "moduloproductos/carga.php",
       data: {"sql": sql},
       asycn:true,
       dataType: "json",
   }).done(function(resp){
       var data = resp
       var cadena = "<option value=''>Seleccione...</option>";
       

       
       if (data.length > 0) {
           for (var i = 0; i < data.length; i++) {
            if (data[i]["tpre_idpres"] == value) {
                cadena +="<option selected='true' value='"+data[i]["tpre_idpres"]+"'>"+data[i]["tpre_despre"]+"</option>";
               
            }else{
                cadena +="<option value='"+data[i]["tpre_idpres"]+"'>"+data[i]["tpre_despre"]+"</option>";
            }

           }
           $("#presentacion").html(cadena);
       } else {
           cadena +="<option value=''>No se encontraron registros</option>";
           $("presentacion").html(cadena);
       }
   })
}else{

   $("#presentacion").html("<option value=''>Seleccione...</option>");
}

}


function cargaMedida(id){

let sql = "SELECT tmpro_descmd FROM tmpro_tme INNER JOIN tpre_tts ON tmpro_idmedi = tpre_fkmedi WHERE tpre_idpres = '"+id+"' LIMIT 1; ";

$.ajax({
    type: "post",
    url: "moduloproductos/carga.php",
    data: {"sql":sql},
    asycn:true,
    dataType: "json",
}).done(function(resp){
var data = resp


if (data.length > 0) {
        

    $("#medidas").text(data[0]['tmpro_descmd']);
} else {
    cadena +="<option value=''>No se encontraron registros</option>";
    $("presentacion").html("N/A");
}
})
}

$("#tipoproducto").on("change", function(){

idTipoProducto = $('#tipoproducto').val();

cargaPresent(idTipoProducto);

})


$("#presentacion").on("change", function(){

idPresent = $('#presentacion').val();

cargaMedida(idPresent);

})


</script>

</body>
</html>