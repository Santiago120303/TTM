<?php
  require_once("../../Models/conexion.php");
  require_once("../../Models/consultas.php");
  require_once("../../Models/seguridadFundacion.php");
  require_once("../../Controllers/mostrarInfoFundacion.php");
?>

<!DOCTYPE html>

<html lang="en">
<head>

  <!-- ** Basic Page Needs ** -->
  <meta charset="utf-8">
  <title>Mi Perfil</title>

  <!-- ** Mobile Specific Metas ** -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Agency HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Classified Marketplace Template v1.0">

  <!-- favicon -->
  <link href="../images/favicon.png" rel="shortcut icon">

  <!-- 
  Dashboard stylesheets
  =====================================-->
    <link href="../dashboard/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="../dashboard/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="../dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../dashboard/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../dashboard/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="../dashboard/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="../dashboard/css/lib/weather-icons.css" rel="stylesheet" />
    <!-- <link href="../dashboard/css/lib/menubar/sidebar.css" rel="stylesheet"> -->
    <link href="../dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../dashboard/css/lib/helper.css" rel="stylesheet">


  <!-- 
  Essential stylesheets
  =====================================-->
  <link href="../plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="../plugins/bootstrap/bootstrap-slider.css" rel="stylesheet">
  <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../plugins/slick/slick.css" rel="stylesheet">
  <link href="../plugins/slick/slick-theme.css" rel="stylesheet">
  <link href="../plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  
  <link href="../css/style.css" rel="stylesheet">


</head>

<body class="body-wrapper">
  <?php
    include("nav-fundacion.php");
  ?>
<!--==================================
=            User Profile            =
===================================-->
<section class="dashboard section">
  <!-- Container Start -->
  <div class="container-fluid">
    <!-- Row Start -->
    <div class="row">
      <?php
          include("menu-include.php")//col-lg-3
        ?>
      <div class="col-lg-9">
        <!-- Recently Favorited -->
        <section id="main-content">
          <article class="single-post" style="width: 1100px !important; margin: 0 auto;">
            <h2 class="text-center mb-4">Acerca de Patitas Solidarias </h2>
            <div class="row ">
              <div class="col-lg-12">
                <h3>Descripción</h3>
                <p>Patitas Solidarias es una organización sin fines de lucro dedicada al bienestar y
                  protección de los animales. Nuestra misión es proporcionar un hogar temporal y
                  permanente para mascotas en situación de abandono y maltrato, así como promover
                  la adopción responsable y la conciencia sobre el cuidado de los animales.
                  Trabajamos incansablemente para brindar amor, cuidado y una segunda oportunidad
                  a cada patita peluda que llega a nuestras puertas.</p>
					  	</div> 
              <div class="col-lg-12">
                <h3>Misión</h3>
                <p>Nuestra misión es ser el refugio seguro y amoroso para los animales desamparados,
                  donde recibirán atención médica, alimentación adecuada y el afecto necesario
                  para su recuperación física y emocional. Buscamos promover la adopción
                  responsable, educar a la comunidad sobre el bienestar animal y colaborar con
                  otras organizaciones para lograr un mundo donde cada mascota tenga un hogar
                  lleno de amor.</p>
              </div>
              <div class="col-lg-12">
                <h3>Visión</h3>
                <p>En Patitas Solidarias, soñamos con un mundo en el que cada mascota tenga un hogar
                  donde se les brinde amor, respeto y cuidado adecuado. Nos esforzamos por ser
                  líderes en el rescate y protección animal, trabajando de la mano con la
                  comunidad para crear conciencia sobre la importancia de la adopción responsable
                  y la prevención del abandono. Aspiramos a ser un faro de esperanza para las
                  patitas desamparadas, demostrando que juntos podemos marcar la diferencia en la
                  vida de estos fieles compañeros.</p>
              </div>
            </div>
          </article>
        </section>
      </div>
      <!-- Row End -->
    </div>
    <!-- Container End -->
  </div>
</section>

<!--============================
=            Footer            =
=============================-->

    <?php
		include("footer-include.php")
	?>

<!-- 
Dashboard Scripts
=====================================-->
    <!-- jquery vendor -->
    <script src="../dashboard/js/lib/jquery.min.js"></script>
    <script src="../dashboard/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="../dashboard/js/lib/menubar/sidebar.js"></script>
    <script src="../dashboard/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="../dashboard/js/lib/bootstrap.min.js"></script>
    <script src="../dashboard/js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="../dashboard/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="../dashboard/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="../dashboard/js/lib/calendar-2/pignose.init.js"></script>


    <script src="../dashboard/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="../dashboard/js/lib/weather/weather-init.js"></script>
    <script src="../dashboard/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="../dashboard/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="../dashboard/js/lib/chartist/chartist.min.js"></script>
    <script src="../dashboard/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="../dashboard/js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="../dashboard/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="../dashboard/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="../dashboard/js/dashboard2.js"></script>



<!-- 
Essential Scripts
=====================================-->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/popper.min.js"></script>
<script src="../plugins/bootstrap/bootstrap.min.js"></script>
<script src="../plugins/bootstrap/bootstrap-slider.js"></script>
<script src="../plugins/tether/../dashboard/js/tether.min.js"></script>
<script src="../plugins/raty/jquery.raty-fa.js"></script>
<script src="../plugins/slick/slick.min.js"></script>
<script src="../plugins/jquery-nice-select/../dashboard/js/jquery.nice-select.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
<script src="../plugins/google-map/map.js" defer></script>

<script src="../../dashboard/js/script.js"></script>

</body>

</html>