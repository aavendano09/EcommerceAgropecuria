   <?php

   include_once "../conexion.php";
   
   $queryNumVentas="SELECT COUNT(tvent_idvent) AS num from tvenn_tts
   where tvent_fechav BETWEEN DATE( DATE_SUB(NOW(),INTERVAL 7 DAY) ) AND NOW(); ";
   $resNumVentas = mysqli_query($conexion, $queryNumVentas);
   $rowNumVentas = mysqli_fetch_assoc($resNumVentas);

   $queryNumProductos="SELECT COUNT(tprod_idprod) AS num from tprod_tme; ";
   $resNumProductos=mysqli_query($conexion,$queryNumProductos);
   $rowNumProductos=mysqli_fetch_assoc($resNumProductos);

   $queryNumVentasPorDia = "SELECT
   sum(tdevt_tts.tdven_Subtot) as total,
   tvenn_tts.tvent_fechav
   FROM
   tvenn_tts
   INNER JOIN tdevt_tts ON tdevt_tts.tdven_fkidvt = tvenn_tts.tvent_idvent
   GROUP BY DAY(tvenn_tts.tvent_fechav);";
   $resVentasDia = mysqli_query($conexion, $queryNumVentasPorDia);
   $labelVentas = "";
   $datosVentas = "";

   while($rowVentasDia = mysqli_fetch_assoc($resVentasDia)){
     $labelVentas = $labelVentas ."'". date_format(date_create($rowVentasDia['tvent_fechav']),"Y-m-d") ."',";
     $datosVentas = $datosVentas . $rowVentasDia['total'].",";
   }
   $labelVentas = rtrim($labelVentas,",");
   $datosVentas = rtrim($datosVentas,",");
   
   ?>

    <script>
    var labelVentas=[<?php echo $labelVentas; ?>];
    var datosVentas=[<?php echo $datosVentas; ?>];
   </script>
   
   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadisticas</title>
    <link href="assets/webfonts">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet">
    <link href="assets/images/favicon.png" rel="icon">
    <link href="assets/images/favicon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
   </head>
   <body>
     <!-- Font Awesome -->
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="paneladmin.php?modulo=home">Home</a></li>
                <li class="breadcrumb-item active">Estadisticas</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $rowNumVentas['num']; ?></h3>
                  <p>Ventas de los ultimos 7 dias</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="panel.php?modulo=historialdeventas" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $rowNumProductos['num']; ?></h3>
                  <p>Productos</p>
                </div>
                <div class="icon">
                  <i class="ion ion-briefcase"></i>
                </div>
                <a href="panel.php?modulo=inventario" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
               <!-- Graficas estadisticas -->

              <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gráficas Estadísticas</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ventas por Día</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
          
   <!-- ChartJS -->
   <script src="../plugins/chart.js/Chart.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

   <script>
    $(document).ready(function(){

     $.ajax({
        url: "ajax/procesos.ajax.php",
        method: "GET",
        success: function(respuesta){
          console.log(respuesta);
        }
     });

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

var areaChartData = {
  labels  : labelVentas,
  datasets: [
    {
      label               : '$ por dia',
      data                : datosVentas
    }
  ]
}

var areaChartOptions = {
  maintainAspectRatio : false,
  responsive : true,
  legend: {
    display: true
  },
  scales: {
    xAxes: [{
      gridLines : {
        display : true,
      }
    }],
    yAxes: [{
      gridLines : {
        display : true,
      }
    }]
  }
}

// This will get the first returned node in the jQuery collection.
var areaChart       = new Chart(areaChartCanvas, { 
  type: 'line',
  data: areaChartData, 
  options: areaChartOptions
})

    });
   </script>
    <script src="../js/jquery-3.6.0.min.js"></script>
   </body>
   </html>