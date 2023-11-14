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

<!-- header insertado con PHP -->
     <?php
		include("nav-fundacion.php");
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
				<div class="col-md-12 bgradient" >
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
										<a href="../clientSite/fundaciones.php">
											<img class="card-img-top img-fluid"
												src="../images/products/products-1.jpg" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
										<h4 class="card-title"><a href="../clientSite/fundaciones.php">Fundaciones</a></h4>
										<p class="card-text">En nuestro sitio, tendrás acceso a una amplia gama de
											fundaciones de animales ubicadas en Bogotá. En cada perfil, encontrarás
											información esencial detallada sobre cada una de estas organizaciones.</p>
									</div>
								</div>
							</div>
						</div>


						<!-- <div class="col-sm-12 col-lg-4">
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<a href="single.php">
											<img class="card-img-top img-fluid"
												src="../images/products/products-2.jpg" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
										<h4 class="card-title"><a href="single.php">Donaciones</a></h4>
										<p class="card-text"> A través de nuestro sitio, tendrás la oportunidad única de
											brindar tu apoyo vital a estas organizaciones, contribuyendo directamente a
											fortalecer y potenciar sus funciones esenciales en beneficio de los
											animales.</p>
									</div>
								</div>
							</div>
						</div> -->


						<div class="col-sm-12 col-lg-4">
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<a href="../clientSite/mascotas.php">
											<img class="card-img-top img-fluid"
												src="../images/products/products-3.png" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
										<h4 class="card-title"><a href="../clientSite/mascotas.php">Mascotas</a></h4>
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
										<a href="../clientSite/events.php">
											<img class="card-img-top img-fluid"
												src="../images/products/products-4.png" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
										<h4 class="card-title"><a href="../clientSite/events.php">Eventos</a></h4>
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

	<!--====================================
=            Call to Action            =
=====================================-->

	<section class="call-to-action overly bg-3 section-sm">
		<!-- Container Start -->
		<div class="container">
			<div class="row justify-content-md-center text-center">
				<div class="col-md-8">
					<div class="content-holder">
						<h2>¡Únete a la acción y sé parte del cambio! Desde donaciones que salvan vidas hasta adopciones
							que llenan de amor, cada acción cuenta. Regístrate hoy y contribuye al impacto positivo.
							¡Actúa ahora!</h2>
						<ul class="list-inline mt-30">
							<li class="list-inline-item"><a class="btn btn-main"
									href="../clientSite/login.php">Ingresar</a></li>
							<li class="list-inline-item"><a class="btn btn-light"
									href="../clientSite/register.php">Registrarse</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Container End -->
	</section>

	<!--============================
=            Footer            =
=============================-->
	<!-- Footer Bottom -->
	<footer class="footer-bottom">
		<!-- Container Start -->
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-4 text-center text-lg-left mb-3 mb-lg-0">
					<!-- logo -->
					<a class="navbar-brand" href="index.php">
						<img class="m0a" src="../images/logo-footer.png" alt="Logo TTM">
					</a>
				</div>
				<div class="col-lg-4 text-center mb-3 mb-lg-0">
					<!-- Copyright -->
					<div class="copyright">
						<p>Copyright &copy;
							<script>
								var CurrentYear = new Date().getFullYear()
								document.write(CurrentYear)
							</script> Tomando Tu Mano. Todos los derechos reservados.
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<!-- Social Icons -->
					<ul class="social-media-icons text-center text-lg-right">
						<li><a class="fa fa-facebook" href="https://www.facebook.com/profile.php?id=61551249643390" target="_blank"></a></li>
						<li><a class="fa fa-instagram" href="#"></a></li>
						<li><a class="fa fa-pinterest-p" href="#"></a>
						</li>
						<li><a class="fa fa-github-alt" href="#"></a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Container End -->

		<div class="scroll-top-to">
			<i class="fa fa-angle-up"></i>
		</div>
	</footer>

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