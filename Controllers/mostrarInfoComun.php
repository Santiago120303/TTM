<?php

//Este archivo recibe todas las consultas del modelo para mostrar la información al los usuarios que ingresan al sito web
function cargarFundacionesComun()
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarFundacionesTodos();

    if (!isset($result)) {
        echo '<h2>No hay fundaciones registradas</h2>';  //' . $f['id_user'] . '
    } else {

        foreach ($result as $f) {
            echo '
                <div class="col-lg-4 col-md-6">
                    <!-- product card -->
                    <div class="product-item bg-light">
                        <div class="card pb-0 card-fundaciones">
                            <div class="thumb-content">
                                <!-- <div class="price">$200</div> -->
                                    <h4 class="card-title text-center mb-3"><a href="fundacion_especifica.php?id='.$f['id_user'].'">' . $f['nombre'] . '</a></h4>
                                <a href="fundacion_especifica.php?id='.$f['id_user'].'">
                                    <img class="card-img-top img-fluid" style="min-height:100px" src="../' . $f['foto'] . '" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <p class="m-0 pb-2" style="font-size:17px; color: #333333;">' . $f['localidad'] . '</p>
                                <p class="m-0 pb-2" style="font-size:17px; color: #333333;">' . $f['email'] . '</p>
                                <p class="m-0 pb-2" style="font-size:17px; color: #333333;">' . $f['telefono'] . '</p>
                                <div class="product-ratings">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
        }
    }
}

function fitroFundaciones($nombrefun, $localidadfun)
{

    $objConsultas = new Consultas();
    $result = $objConsultas->filtrarFundacion($nombrefun, $localidadfun);

    if (isset($result)) {
        foreach ($result as $f) {
            echo '
                <div class="col-lg-4 col-md-6">
                    <!-- product card -->
                    <div class="product-item bg-light">
                        <div class="card pb-0 card-fundaciones">
                            <div class="thumb-content">
                                <!-- <div class="price">$200</div> -->
                                    <h4 class="card-title text-center mb-3"><a href="fundacion_especifica.php?id='.$f['id_user'].'">' . $f['nombre'] . '</a></h4>
                                <a href="fundacion_especifica.php?id='.$f['id_user'].'">
                                    <img class="card-img-top img-fluid" style="min-height:100px" src="../' . $f['foto'] . '" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <p class="m-0 pb-2">' . $f['localidad'] . '</p>
                                <p class="m-0 pb-2">' . $f['email'] . '</p>
                                <p class="m-0 pb-2">' . $f['telefono'] . '</p>
                                <div class="product-ratings">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
            }
    } else {
        
        echo '<h2>No existen fundaciones registradas con estas caracteristicas</h2>';  //' . $f['id_user'] . '

    }
}

