<?php

require_once("../../Models/conexion.php");
require_once("../../Models/consultas.php");
require_once("../../Controllers/mostrarInfoComun.php");

?>

<!DOCTYPE html>


<html lang="en">

<head>

	<!-- ** Basic Page Needs ** -->
	<meta charset="utf-8">
	<title>Fundación específica - TTM</title>

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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link href="../plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="../plugins/bootstrap/bootstrap-slider.css" rel="stylesheet">
	<link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="../plugins/slick/slick.css" rel="stylesheet">
	<link href="../plugins/slick/slick-theme.css" rel="stylesheet">
	<link href="../plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">

	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/styleDashboarNoCol.css" rel="stylesheet">

</head>

<body class="body-wrapper">

	<!-- header insertado con PHP -->
	<?php
	include("nav-clientSite.php");
	?>

	<!--=================================
=            Single Blog            =
==================================-->
	<section class="blog single-blog section">
		<div class="container">
			<div class="row">
				<?php
				MostrarMascotaFundacionEspecificaSidebar()
				?>
				<div class="col-lg-8">
					<article class="single-post">
                    		<h2 class="text-center mb-4">Mascota</h2>
						<div class="row d-flex align-items-center">
							<?php
							mostrarMascotaFundacionEspecificaComun()
							?>
						</div>
					</article>
				</div>
			</div>
		</div>
	</section>
	<div id="popup">
		<div class="popup-cont ">
			<h3>¿Deseas adoptar esta mascota?</h3>
			<p>Hola! Antes de adoptar una mascota, es necesario iniciar sesión en el sistema. Si ya estás registrado, haz clic en "Si, Ingresar". De lo contrario, si deseas cancelar esta acción, haz clic en "Cancelar".</p>
			<a class="cerrar" href="#" id="close">No, Cancelar</a>
			<a class="cancelar" href="login.php" id="close">Si, Ingresar</a>
		</div>
	</div>

	<!--============================
=            Footer            =
=============================-->

	<?php
	include("footer-include.php")
	?>

	<!-- 
font awesome script
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

	<script src="../js/script.js"></script>

	<!-- Codigo para abrir y cerrar el popup -->
	<script src="https://unpkg.com/jquery@3.7.0/dist/jquery.js"></script>
	<script type="text/javascript">
	$(document).ready(function () {
	$("#open").on("click", function () {
		$("#popup").fadeIn(100);
	});

	$("#close").on("click", function () {
		$("#popup").fadeOut(100);
	});
	});
	</script>

</body>

</html>