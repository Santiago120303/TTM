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
	<title>Adopción - TTM</title>

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
		include("nav-cliente.php");
	?>
	
	<!--=================================
=            Single Blog            =
==================================-->
<section class="hero">

    <div class="form">
        <div class="widget dashboard-container">
            <div class="text-center" id="adop">
                <h1>¡Adopta una mascota!</h1>
                <p>Llena el siguiente formulario y tendrás la oportunidad de adoptar un amigo!</p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-elements">
                                <?php
                                    cargarFormulario();
                                ?>

                            <!-- <form action="../../Controllers/formularioAdop.php" method="POST">
                               
                               <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>¿Qué edad tienes?</label>
                                    <input type="number" class="form-control" placeholder="Ej: 25" required name="adopEdad">
                                </div>
         
                                <div class="form-group col-lg-12">
                                    <label>¿Has tenido mascotas anteriormente?</label><br>
                                        <input type="radio" value="1" name="adopMasAnterior" required>
                                        <label for="radio">Sí</label><br>
                                        <input type="radio" value="2" name="adopMasAnterior" required>
                                        <label for="radio">No</label>
                                </div>
         
                                <div class="form-group col-lg-12">
                                    <label>¿Actualmente tienes mascotas? Si tiene mencione cuántas.</label>
                                    <input type="text" class="form-control" placeholder="Ej: Sí, 4 mascotas" required name="adopMasActual">
                                </div>
         
                                <div class="form-group col-lg-12">
                                    <label>¿Cuál es su situación laboral o fuentes de ingreso actualmente?</label>
                                    <input type="text" class="form-control" placeholder="Ej: Tengo un trabajo estable como..." required name="adopTrabajo">
                                </div>
        
                                <div class="form-group col-lg-12">
                                    <label>¿Cuenta con casa propia o renta?</label><br>
                                        <input type="radio" value="1" name="adopMasHogar" required>
                                        <label for="radio">Casa propia</label><br>
                                        <input type="radio" value="2" name="adopMasHogar" required>
                                        <label for="radio">Renta</label>
                                </div>
        
                                <div class="form-group col-lg-12">
                                    <label>Si se muda de casa, de ciudad o de país en el futuro, ¿qué sucedera con su mascota?</label>
                                    <input type="text" class="form-control" placeholder="Ej: Mi mascota se mudará conmigo..." required name="adopMuda">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>¿Hay niños en casa? Por favor, describa sus edades.</label>
                                    <input type="text" class="form-control" placeholder="Ej: Sí, 1 niño de 8 años." required name="adopNinos">
                                </div>
                            
                                <div class="form-group col-lg-12">
                                   <label>¿La mascota tendrá acceso a cualquier lugar de la casa?</label><br>
                                       <input type="radio" value="1" name="adopAcceso" required>
                                       <label for="radio">Sí</label><br>
                                       <input type="radio" value=""2 name="adopAcceso" required>
                                       <label for="radio">No</label>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>¿Cuál es la razón por la cual quiere adoptar a la mascota?</label>
                                    <input type="text" class="form-control" placeholder="Ej: Quiero adptar una mascota porque.." required name="adopRazon">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>¿Cuántas horas al día estará sola en casa la mascota?</label>
                                    <input type="text" class="form-control" placeholder="Ej: 2 horas." required name="adopHorMascota">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Si tiene que salir de emergencia de su ciudad, ¿con quién dejaría a su nuevo amigo?</label>
                                    <input type="text" class="form-control" placeholder="Ej: La dejaría con mi familiar." required name="adopSalida">
                                </div>
                                <div class="form-group col-lg-12">
                                   <label>¿Está de acuerdo que se le haga una visita previa a la mascota en su dirección de residencia?</label><br>
                                       <input type="radio" value="1" name="adopVisita" required>
                                       <label for="radio">Sí</label><br>
                                       <input type="radio" value="2" name="adopVisita" required>
                                       <label for="radio">No</label>
                                </div>
                                             
                               </div>
                                         
                               <button type="submit" class="btn btn-main-sm btn-flat m-b-30 m-t-30">Enviar</button>
         
                            </form> -->

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