function MostrarFundacionEspecificaSidebar()
{
    //Se aterriza el Id de la fundacion enviado por el metodo GET (URL)
    $id_fundacion = $_GET['id'];

    //Se evia la el ID de la fundacion a una funcion de la clase consultas con el fin de traer la informacion de esta fundacion en especifico
    $objConsultas = new Consultas();
    $result = $objConsultas->MostrarInfoFunEspecifica($id_fundacion);

        //Pintamos la información consultada en el artefacto (FORM)

        foreach ($result as $f) {
            echo  '
				<div class="col-lg-4">
					<div class="sidebar">
						
							<div class="widget archive">
							
							<a href="fundacion_especifica.php?id='.$f['id_user'].'"><img class="w-100 mb-4"
									src="../'.$f['foto'].'" alt="logo de la fundación">
							</a>



							<a href="mascotas_fundacion_especifica.php?id='.$f['id_user'].'" class="btn btn-login mb-4">Mascotas</a>
							<a href="eventos.php" class="btn btn-login mb-4">Eventos</a>



                                
							<p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['localidad'].'</p></a>
							<p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['direccion'].'</p></a>
							<a href="mailto:'.$f['email'].'"><p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['email'].'</p></a>
							<a href="whatsapp://send?phone='.$f['telefono'].'&text=Hola%2C%20me%20gustar%C3%ADa%20saber%20m%C3%A1s%20acerca%20de%20su%20fundaci%C3%B3n."><p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['telefono'].'</p></a>

							<a href="donaciones.php" class="btn btn-success mt-4" style="text-transform:Uppercase;" >Donar</a>

						</div>
	
					</div>
				</div>

                ';
        }




}
function MostrarFundacionEspecificaInfo()
{
    //Se aterriza el Id de la fundacion enviado por el metodo GET (URL)
    $id_fundacion = $_GET['id'];

    //Se evia la el ID de la fundacion a una funcion de la clase consultas con el fin de traer la informacion de esta fundacion en especifico
    $objConsultas = new Consultas();
    $result = $objConsultas->MostrarInfoFunEspecifica($id_fundacion);

        //Pintamos la información consultada en el artefacto (FORM)

        foreach ($result as $f) {
            echo  '
				<div class="col-lg-8">
					<article class="single-post">
						<a class="d-block w-100 text-right font-weight-bold align-items-center" href="fundaciones.php"><i class="fa-solid fa-arrow-left mr-2"></i>Volver</a>
						<h2 class="text-center mb-4">'.$f['nombre'].'</h2>
						<div class="row d-flex align-items-center">';
                echo'<div class="col-lg-6">
                            <h3>Descripción</h3>';
                                if (strlen($f['descripcion']) == 0) {
                                    echo '<p>No se ha subido la descripción de la fundación, estamos trabajando en ello.</p>';
                                } else {
                                    echo '<p>' . $f['descripcion'] . '</p>';
                                }
                echo '</div>
                        <div id="carouselExampleSlidesOnly" class="col-lg-6 carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../../Uploads/fundaciones/fun1.jpg" class="d-block w-100" alt="foto fundacion 1 de 4">
                                </div>
                                <div class="carousel-item">
                                    <img src="../../Uploads/fundaciones/fun2.jpg" class="d-block w-100" alt="foto fundacion 2 de 4">
                                </div>
                                <div class="carousel-item">
                                    <img src="../../Uploads/fundaciones/fun4.jpg" class="d-block w-100" alt="foto fundacion 3 de 4">
                                </div>
                                <div class="carousel-item">
                                    <img src="../../Uploads/fundaciones/fun5.jpg" class="d-block w-100" alt="foto fundacion 4 de 4">
                                </div>
                            </div>
                        </div>
                '; 
                 
                echo'<div class="col-lg-12">
                            <h3>Misión</h3>';
                                if (strlen($f['mision']) == 0) {
                                    echo '<p>No se ha subido la misión de la fundación, estamos trabajando en ello.</p>';
                                } else {
                                    echo '<p>' . $f['mision'] . '</p>';
                                }
                echo '</div>';       
                echo'<div class="col-lg-12">
                            <h3>Visión</h3>';
                                if (strlen($f['vision']) == 0) {
                                    echo '<p>No se ha subido la visión de la fundación, estamos trabajando en ello.</p>';
                                } else {
                                    echo '<p>' . $f['vision'] . '</p>';
                                }
                echo '</div>  
                        </div>
					</article>
				</div>

                ';
        }




}
function VolverFundacionEspecificaInfo()
{
    //Se aterriza el Id de la fundacion enviado por el metodo GET (URL)
    $id_fundacion = $_GET['id'];

    //Se evia la el ID de la fundacion a una funcion de la clase consultas con el fin de traer la informacion de esta fundacion en especifico
    $objConsultas = new Consultas();
    $result = $objConsultas->MostrarInfoFunEspecifica($id_fundacion);

    foreach ($result as $f) {
        echo  '
			    <a class="d-block w-100 text-right font-weight-bold align-items-center" href="fundacion_especifica.php?id=' . $f['id_user'] . '"><i class="fa-solid fa-arrow-left mr-2"></i>Volver</a>
            '; 
    }
}

