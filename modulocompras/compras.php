<?php
error_reporting(0);
   session_start();
   if(isset($_SESSION['tidAdmin'])==false){
    header("location:login.php");
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Compras</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet">
    <link href="assets/images/favicon.png" rel="icon">
    <link href="assets/images/favicon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<style>

#div_registro_cliente, #add_product_venta{
  display: none;
}

</style>

<div class="content-wrapper container">

    <h1 class="ms-3 mt-2"><i class="fas fa-cube"></i> Nueva Compra</h1>

<section id="container" class="container">
         <div class="datos_cliente">
          <div class="action_cliente">
            <h4 class="text-center">Datos del Proveedor:</h4>
            <a href="#" class="btn_new btn_new_proveedor"><i class="fas fa-plus">Nuevo Proveedor</i></a>
          </div>
         </div>

         <!-- Datos del Proveedor -->

  <div style="margin-top: 20px; margin-right: 10px;">
  <form name="form_new_cliente_venta" id="form_new_cliente_venta" class="row g-3 datos">
  <input type="hidden" name="action" value="addCliente">
  <input type="hidden" id="idproveedor" name="idproveedor" value="" required>

  <div class="col-md-3">
    <label class="form-label">RIF</label>
    <input type="text" class="form-control" name="rif_proveedor" id="rif_proveedor">
  </div>
  <div class="col-md-8">
    <label class="form-label">Razon Social</label>
    <input type="text" name="nom_proveedor" id="nom_proveedor" disabled required class="form-control">
  </div>
  <div class="col-4">
    <label for="inputAddress" class="form-label">Telefono</label>
    <input type="number" name="tel_proveedor" id="tel_proveedor" disabled required class="form-control">
  </div>
  <div class="col-7">
    <label class="form-label">Correo electronico</label>
    <input type="email" name="email_proveedor" id="email_proveedor" disabled required class="form-control">
  </div>
  <div class="col-11">
    <label class="form-label">Direccion</label>
    <input type="text" name="dir_proveedor" id="dir_proveedor" disabled required class="form-control">
  </div>
  <div id="div_registro_proveedor" class="col-12">
    <button type="submit" class=" btn btn-primary btn_save"><i class="far fa-save fa-lg"></i> Guardar</button>
  </div>
