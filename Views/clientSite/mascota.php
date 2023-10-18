<!DOCTYPE html>


<html lang="en">

<head>

	<!-- ** Basic Page Needs ** -->
	<meta charset="utf-8">
	<title>Mascota - TTM</title>

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
				<div class="col-lg-4">
					<div class="sidebar">
						<!-- Category Widget -->
						<div class="widget category">
							<!-- Widget Header -->
							<h5 class="widget-header">Simba</h5>
							<img style="width: 100%; margin: 0 auto;" src="../../Uploads/mascotas/mascotaEsp.jpg"
								alt="article-01">
							<p style="text-align:center; margin-top:15px;">Fundación cat in home Jul 19, 2023 </p>
							<input type="button" id="open" class="btn btn-login" value="adoptar">
							<h5 class="widget-header mt-4">Acerca de Simba</h5>
							<ul class="category-list">
								<li><strong>Nombre:</strong> Simba</li>
								<li><strong>Sexo:</strong> Masculino</li>
								<li><strong>Edad:</strong> 5 meses</li>
								<li><strong>Raza:</strong> Atigrado</li>
								<li><strong>Color:</strong> Gris</li>
							</ul>
	
	
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<article class="single-post">
						<p class="text-right mb-0"><a href="mascotas.php"><i class=" fa fa-chevron-left mr-1"></i>Volver</a>
						</p>
						<h3>Personalidad:</h3>
						<p>Simba es un gato muy sociable y se lleva bien con personas de todas las edades. Le encanta
							recibir atención y caricias, y disfruta pasar tiempo cerca de sus seres queridos. Es un
							compañero leal y estará encantado de acurrucarse contigo en el sofá o en la cama. También le
							gusta jugar y perseguir juguetes, lo que le proporciona ejercicio y diversión.</p>
	
						<h3>Historial de salud:</h3>
						<p>Simba ha sido sometido a un examen veterinario completo y está en buen estado de salud. Ha sido
							desparasitado, esterilizado y está al día con todas sus vacunas. También está entrenado para
							usar la caja de arena y no presenta problemas de comportamiento.</p>
	
						<h3>Requisitos de adopción:</h3>
						<p>Simba busca un hogar donde reciba mucho amor y atención. Necesita un espacio seguro y
							enriquecedor para explorar y jugar. Preferiblemente, se dará prioridad a las familias o personas
							que ya tengan experiencia previa con gatos y estén comprometidas a cuidar de él durante toda su
							vida.</p>
	
						<h4>Si estás interesado en adoptar a Simba, por favor, ponte en contacto con nosotros para obtener
							más información y programar una visita. ¡Simba está ansioso por encontrar a su familia perfecta
							y comenzar una nueva aventura juntos!</h4>
	
	
					</article>
	
				</div>
			</div>
		</div>
	</section>
	<div id="popup">
		<div class="popup-cont ">
			<h3>¿Quieres adoptar esta mascota?</h3>
			<p> Si estás seguro de que deseas cerrar sesión, puedes hacerlo haciendo clic en el botón "Sí, Cerrar sesión" a continuación. Si no estás seguro o has llegado aquí por error, simplemente has clic en el botón "No, Cancelar" y seguirás conectado.</p>
			<a class="cancelar" href="#" id="close">No, Cancelar</a>
			<a class="cerrar" href="../../Controllers/cerrarSesion.php" id="close">Sí, Cerrar sesión</a>
		</div>
	</div>    

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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

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


	<script src="../js/script.js"></script>

</body>

</html>