function MostrarMascotasFundacionEspecificaComun()
{
    //Se aterriza el Id de la fundacion enviado por el metodo GET (URL)
    $id_fundacion = $_GET['id'];

    //Se evia la el ID de la fundacion a una funcion de la clase consultas con el fin de traer la informacion de esta fundacion en especifico
    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarMascotasFundacionEspecificaComun($id_fundacion);

        //Pintamos la información consultada en el artefacto (FORM)

        foreach ($result as $f) {
            echo  '
                    <div class="col-lg-6">
                        <div class="product-item bg-light" >
                            <div class="card pb-0 card-mascotas">
                                <div class="thumb-content">

                                    <a href="mascota_especifica_fundacion.php?id='.$f['masId'].'">
                                        <img class="card-img-top img-fluid mb-0" style="min-height:100px"
                                            src="../' . $f['masFoto'] . '" alt="Imagen de la mascota">
                                    </a>
                                    
                                </div>
                                <div class="card-body">
                                    <a href="mascota.php">
                                        <h4 class="card-title text-center mb-3"><a href="mascota_especifica_fundacion.php?id='.$f['masId'].'">' . $f['masNombre'] . '</a></h4>
                                    </a>

                                    <p class="m-0 pb-2"><b>Especie: </b>' . $f['especie'] . '</p>
                                    <p class="m-0 pb-2"><b>Raza: </b>' . $f['masRaza'] . '</p>
                                    <p class="m-0 pb-2"><b>Sexo: </b>' . $f['mascota_sexo'] . '</p>
                                    <p class="m-0 pb-2"><b>Edad: </b>' . $f['masEdad'] . ' años</p>
                                </div>
                            </div>
                        </div>
                    </div>
                '; 
        }
}

function MostrarMascotaFundacionEspecificaSidebar()
{
    //Se aterriza el Id de la fundacion enviado por el metodo GET (URL)
    $id_mascota = $_GET['id'];

    //Se evia la el ID de la fundacion a una funcion de la clase consultas con el fin de traer la informacion de esta fundacion en especifico
    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarMascotaFundacionEspecificaComun($id_mascota);

        //Pintamos la información consultada en el artefacto (FORM)

        foreach ($result as $f) {
            echo  '
				<div class="col-lg-4">
					<div class="sidebar">
						
							<div class="widget archive">
							
							<a href="fundacion_especifica.php?id='.$f['id_user'].'"><img class="w-100 mb-4"
									src="../'.$f['foto'].'" alt="logo de la fundación">
							</a>



							<a href="mascotas_fundacion_especifica.php?id='.$f['id_user'].'" class="btn btn-login mb-4">Mascotas</a>
							<a href="eventos.php" class="btn btn-login mb-4">Eventos</a>



                                
							<p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['localidad'].'</p></a>
							<p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['direccion'].'</p></a>
							<a href="mailto:'.$f['email'].'"><p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['email'].'</p></a>
							<a href="whatsapp://send?phone='.$f['telefono'].'&text=Hola%2C%20me%20gustar%C3%ADa%20saber%20m%C3%A1s%20acerca%20de%20su%20fundaci%C3%B3n."><p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['telefono'].'</p></a>

							<a href="donaciones.php" class="btn btn-success mt-4" style="text-transform:Uppercase;" >Donar</a>

						</div>
	
					</div>
				</div>

                ';
        }

}


