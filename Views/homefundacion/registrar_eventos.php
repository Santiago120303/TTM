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
  <title> Fundación - Registrar Eventos</title>

  <!-- ** Mobile Specific Metas ** -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Agency HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Classified Marketplace Template v1.0">

  <!-- favicon -->
  <link href="../images/favicon.png" rel="shortcut icon">

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

<section class="dashboard section minhe">
  <!-- Container Start -->
  <div class="container-fluid">
    <!-- Row Start -->
    <div class="row">
      <?php
          include("menu-include.php")//col-lg-3
      ?>
      <div class="col-lg-9">
        <!-- Recently Favorited -->
        <div class="widget dashboard-container my-adslist">
          <h3 class="widget-header">Registrar Eventos</h3>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="basic-elements">
                                            
                  <form action="../../Controllers/registrarEveFun.php" method="POST" enctype="multipart/form-data">
                <div class="row">

                    <div class="form-group col-lg-6">
                        <label>Nombre del Evento</label>
                        <input type="text" class="form-control" placeholder="Ej:Evento caritativo" required name="eveNombre">
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label>Dirección del Evento</label>
                        <input type="text" class="form-control" placeholder="Ej:Carrera 1 #3-4 sur" required name="eveDireccion">
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Fecha del Evento</label>
                        <input type="date" class="form-control" required name="eveFecha">
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Hora del Evento</label>
                        <input type="time" class="form-control" required name="eveHora">
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Estado del Evento</label>
                        <select required name="eveEstado" id="" class="form-control">
                            <option value="">Selecciona una opción</option>
                            <option value="Activo">Activo</option>
                            <option value="Cancelado">Cancelado</option>
                            <option value="En estado de confirmacion">En estado de confirmación</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-12">
                      <label>Descripción del Evento</label>
                      <input type="text" class="form-control" placeholder="Escriba la descripción del evento" required name="eveDescripcion">
                    </div>

                    <div class="form-group col-lg-12">
                      <label>Imagen o foto del Evento</label>
                      <input type="file" class="form-control" name="img" accept=".jpeg, .jpg, .png, .gif">
                    </div>
                </div>
                <button type="submit" class="btn btn-main-sm btn-flat m-b-30 m-t-30">Registrar nuevo evento</button>
                
            </form>
                              
                  </div>
                </div>
              </div>
            </div>
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
Essential Scripts
=====================================-->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/popper.min.js"></script>
<script src="../plugins/bootstrap/bootstrap.min.js"></script>
<script src="../plugins/bootstrap/bootstrap-slider.js"></script>
<script src="../plugins/tether/js/tether.min.js"></script>
<script src="../plugins/raty/jquery.raty-fa.js"></script>
<script src="../plugins/slick/slick.min.js"></script>
<script src="../plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
<script src="../plugins/google-map/map.js" defer></script>

<script src="../js/script.js"></script>

</body>

</html>