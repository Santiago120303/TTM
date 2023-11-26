<?php

require_once("../../Models/conexion.php");
require_once("../../Models/consultas.php");
require_once("../../Controllers/mostrarInfoComun.php");

?>

<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">

<head>

	<!-- ** Basic Page Needs ** -->
	<meta charset="utf-8">
	<title>Fundaciones</title>

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
		include("nav-clientSite.php");
	?>

<section class="section-sm minhe">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray text-center">
					<h2>Fundaciones</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-4">
				<!--Buscador-->
				<form class="p-3" style="background: white;" method="get">
				<input class="mt-3 form-control " type="text" name="fundacionNombre" placeholder="Fundacion...">
				<select name="localidad" id="" class="form-control mt-3 nice-select form-control w-100 text-center"  >
					<option value="">Localidad</option>
					<option value="AnNa">Antonio Nariño</option>
					<option value="BaUn">Barrio Unidos</option>
					<option value="Bo">Bosa</option>
					<option value="Ch">Chapinero</option>
					<option value="CiBo">Ciudad Bolívar</option>
					<option value="En">Engativá</option>
					<option value="Fo">Fontibón</option>
					<option value="Ke">Kennedy</option>
					<option value="LaCa">La Candelaria</option>
					<option value="LoMa">Los Mártires</option>
					<option value="PuAr">Puente Aranda</option>
					<option value="RaUrUr">Rafael Uribe Uribe</option>
					<option value="SaCr">San Cristóbal</option>
					<option value="Sa">Santa Fe</option>
					<option value="Su">Suba</option>
					<option value="Sum">Sumapaz</option>
					<option value="Te">Teusaquillo</option>
					<option value="Tu">Tunjuelito</option>
					<option value="Us">Usaquén</option>
					<option value="Usm">Usme</option>
				</select>
				<input class="mt-3 btn btn-login" type="submit" value="Buscar">
				</form>
			</div>
			<div class="col-lg-9 col-md-8">
				<div class="product-grid-list">
					<div class="row mt-30">
						<?php
							if (isset($_GET['fundacionNombre']) || isset ($_GET['localidad'])) {
								fitroFundaciones($_GET['fundacionNombre'], $_GET['localidad']);
							}else{
								cargarFundacionesComun();
							}
								
						?>
					</div>
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