function MostrarMascotaFundacionEspecificaComun() {
    // Se obtiene el ID de la mascota enviado por el método GET (URL)
    $id_mascota = isset($_GET['id']) ? $_GET['id'] : null;

    // Verificamos que se haya proporcionado un ID válido
    if (!$id_mascota) {
        echo "Error: ID de mascota no válido.";
        return;
    }

    // Se instancia el objeto Consultas
    $objConsultas = new Consultas();

    // Se llama a la función para obtener la información de la mascota específica
    $result = $objConsultas->mostrarMascotaFundacionEspecificaComun($id_mascota);

    // Verificamos que se haya obtenido algún resultado
    if (!$result) {
        echo "Error: No se encontró la mascota con el ID proporcionado.";
        return;
    }

    // Pintamos la información consultada en el artefacto (FORM)
    foreach ($result as $f) {
        echo  '
            <div class="col-lg-6">
                <p class="p-0 m-0" style="color:#333333; text-align:center;">Registrado por '.$f['nombre'].' <br>  '.$f['masFecRegistro'].' </p>
                <div class="product-item bg-light">
                    <div class="card pb-0">
                        <div class="thumb-content">
                            <a href="mascota_especifica_fundacion.php?id=' . $f['id_fun_mas_fk'] . '">
                                <img class="card-img-top img-fluid mb-0" style="min-height:100px" src="../' . $f['masFoto'] . '"
                                    alt="Imagen de la mascota">
                            </a>
                        </div>
                        <div class="card-body p-0">
                            <a href="mascota.php">
                                <h4 class="card-title text-center my-3" style="font-size:25px; color:#333333;">' .$f['masNombre'] . '</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <p class="m-0 pb-2 pl-3" style="font-size:18px; color:#333333;"><b>Especie: </b>' . $f['especie'] . '</p>
                <p class="m-0 pb-2 pl-3" style="font-size:18px; color:#333333;"><b>Raza: </b>' . $f['masRaza'] . '</p>
                <p class="m-0 pb-2 pl-3" style="font-size:18px; color:#333333;"><b>Sexo: </b>' . $f['mascota_sexo'] . '</p>
                <p class="m-0 pb-2 pl-3" style="font-size:18px; color:#333333;"><b>Edad: </b>' . $f['masEdad'] . ' años</p>
                <a href="#" class="btn btn-login mt-5 align-self-end">Adoptar</a>
            </div>
            <div class="col-lg-12">
                <p class="m-0 pb-5 pl-3" style="font-size:18px; color:#333333;"><b>Vacunas: </b> '.$f['masVacunas'].' ( ' . obtenerVacunas($f) . ')</p>
            </div>
            <div class="col-lg-12">
                <p class="m-0 pb-5 pl-3" style="font-size:18px; color:#333333;"><b>Personalidad: </b>' . $f['masPersonalidad'] . '</p>
            </div>
            <div class="col-lg-12">
                <p class="m-0 pb-5 pl-3" style="font-size:18px; color:#333333;"><b>Estado de salud: </b>' . $f['masEstSalud'] . '</p>
            </div>
            <div class="col-lg-12">
                <p class="m-0 pb-5 pl-3" style="font-size:18px; color:#333333;"><b>Historia: </b>' . $f['masHistoria'] . '</p>
            </div>
            <div class="col-lg-12">
                <p class="m-0 pb-5 pl-3" style="font-size:18px; color:#333333;"><b>Requisitos de adopción: </b>' . $f['masReqAdopcion'] . '</p>
            </div>
        '; 
    }
}

// Función auxiliar para obtener las vacunas de la mascota
function obtenerVacunas($f) {
    $vacunas = [$f['masVacuna1'], $f['masVacuna2'], $f['masVacuna3'], $f['masVacuna4']];
    $vacunas = array_filter($vacunas); // Elimina elementos vacíos
    return implode(', ', $vacunas);
}


function cargarMascotasComun()
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarMascotasComun();

    if (!isset($result)) {
        echo '<h2>No existen fundaciones registradas</h2>';  //' . $f['id_user'] . '
    } else {

        foreach ($result as $f) {
            echo ' 
                <div class="col-lg-4 col-md-6">
                    <!-- mascotas card -->
                    <div class="product-item bg-light" >
                        <div class="card pb-0 card-mascotas">
                            <div class="thumb-content">

                                <a href="mascota_especifica_fundacion.php?id=' .$f['masId'] . '">
                                    <img class="card-img-top img-fluid" style="min-height:100px"
                                        src="../' . $f['masFoto'] . '" alt="Imagen de la mascota">
                                </a>
                                
                            </div>
                            <div class="card-body">
                                <a href="mascota_especifica_fundacion.php?id=' .$f['masId'] . '">
                                    <h4 class="card-title text-center mb-3"><a href="mascota.php" style="color:#333333;">' .$f['masNombre'] . '</a></h4>
                                </a>

                                <p class="m-0 pb-2" style="color:#333333; "><b>Especie: </b>' . $f['especie'] . '</p>
                                <p class="m-0 pb-2" style="color:#333333; "><b>Raza: </b>' . $f['masRaza'] . '</p>
                                <p class="m-0 pb-2" style="color:#333333; "><b>Sexo: </b>' . $f['mascota_sexo'] . '</p>
                                <p class="m-0 pb-2" style="color:#333333; "><b>Edad: </b>' . $f['masEdad'] . ' años</p>
                                <div class="product-ratings">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
    }
}