</form>
  </div>


         <!-- Datos del Vendedor-->
         <div style="margin-top: 20px;" class="datos_venta">
          <h4 class="text-center">Datos de Venta:</h4>
             <div class="row">
                  <div class="col-8">
                  <label class="form-label">No. Factura</label>
                  <input type="text" name="nofactura" id="nofactura" required class="form-control">
                  </div>
              <div class="col-4">
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
      <td><input type="text" name="txt_cod_producto" id="txt_cod_producto"></td>
      <td id="txt_descripcion">-</td>
      <td id="txt_existencia">-</td>
      <td><input type="text" name="txt_cant_producto" id="txt_cant_producto" value="0" min="1" disabled></td>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
 
   //funcion para mantener los registros en el detalle de orden de entrega

    $(document).ready(function(){
		var usuarioid = "<?php echo $_SESSION['tidAdmin'];?>";
		serchForDetalle(usuarioid);
	});

  //activa campos para registrar clientes
  $(document).ready(function () {
    $('.btn_new_proveedor').click(function(e){
      e.preventDefault();
      $('#nom_proveedor').removeAttr('disabled');
      $('#tel_proveedor').removeAttr('disabled');
      $('#email_proveedor').removeAttr('disabled');
      $('#dir_proveedor').removeAttr('disabled');
  
      $('#div_registro_proveedor').slideDown();
   
       });
    });

    //  Buscar Proveedor

   $('#rif_proveedor').keyup(function(e){
     e.preventDefault();

     var cl = $(this).val();
     var action = 'searchProveedor';

     $.ajax({
        url: 'modulocompras/ajaxcompras.php',
        type: "POST",
        async: true,
        data: {action:action,proveedor:cl},

        success: function(response)
        {
          if(response == 0){
            $('#idproveedor').val('');
            $('#nom_proveedor').val('');
            $('#tel_proveedor').val('');
            $('#email_proveedor').val('');
            $('#dir_proveedor').val('');
            //mostrar boton de Agregar
            $('.btn_new_proveedor').slideDown();
          }else{
            var data = $.parseJSON(response);
            $('#idproveedor').val(data.tprov_idprov);
            $('#nom_proveedor').val(data.tprov_Razsoc);
            $('#tel_proveedor').val(data.tprov_telepr);
            $('#email_proveedor').val(data.tprov_emailp);
            $('#dir_proveedor').val(data.tprov_direpr);
            //ocultar boton de Agregar
            $('.btn_new_proveedor').slideUp();

            //Bloque de campos
            $('#nom_proveedor').attr('disabled','disabled');
            $('#tel_proveedor').attr('disabled','disabled');
            $('#email_proveedor').attr('disabled','disabled');
            $('#dir_proveedor').attr('disabled','disabled');

            //oculta boton Guardar
            $('#div_registro_proveedor').slideUp();
          }
        },
        error: function(error){

        }
     });
   });

   //Crear Proveedor - Compras

   $('#form_new_cliente_venta').submit(function(e){
     e.preventDefault();
     $.ajax({
        url: 'modulocompras/ajaxcompras.php',
        type: "POST",
        async: true,
        data: $('#form_new_cliente_venta').serialize(),

        success: function(response)
        {
          if(response != 'error'){
            //agregar id a input hiden
            $('#idproveedor').val(response);
            //bloque campos
            $('#nom_proveedor').attr('disabled','disabled');
            $('#tel_proveedor').attr('disabled','disabled');
            $('#email_proveedor').attr('disabled','disabled');
            $('#dir_proveedor').attr('disabled','disabled');

            //ocultar boton agregar
            $('.btn_new_proveedor').slideUp();
            //oculta boton guardar
            $('#div_registro_proveedor').slideUp();

          }
          
        },
        error: function(error){

        }
     });
   });

    //Buscar producto - Compras manuales

    $('#txt_cod_producto').keyup(function(e){
     e.preventDefault();

     var producto = $(this).val();
     var action = 'infoProducto';

     $.ajax({
        url: 'modulocompras/ajaxcompras.php',
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
                 $('#txt_precio').html(info.tprod_precic);
                 $('#txt_precio_total').html(info.tprod_precic);
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
   });

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

//Agregar producto al detalla de la compra

    //AGREGAR PRODUCTO AL DETALLE

        $('#add_product_venta').click(function(e){
         e.preventDefault();
         if($('#txt_cant_producto').val() > 0){
     
             var codproducto = $('#txt_cod_producto').val();
             var cantidad = $('#txt_cant_producto').val();
             var action = 'addProductoDetalle';
     
             $.ajax({
                 url:'modulocompras/ajaxcompras.php',
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
                 url:'modulocompras/ajaxcompras.php',
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
             var codproveedor = $('#idproveedor').val();
             var nofactura = $('#nofactura').val();
            
             $.ajax({
                 url:'modulocompras/ajaxcompras.php', 
                 type:'POST',
                 async :true,
                 data: {action:action,codproveedor:codproveedor,nofactura:nofactura},
     
                 success:function(response)
                 {
                     if(response != 'error')
                     { 
                         var info = JSON.parse(response);
                         //console.log(info);

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


   //buscar detalles
   function serchForDetalle(id){
    var action = 'serchForDetalle';
    var user = id;
    $.ajax({
        url:'modulocompras/ajaxcompras.php',
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

 function del_product_detalle(tdtec_correl){
         var action = 'delProductDetalle';
         var id_detalle = tdtec_correl;
         $.ajax({
             url:'modulocompras/ajaxcompras.php',
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

</script>

</body>
</html>