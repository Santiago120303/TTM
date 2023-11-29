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
  <title>Fundación - Registrar Mascotas</title>

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
  
  <style>
         .list {
        max-height: 200px !important;
        overflow:hidden !important;
        overflow-y: scroll !important;
        }
	   input::placeholder{
		font-family: 'Montserrat', sans-serif;
	   }
    </style>

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
          <h3 class="widget-header">Registro de Mascota</h3>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="basic-elements">
                                            
                    <form action="../../Controllers/registrarMasFun.php" method="POST" enctype="multipart/form-data">
                               
                      <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Especie</label>
                            <select required name="masEspecie" id="especie" class="form-control">
                              <option value="">Especie...</option>
                              <option value="1">Perro</option>
                              <option value="2">Gato</option>
                              <option value="3">Ave</option>
                              <option value="4">Conejo</option>
                              <option value="5">Roedor</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Raza</label>
                            <input type="text" class="form-control" placeholder="Ej: Golden Retriever" required name="masRaza">
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Nombre</label>
                            <input type="text" class="form-control" placeholder="Ej: Simba" required name="masNombre">
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Sexo</label>
                            <select required name="masSexo" class="form-control">
                              <option value="">Sexo...</option>
                              <option value="1">Macho</option>
                              <option value="2">Hembra</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Edad (años)</label>
                            <input type="text" class="form-control" placeholder="Ej: 5 " required name="masEdad">
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Vacunas</label>
                            <select required name="masVacunas" id="masVacunas" class="form-control">
                              <option value="">Vacunas...</option>
                              <option value="Si">Sí</option>
                              <option value="No">No</option>
                              <option value="No aplica">No aplica</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-12">
                            <label>¿Cuáles Vacunas?</label>
                              <div class="row">
                                <input type="text" name="masVacuna1" class="form-control col-lg-3 col-md-4 " placeholder="Ej 1: rabia">
                                <input type="text" name="masVacuna2" class="form-control col-lg-3 col-md-4 " placeholder="Ej 2: parvovirus">
                                <input type="text" name="masVacuna3" class="form-control col-lg-3 col-md-4 " placeholder="Ej 3: triple felina">
                                <input type="text" name="masVacuna4" class="form-control col-lg-3 col-md-4 " placeholder="Ej 4: mixomatosis ">
                              </div>
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Estado de Salud</label>
                            <input type="text" class="form-control" placeholder="Ej: Óptimo, Bueno, Excelente..." required name="masEstSalud">
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Personalidad</label>
                            <input type="text" class="form-control" placeholder="Ej: Juguetón y curioso" required name="masPersonalidad">
                        </div>

                        <div class="form-group col-lg-12">
                            <label>Historia</label>
                            <textarea class="form-control" required name="masHistoria" cols="20" rows="4" placeholder="Ingresa aquí, la historia de la mascota en un párrafo corto."></textarea>
                        </div>

                        <div class="form-group col-lg-12">
                            <label>Requisitos de Adopción</label>
                            <textarea class="form-control" required name="masReqAdopcion" cols="20" rows="4" placeholder="Ingresa aquí, los requisitos de adopción de la mascota en un párrafo corto."></textarea>
                        </div>
                                    
                        <div class="form-group col-lg-12">
                            <label>Foto de la Mascota</label>
                            <input type="file" class="form-control" name="masFoto" accept=".jpeg, .jpg, .png, .gif">
                        </div>
                      </div>
                                
                      <button type="submit" class="btn btn-main-sm btn-flat m-b-30 m-t-30 w-100">Registrar nueva mascota</button>

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