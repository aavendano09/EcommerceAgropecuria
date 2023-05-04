<?php  require_once 'validations/FormularioManual.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Industro - Industrial HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

     <!-- Favicon -->
     <link href="fronted/img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap"
    rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="fronted/lib/animate/animate.min.css" rel="stylesheet">
<link href="fronted/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="fronted/css/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="fronted/css/style.css" rel="stylesheet">


</head>

<body>

<style>

  .fondocontacto{
    background-image: 
    url(imagenes/contacto.png)
    ;
    width: 1000px;
    background-repeat: no-repeat;
  }


</style>


    <!-- Page Header Start -->
    <div class="container-fluid fondocontacto py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-info animated slideInRight">Contactanos</h1>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 justify-content-center mb-5">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light text-center h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                            <i class="fa fa-phone-alt fa-2x text-primary"></i>
                        </div>
                        <h4 class="mb-3">Numero de Telefono</h4>
                        <p class="mb-2">+58 4147166765</p>
                        <p class="mb-4">+58 4247004686</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light text-center h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                            <i class="fa fa-envelope-open fa-2x text-primary"></i>
                        </div>
                        <h4 class="mb-3">Correo Electronico</h4>
                        <p class="mb-2">ferreagro.elagricultor@gmail.com</p>
                        <p class="mb-4">elagricultor@gmail.com</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light text-center h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                            <i class="fa fa-map-marker-alt fa-2x text-primary"></i>
                        </div>
                        <h4 class="mb-3">Numero de oficina</h4>
                        <p class="mb-2">0277 4110926</p>
                        <p class="mb-4">0277 2917101</p>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <iframe class="w-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15798.814384910014!2d-71.9858230309944!3d8.131628398396078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e66819540a56f3f%3A0x9730a2d295f7dce!2sLa%20Grita%205022%2C%20T%C3%A1chira!5e0!3m2!1ses!2sve!4v1674879331901!5m2!1ses!2sve" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" frameborder="0" style="min-height: 450px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0">
                        </iframe>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="fw-medium text-uppercase text-primary mb-2">Contactanos</p>
                    <h1 class="display-5 mb-4">Si tienes alguna consulta, no dude en contactarnos</h1>
                    <p class="mb-4"> Llena el siguiente formulario y enseguida te atenderemos amigo agricultor.</p>
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                                    <i class="fa fa-phone-alt text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h6>Telefono:</h6>
                                    <span>+58 4147166765</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                                    <i class="fa fa-envelope text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h6>Email:</h6>
                                    <span>elagricultor@gmail.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <!-- <form action="https://formsubmit.co/ferreagro.elagricultor@gmail.com" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input onkeypress="return SoloLetras(event, true);" type="text" class="form-control" name="name" id="name" placeholder="Su nombre" required>
                                    <label for="name">Su Nombre</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input onkeypress="return SoloNumeros(event, 'telefono', 11)" type="number" class="form-control" name="telefono" id="telefono" placeholder="Su Apellido" required>
                                    <label for="apellido">Su Telefono</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                    <label for="email">Correo Electronico</label>
                                </div>
                            </div>
                            <div class="form-floating">
                                    <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto" required>
                                    <label for="name">Asunto</label>
                                </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Escriba su mensaje" name="mensaje" id="mensaje"
                                        style="height: 150px" required></textarea>
                                    <label for="message">Mensaje</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-5" type="submit" name="enviar">Enviar Mensaje</button>
                            </div>
                        </div>
                    </form> -->
                     <?php
                        $formulario_m = new FormularioManual("formulario_m", "formulario_m", "idproveedor");
                        $formulario_m->setInput("text", "nombre_m", "Su nombre", 6, "Pedro", 'required', null, null);
                        $formulario_m->setInput("number", "telefono_m", "Su telefono", 6, "0416848888", 'required', null, null);
                        $formulario_m->setInput("email", "correo_m", "Su correo", 12, "pedro@gmail.com", 'required', null, null);
                        $formulario_m->setInput("text", "asunto_m", "Asunto", 12, "5ta Avenida", 'required', null, null);
                        $formulario_m->setInput("text", "mensaje_m", "Mensaje", 12, "5ta Avenida", 'required', null, null);
                        $formulario_m->setButton("Enviar", "Formulario enviado exitosamente!", false, "Cerrar", 'proveedor');
                        $formulario_m->getRender();
                    ?>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>


                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


   <!-- JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="fronted/lib/wow/wow.min.js"></script>
    <script src="fronted/lib/easing/easing.min.js"></script>
    <script src="fronted/lib/waypoints/waypoints.min.js"></script>
    <script src="fronted/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="fronted/lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="fronted/js/main.js"></script>

    <script>
        
   $('#guardar').on('click',function(e){
    e.preventDefault();

    if (submit(input, arrInput, select, arrSelect, 'producto')) {

     
      var formData = new FormData(formulario)
      
      console.log(formData);

      $.ajax({
          url: 'modulocompras/guarda.php',
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
    </script>
</body>

</html>