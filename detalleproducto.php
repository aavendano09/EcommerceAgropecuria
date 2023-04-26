<?php
session_start();

include 'conexion.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Producto</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
        <!-- Favicon -->
    <link href="fronted/img/favicon.ico" rel="icon">
    <!-- <script src="validaciones.js"></script> -->

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
    
<?php

$id =mysqli_real_escape_string( $conexion, $_REQUEST['id']);
$consultaProducto = "SELECT tprod_idprod,tprod_fotopr, tprod_namepr,tprod_descpr,tprod_preciv,tprod_cantpr FROM tprod_tme WHERE tprod_idprod='$id'; ";
$resProducto = mysqli_query($conexion, $consultaProducto);
$rowProducto = mysqli_fetch_assoc($resProducto);

?>

  <!-- Default box -->
  <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?php echo $rowProducto['tprod_namepr'] ?></h3>
              <div class="col-12">
              <img style="height: 500px;" class="card-img-top img-thumbnail" src="data:image/jpg;base64,<?php echo base64_encode($rowProducto['tprod_fotopr']) ?>" alt="">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?php echo $rowProducto['tprod_namepr'] ?></h3>
              <p><?php echo $rowProducto['tprod_descpr'] ?></p>

              <hr>
              <h4>Existencia: <?php echo $rowProducto['tprod_cantpr'] ?> </h4>
    

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  $ <?php echo $rowProducto['tprod_preciv'] ?>
                </h2>
              </div>
        

              <?php if ($_SESSION['productosSession'][$_REQUEST['id']]['cantidad'] < $rowProducto['tprod_cantpr']): ?>
                    <div class="mt-4">
                    <button class="btn btn-primary btn-lg btn-flat" id="agregarCarrito"
                    data-id="<?php echo $_REQUEST['id'] ?>"
                    data-nombre="<?php echo $rowProducto['tprod_namepr'] ?>"
                    data-precio="<?php echo $rowProducto['tprod_preciv'] ?>"
                    data-max="<?php echo $rowProducto['tprod_cantpr'] ?>"
                    data-current="<?php echo $_SESSION['productosSession'][$_REQUEST['id']]['cantidad'] ?>"
                    >
                      <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                      Agregar al carrito
                    </button>
                  </div>
              <?php else: ?>
                  <div class="mt-4">
                  <button class="btn btn-primary btn-lg btn-flat" id="agregarCarrito"
                  data-id="<?php echo $_REQUEST['id'] ?>"
                  data-nombre="<?php echo $rowProducto['tprod_namepr'] ?>"
                  data-precio="<?php echo $rowProducto['tprod_preciv'] ?>"
                  data-max="<?php echo $rowProducto['tprod_cantpr'] ?>"
                  data-current="<?php echo $_SESSION['productosSession'][$_REQUEST['id']]['cantidad'] ?>"
                  disabled
                  >
                    <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                    Agregar al carrito
                  </button>
                </div>
              
              
              <?php endif; ?>
              

              <?php if ($_SESSION['productosSession'][$_REQUEST['id']]['cantidad'] < $rowProducto['tprod_cantpr']):?>
                <div class="mt-4">
                 Cantidad: 
                  <input type="number" class="form-control" max="<?= $rowProducto['tprod_cantpr'] ?>" id="cantidadProducto" value="1">
                </div>
              <?php else: ?>
                <div class="mt-4">
                 Cantidad: 
                  <input type="number" class="form-control" max="<?= $rowProducto['tprod_cantpr'] ?>" id="cantidadProducto" value="1" disabled>
                </div>
              <?php endif; ?>

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->



  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="fronted/lib/wow/wow.min.js"></script>
    <script src="fronted/lib/easing/easing.min.js"></script>
    <script src="fronted/lib/waypoints/waypoints.min.js"></script>
    <script src="fronted/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="fronted/lib/counterup/counterup.min.js"></script>

    <script>

      $('#cantidadProducto').keyup(function(evt){
        if(window.event){
        keynum = evt.keyCode;
        }
        else{
        keynum = evt.which;
        }



        if((keynum > 47 && keynum < 58) || keynum == 8 || keynum== 13){
          max = <?=$rowProducto['tprod_cantpr']?>;

            if ($(this).val() > max-1) {
               $(this).val(max);
                return false;
            } else {
                return true;
            }
        }
        else
        {
        alert("Ingresar solo numeros");
        $(this).val('');
        return false;
        }
      });
      

    </script>

    <!-- Template Javascript -->
    <script src="fronted/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Javascript files-->
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</body>
</html>