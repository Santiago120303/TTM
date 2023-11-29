<?php

require_once("../../Models/conexion.php");
require_once("../../Models/consultas.php");
require_once("../../Models/seguridadClient.php");
require_once("../../Controllers/mostrarInfoClient.php");
require_once("../../Controllers/mostrarInfoComun.php");

?>

<!DOCTYPE html>

<html lang="en">

<head>

	<!-- ** Basic Page Needs ** -->
	<meta charset="utf-8">
	<title>Mascotas - TTM</title>

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

    <!-- Estilos propios del documento -->
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
		include("nav-cliente.php");
	?>

	<section class="section-sm minhe">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="search-result bg-gray text-center">
						<h2>Mascotas</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-4">
					<!--Buscador-->
					<form class="p-3" style="background: white;" method="get">
						<select name="masEspecie" class="form-control mt-3 nice-select form-control w-100 text-center">
							<option value="">Especie...</option>
							<option value="1">Perro</option>
							<option value="2">Gato</option>
							<option value="3">Ave</option>
							<option value="4">Conejo</option>
							<option value="5">Roedor</option>
						</select>
						<input class="mt-3 form-control " type="number" name="masEdad" placeholder="Edad: 2 (años)">
						<select name="masSexo" class="form-control mt-3 nice-select form-control w-100 text-center">
							<option value="">Sexo...</option>
							<option value="1">Macho</option>
							<option value="2">Hembra</option>
						</select>
						<input class="mt-3 form-control " type="text" name="masRaza" placeholder="Raza: Beagle">
					<input class="mt-3 btn btn-login" type="submit" value="Buscar">
					</form>
				</div>
	
				<div class="col-lg-9 col-md-8">
					<div class="product-grid-list">
						<div class="row mt-30">
						<?php
							if (isset($_GET['masEspecie']) || isset ($_GET['masEdad']) || isset ($_GET['masSexo'])  || isset ($_GET['masRaza'])) {
								filtroMascotas($_GET['masEspecie'], $_GET['masEdad'], $_GET['masSexo'], $_GET['masRaza']);
							}else{
								cargarMascotasComun();
							}
							?>	
						</div>
					</div>
				</div>
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