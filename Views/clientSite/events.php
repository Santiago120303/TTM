<?php

require_once("../../Models/conexion.php");
require_once("../../Models/consultas.php");
require_once("../../Controllers/mostrarInfoClientSite.php");

?>
<!DOCTYPE html>

<html lang="en">

<head>

	<!-- ** Basic Page Needs ** -->
	<meta charset="utf-8">
	<title>Eventos - TTM</title>

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
		include("nav-clientSite.php");
	?>

	<section class="section-sm">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="search-result bg-gray text-center">
						<h2>Eventos</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-4">
					<!-- Search Widget -->
					<div class="widget search p-0">
						<div class="input-group">
							<input type="text" class="form-control" id="expire"
								placeholder="Buscar...">
							<span class="input-group-addon"><i class="fa fa-search px-3"></i></span>
						</div>
					</div>
					<div class="category-sidebar">
						<div class="widget product-shorting">
							<h4 class="widget-header">Filtrar Eventos</h4>
							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="">
									Adopciones y Ferias de Adopciones  (AD)
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="">
									Eventos de Recaudación de Fondos (RF)
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="">
									Jornadas de Vacunación (JV)
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="">
									Campañas de Concientización (CC)
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="">
									Cursos de Adiestramiento y Comportamiento (AC)
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="">
									Ferias de Salud Animal (SA
								</label>
							</div>
						</div>

					</div>
				</div>
				<div class="col-lg-9 col-md-8">
					<div class="product-grid-list">
						<div class="row mt-30">
						<?php
							if (isset($_GET['eveNombre'])) {
								buscarNombreEvento($_GET['eveNombre']);
							}else{
								cargarEventos();
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
Font awesome icons
=====================================-->
<script src="https://kit.fontawesome.com/3b8b956f1a.js" crossorigin="anonymous"></script>

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