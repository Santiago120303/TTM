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
	<title>Home Tomando tu mano</title>

	<!-- ** Mobile Specific Metas ** -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Agency HTML Template">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
	<meta name="author" content="Themefisher">
	<meta name="generator" content="Themefisher Classified Marketplace Template v1.0">

	<!-- theme meta -->
	<meta name="theme-name" content="classimax" />

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

	<!--===============================
=            Hero Area            =
================================-->

	<section class="hero-area bg-1 text-center overly">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Header Contetnt -->
					<div class="content-block">
						<h1 class="titulos">Tomando tu Mano</h1>
						<p>"Tomando Tu Mano" representa un apasionante proyecto de desarrollo de software que tiene como
							objetivo brindar un merecido reconocimiento a las fundaciones de mascotas con sede en Bogotá. Nuestra
							meta es permitir que la ciudadanía identifique y respalde de manera más efectiva a aquellas
							entidades que requieren un mayor apoyo y atención.</p>
					</div>
				</div>
			</div>
		</div>
							
	</section>


	<!--===========================================
=            Popular deals section            =
============================================-->

	<section class="popular-deals section bg-gray">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2>Nuestros servicios</h2>
						<p>A continuación, te presentamos una selección de los servicios que ponemos a tu
							disposición.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- offer 01 -->
				<div class="col-lg-12">
					<div class="trending-ads-slide">


						<div class="col-sm-12 col-lg-4">
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<a href="../homeClient/fundaciones.php">
											<img class="card-img-top img-fluid"
												src="../images/products/products-1.jpg" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
										<h4 class="card-title"><a href="../homeClient/fundaciones.php">Fundaciones</a></h4>
										<p class="card-text">En nuestro sitio, tendrás acceso a una amplia gama de
											fundaciones de animales ubicadas en Bogotá. En cada perfil, encontrarás
											información esencial detallada sobre cada una de estas organizaciones. </p>
									</div>
								</div>
							</div>
						</div>


						<div class="col-sm-12 col-lg-4">
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<a href="../homeClient/mascotas.php">
											<img class="card-img-top img-fluid"
												src="../images/products/products-3.png" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
										<h4 class="card-title"><a href="../homeClient/mascotas.php">Mascotas</a></h4>
										<p class="card-text">A través de nuestra plataforma, te brindamos la oportunidad
											de descubrir una amplia diversidad de adorables animales que están en busca
											de un hogar amoroso. ¡No pierdas tiempo, únete a nosotros y abre tus brazos
											a la adopción!</p>
									</div>
								</div>
							</div>
						</div>


						<div class="col-sm-12 col-lg-4">
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
									<a href="../homeClient/events.php">
											<img class="card-img-top img-fluid"
												src="../images/products/products-4.png" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
										<h4 class="card-title"><a href="../homeClient/events.php">Eventos</a></h4>
										<p class="card-text">Explora nuestra plataforma y sumérgete en una amplia
											variedad de eventos respaldados por diversas fundaciones. Regístrate de
											manera sencilla y lleva un registro de tus participaciones. Tu compromiso
											hacia un cambio positivo.</p>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</section>

	<!--============================
=            Footer            =
=============================-->
	<!-- Footer Bottom -->
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