function filtroMascotas ($masEspecie, $masEdad, $masSexo, $masRaza)
{

    $objConsultas = new Consultas();
    $result = $objConsultas->filtrarMascotas($masEspecie, $masEdad, $masSexo, $masRaza);

    if (isset($result)) {
        foreach ($result as $f) {
            echo '
            <div class="col-lg-4 col-md-6">
                <!-- mascotas card -->
                <div class="product-item bg-light" >
                    <div class="card pb-0 card-mascotas">
                        <div class="thumb-content">

                            <a href="mascota_especifica_fundacion.php?id=' .$f['masId'] . '">
                                <img class="card-img-top img-fluid" style="min-height:100px"
                                    src="../' . $f['masFoto'] . '" alt="Imagen de la mascota">
                            </a>
                            
                        </div>
                        <div class="card-body">
                            <a href="mascota_especifica_fundacion.php?id=' .$f['masId'] . '">
                                <h4 class="card-title text-center mb-3"><a href="mascota.php">' .$f['masNombre'] . '</a></h4>
                            </a>

                            <p class="m-0 pb-2"><b>Especie: </b>' . $f['especie'] . '</p>
                            <p class="m-0 pb-2"><b>Raza: </b>' . $f['masRaza'] . '</p>
                            <p class="m-0 pb-2"><b>Sexo: </b>' . $f['mascota_sexo'] . '</p>
                            <p class="m-0 pb-2"><b>Edad: </b>' . $f['masEdad'] . ' años</p>
                            <div class="product-ratings">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                ';
            }
    } else {
        
        echo '<h2>No existen fundaciones registradas con estas caracteristicas</h2>';  //' . $f['id_user'] . '

    }
}

// function cargarEventos()
// {

//     $objConsultas = new Consultas();
//     $result = $objConsultas->mostrarEventosClientsite();

//     if (!isset($result)) {
//         echo '<h2>NO HAY EVENTOS REGISTRADOS</h2>';
//     } else {

//         foreach ($result as $f) {
//             echo '
//                     <div class="col-lg-4 col-md-6">
//                         <!-- product card -->
//                         <div class="product-item bg-light">
//                             <div class="card">
//                                 <div class="thumb-content">
//                                     <h4 class="card-title text-center mb-3">
//                                         <a href="fundacion.php">' . $f['eveNombre'] . '</a>
//                                     </h4>
//                                     <a  class="bg-mascota" href="fundacion.php">
//                                         <img class="card-img-top img-fluid" src="../' . $f['eveImg'] . '" alt="Imagen de evento">
//                                     </a>
//                                 </div>
//                                 <div class="card-body">
//                                     <ul class="list-inline product-meta">
//                                         <li class="list-inline-item">
//                                             <a href="fundacion.php"><i class="fa fa-calendar"  style="color: #4942e4;"></i>' . $f['eveFecha'] . '</a>
//                                         </li>
//                                         <li class="list-inline-item">
//                                             <a href="category.php"><i class="fa-solid fa-clock" style="color: #4942e4;"></i>' . $f['eveHora'] . '</a>
//                                         </li>
//                                         <li class="list-inline-item">
//                                             <a href="category.php"><i class="fa-sharp fa-solid fa-location-dot"  style="color: #4942e4;"></i>' . $f['eveDireccion'] . '</a>
//                                         </li>
//                                     </ul>
//                                 </div>
//                             </div>
//                         </div>
//                     </div>
//                 ';
//         }
//     }
// }

function buscarNombreEvento ($eveNombre)
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarNombreEvento($eveNombre);

    if (isset($result)) {
        foreach ($result as $f) {
            echo '
            <div class="col-lg-4 col-md-6">
                <!-- product card -->
                <div class="product-item bg-light">
                    <div class="card">
                        <div class="thumb-content">
                            <a  class="bg-mascota" href="fundacion.php">
                                <img class="card-img-top img-fluid"
                                    src="../' . $f['foto'] . '"
                                    alt="Card image cap">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title text-center">
                            <a href="fundacion.php">' . $f['eveNombre'] . '</a>
                            </h4>
                            <ul class="list-inline product-meta">
                                <li class="list-inline-item">
                                    <a href="fundacion.php"><i class="fa fa-calendar"  style="color: #4942e4;"></i>' . $f['eveFecha'] . '</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="category.php"><i class="fa-solid fa-clock" style="color: #4942e4;"></i>' . $f['eveHora'] . '</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="category.php"><i class="fa-sharp fa-solid fa-location-dot"  style="color: #4942e4;"></i>' . $f['eveDireccion'] . '</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
                ';
            }
    } else {
        
        echo '<h2>NO HAY FUNDACIONES REGISTRADAS</h2>';  //' . $f['id_user'] . '

    }
}





?>