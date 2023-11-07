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
		include("nav-fundacion.php");
	?>
	
	<!--=================================
=            Single Blog            =
==================================-->
	<section class="blog single-blog section">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="sidebar">
						<!-- Archive Widget -->
						<div class="widget archive">
							<!-- Widget Header -->
							<!-- <h5 class="widget-header">Patitas Solidarias</h5> -->
	
							<a href="fundacion.php"><img class="w-100 mb-4"
									src="../../Uploads/fundaciones/logfun1.png" alt="logo de la fundacion"></a>
							<a href="mascotas.php" class="btn btn-login mb-4">Mascotas</a>
							<a href="fundacion.php" class="btn btn-login mb-4">Eventos</a>

							<a class="text-center href="mailto:patitassolidarias@gmail.com">patitassolidarias@gmail.com</a>
							<a href="whatsapp://send?phone=310123456757&text=Hola%2C%20me%20gustar%C3%ADa%20saber%20m%C3%A1s%20acerca%20de%20su%20fundaci%C3%B3n.">3101234567</a>


							<ul class="archive-list">
								<li><a href="fundacion-events.html">Adopciones y Ferias de Adopción</a>
								</li>
								<!-- Eventos donde la fundación promueve la adopción responsable de animales rescatados y proporciona una oportunidad para que las personas encuentren un nuevo compañero. -->
								<li><a href="fundacion-events.html">Campañas de Esterilización y
										Castración</a></li>
								<!-- Programas para controlar la población de animales callejeros mediante la esterilización y castración, que suelen llevarse a cabo con la colaboración de veterinarios. -->
								<li><a href="fundacion-events.html">Eventos de Recaudación de Fondos</a>
								</li>
								<!-- Actividades como cenas benéficas, subastas, paseos o carreras para recaudar dinero y recursos para el cuidado y protección de los animales. -->
								<li><a href="fundacion-events.html">Días de Puertas Abiertas</a></li>
								<!-- Jornadas en las que la fundación abre sus instalaciones al público, permitiendo que las personas conozcan su trabajo, interactúen con los animales y aprendan sobre sus necesidades. -->
								<li><a href="fundacion-events.html">Campañas de Concientización</a></li>
								<!--  Charlas educativas, proyección de documentales y campañas en redes sociales para concientizar sobre temas como el bienestar animal, la protección de especies en peligro y la importancia de la adopción. -->
								<li><a href="fundacion-events.html">Jornadas de Vacunación</a></li>
								<!-- Eventos donde se brinda atención veterinaria básica, como vacunas y desparasitación, a animales en comunidades de bajos recursos. -->
								<li><a href="fundacion-events.html">Voluntariado en Refugios</a></li>
								<!-- Días dedicados a la participación de voluntarios en tareas de limpieza, cuidado y enriquecimiento ambiental para los animales alojados en refugios. -->
								<li><a href="fundacion-events.html">Cursos de Adiestramiento y
										Comportamiento</a></li>
								<!--  Talleres para dueños de mascotas que promuevan la comprensión y el cuidado adecuado de los animales.-->
								<li><a href="fundacion-events.html">Eventos de Rescate y Emergencia</a>
								</li>
								<!-- Intervención en situaciones de desastres naturales o rescates de animales en peligro. -->
								<li><a href="fundacion-events.html">Ferias de Salud Animal</a></li>
								<!-- Jornadas que ofrecen servicios de salud gratuitos o a bajo costo, como chequeos médicos, desparasitación y cuidados veterinarios básicos. -->
							</ul>
						</div>
	
					</div>
				</div>
				<div class="col-lg-8">
					<article class="single-post">
						<h2 class="text-center mb-4">Acerca de Patitas Solidarias </h2>
						<div class="row ">
							<div class="col-lg-6">
								<h3>Descripción</h3>
								<p>Patitas Solidarias es una organización sin fines de lucro dedicada al bienestar y
									protección de los animales. Nuestra misión es proporcionar un hogar temporal y
									permanente para mascotas en situación de abandono y maltrato, así como promover
									la adopción responsable y la conciencia sobre el cuidado de los animales.
									Trabajamos incansablemente para brindar amor, cuidado y una segunda oportunidad
									a cada patita peluda que llega a nuestras puertas.</p>
	
							</div>
							<div class="col-lg-6 d-flex align-items-center ">
								<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
									<div class="carousel-inner">
										<div class="carousel-item active">
											<img src="../../Uploads/fundaciones/" class="d-block w-100" alt="foto fundacion 1 de 4">
										</div>
										<div class="carousel-item">
											<img src="../../Uploads/fundaciones/" class="d-block w-100" alt="foto fundacion 2 de 4">
										</div>
										<div class="carousel-item">
											<img src="../../Uploads/fundaciones/" class="d-block w-100" alt="foto fundacion 3 de 4">
										</div>
										<div class="carousel-item">
											<img src="../../Uploads/fundaciones/" class="d-block w-100" alt="foto fundacion 4 de 4">
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<h3>Misión</h3>
								<p>Nuestra misión es ser el refugio seguro y amoroso para los animales desamparados,
									donde recibirán atención médica, alimentación adecuada y el afecto necesario
									para su recuperación física y emocional. Buscamos promover la adopción
									responsable, educar a la comunidad sobre el bienestar animal y colaborar con
									otras organizaciones para lograr un mundo donde cada mascota tenga un hogar
									lleno de amor.</p>
							</div>
							<div class="col-lg-12">
								<h3>Visión</h3>
								<p>En Patitas Solidarias, soñamos con un mundo en el que cada mascota tenga un hogar
									donde se les brinde amor, respeto y cuidado adecuado. Nos esforzamos por ser
									líderes en el rescate y protección animal, trabajando de la mano con la
									comunidad para crear conciencia sobre la importancia de la adopción responsable
									y la prevención del abandono. Aspiramos a ser un faro de esperanza para las
									patitas desamparadas, demostrando que juntos podemos marcar la diferencia en la
									vida de estos fieles compañeros.</p>
							</div>
					</article>
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

	<script src="../js/script.js"></script>

</body>

</html>