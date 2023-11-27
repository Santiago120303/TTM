<?php
  require_once("../../Models/conexion.php");
  require_once("../../Models/consultas.php");
  require_once("../../Models/seguridadClient.php");
  require_once("../../Controllers/mostrarInfoClient.php");
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
				<form method="get">
				<input class="mt-3 nice-select form-control w-100 text-center" type="text" name="fundacionNombre" placeholder="Fundacion...">
				<select name="localidad" id="" class="form-control mt-3 nice-select form-control w-100 text-center"  >
					<option value="">Localidad</option>
					<option value="1">Antonio Nariño</option>
					<option value="2">Barrio Unidos</option>
					<option value="3">Bosa</option>
					<option value="4">Chapinero</option>
					<option value="5">Ciudad Bolívar</option>
					<option value="6">Engativá</option>
					<option value="7">Fontibón</option>
					<option value="8">Kennedy</option>
					<option value="9">La Candelaria</option>
					<option value="10">Los Mártires</option>
					<option value="11">Puente Aranda</option>
					<option value="12">Rafael Uribe Uribe</option>
					<option value="13">San Cristóbal</option>
					<option value="14">Santa Fe</option>
					<option value="15">Suba</option>
					<option value="16">Sumapaz</option>
					<option value="17">Teusaquillo</option>
					<option value="18">Tunjuelito</option>
					<option value="19">Usaquén</option>
					<option value="20">Usme</option>
				</select>
				<input class="mt-3 btn btn-login" type="submit" value="Buscar">
				</form>
			</div>
	
				<div class="col-lg-9 col-md-8">
					<div class="product-grid-list">
						<div class="row mt-30">
							<?php
								cargarMascotasCliente();
							?>	
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