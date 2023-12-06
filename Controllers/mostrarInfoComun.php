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
                                    <h4 class="card-title text-center mb-3"><a href="fundacion_especifica.php?id='.$f['id_user'].'" style="color:#333333; font-size:smaller;">' . $f['nombre'] . '</a></h4>
                                <a href="fundacion_especifica.php?id='.$f['id_user'].'">
                                    <img class="card-img-top img-fluid" style="min-height:100px" src="../' . $f['foto'] . '" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="m-0 pb-2" style="color:#333333;"><b>Localidad: </b> <br>' . $f['localidad'] . '</p>
                                <p class="m-0 pb-2" style="color:#333333;"><b>Email: </b> <br>' . $f['email'] . '</p>
                                <p class="m-0 pb-2" style="color:#333333;"><b>Telefono: </b> <br>' . $f['telefono'] . '</p>
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
                                    <h4 class="card-title text-center mb-3"><a href="fundacion_especifica.php?id='.$f['id_user'].'" style="color:#333333; font-size:smaller;">' . $f['nombre'] . '</a></h4>
                                <a href="fundacion_especifica.php?id='.$f['id_user'].'">
                                    <img class="card-img-top img-fluid" style="min-height:100px" src="../' . $f['foto'] . '" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="m-0 pb-2" style="color:#333333;"><b>Localidad: </b> <br>' . $f['localidad'] . '</p>
                                <p class="m-0 pb-2" style="color:#333333;"><b>Email: </b> <br>' . $f['email'] . '</p>
                                <p class="m-0 pb-2" style="color:#333333;"><b>Telefono: </b> <br>' . $f['telefono'] . '</p>
                                <div class="product-ratings">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
            }
    } else {
        
        echo '<h2 style="text-align:center;">No se encontraron fundaciones que coincidan con las características seleccionadas.</h2>';  //' . $f['id_user'] . '

    }
}

// Función para traer el sidebar de fundacion especifica

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
							<a href="eventos_fundacion_especifica.php?id='.$f['id_user'].'" class="btn btn-login mb-4">Eventos</a>
                            
                            <div mb-4">
                                <h3 class="text-center mb-2" style="font-size:25px;">Donar</h3>
                                <div class="row d-flex align-items-center pb-4">
                                    <div class="col-4 mb-3">
                                        <img src="../../Uploads/fundaciones/nequi.png" class="d-block w-100" style="border-radius:100%;" alt="foto fundacion 3 de 4">
                                    </div>
                                    <div class="col-8 mb-3">';
                                    echo strlen($f['numero_nequi']) <= 0 ? ' <p  class="text-center mb-2 num-donar">No tiene</p>' : '<p  class="text-center mb-2 num-donar">'.$f['numero_nequi'].'</p>';
                                    echo '</div>
                                    <div class="col-4">
                                        <img src="../../Uploads/fundaciones/daviplata.png" class="d-block w-100" style="border-radius:100%;" alt="foto fundacion 3 de 4">
                                    </div>
                                    <div class="col-8">';
                                        echo strlen($f['numero_daviplata']) <= 0 ? ' <p  class="text-center mb-2 num-donar">No tiene</p>' : '<p  class="text-center mb-2 num-donar">'.$f['numero_daviplata'].'</p>';
                                    echo'</div>
                                </div>
                            </div>

                        
							<p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['localidad'].'</p></a>
							<p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['direccion'].'</p></a>
							<a href="mailto:'.$f['email'].'"><p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['email'].'</p></a>
							<a href="whatsapp://send?phone='.$f['telefono'].'&text=Hola%2C%20me%20gustar%C3%ADa%20saber%20m%C3%A1s%20acerca%20de%20su%20fundaci%C3%B3n."><p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['telefono'].'</p></a>


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
                                if (strlen($f['descripcion']) == 0 && strlen($f['foto_fun_1']) == 0 && strlen($f['foto_fun_2']) == 0 && strlen($f['foto_fun_3']) == 0 && strlen($f['foto_fun_4']) == 0) {
                                    echo '
                                    <div class="col-lg-12">
                                        <h3>Descripción</h3>
                                        <p style="color:#333333;" >No se ha subido la descripción de la fundación, estamos trabajando en ello.</p>
                                    </div>';
                                } elseif (strlen($f['descripcion']) > 0 && strlen($f['foto_fun_1']) == 0 && strlen($f['foto_fun_2']) == 0 && strlen($f['foto_fun_3']) == 0 && strlen($f['foto_fun_4']) == 0){
                                 echo '
                                    <div class="col-lg-12">
                                        <h3>Descripción</h3>
                                        <p style="color:#333333;" >' . $f['descripcion'] . '</p>
                                    </div>';
                                }elseif (strlen($f['descripcion']) > 0 && strlen($f['foto_fun_1']) > 0 && strlen($f['foto_fun_2']) == 0 && strlen($f['foto_fun_3']) == 0 && strlen($f['foto_fun_4']) == 0){
                                    echo '
                                        <div class="col-lg-6">
                                            <h3>Descripción</h3>
                                            <p style="color:#333333;" >' . $f['descripcion'] . '</p>
                                        </div>
                                        <div id="carouselExampleSlidesOnly" class="col-lg-6 carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="../' . $f['foto_fun_1'] . '" class="d-block w-100" alt="foto fundacion 1 de 4">
                                                </div>
                                            </div>
                                        </div>    ';
                                   }elseif (strlen($f['descripcion']) > 0 && strlen($f['foto_fun_1']) > 0 && strlen($f['foto_fun_2']) > 0 && strlen($f['foto_fun_3']) == 0 && strlen($f['foto_fun_4']) == 0){
                                    echo '
                                        <div class="col-lg-6">
                                            <h3>Descripción</h3>
                                            <p style="color:#333333;" >' . $f['descripcion'] . '</p>
                                        </div>
                                        <div id="carouselExampleSlidesOnly" class="col-lg-6 carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="../' . $f['foto_fun_1'] . '" class="d-block w-100" alt="foto fundacion 1 de 4">
                                                </div>
                                                <div class="carousel-item active">
                                                    <img src="../' . $f['foto_fun_2'] . '" class="d-block w-100" alt="foto fundacion 2 de 4">
                                                </div>
                                            </div>
                                        </div>    ';
                                   }elseif (strlen($f['descripcion']) > 0 && strlen($f['foto_fun_1']) > 0 && strlen($f['foto_fun_2']) > 0 && strlen($f['foto_fun_3']) > 0 && strlen($f['foto_fun_4']) == 0){
                                    echo '
                                        <div class="col-lg-6">
                                            <h3>Descripción</h3>
                                            <p style="color:#333333;" >' . $f['descripcion'] . '</p>
                                        </div>
                                        <div id="carouselExampleSlidesOnly" class="col-lg-6 carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="../' . $f['foto_fun_1'] . '" class="d-block w-100" alt="foto fundacion 1 de 4">
                                                </div>
                                                <div class="carousel-item active">
                                                    <img src="../' . $f['foto_fun_2'] . '" class="d-block w-100" alt="foto fundacion 2 de 4">
                                                </div>
                                                <div class="carousel-item active">
                                                    <img src="../' . $f['foto_fun_3'] . '" class="d-block w-100" alt="foto fundacion 3 de 4">
                                                </div>
                                            </div>
                                        </div>    ';
                                   }elseif (strlen($f['descripcion']) > 0 && strlen($f['foto_fun_1']) > 0 && strlen($f['foto_fun_2']) > 0 && strlen($f['foto_fun_3']) > 0 && strlen($f['foto_fun_4']) > 0){
                                    echo '
                                        <div class="col-lg-6">
                                            <h3>Descripción</h3>
                                            <p style="color:#333333;" >' . $f['descripicion'] . '</p>
                                        </div>
                                        <div id="carouselExampleSlidesOnly" class="col-lg-6 carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="../' . $f['foto_fun_1'] . '" class="d-block w-100" alt="foto fundacion 1 de 4">
                                                </div>
                                                <div class="carousel-item active">
                                                    <img src="../' . $f['foto_fun_2'] . '" class="d-block w-100" alt="foto fundacion 2 de 4">
                                                </div>
                                                <div class="carousel-item active">
                                                    <img src="../' . $f['foto_fun_3'] . '" class="d-block w-100" alt="foto fundacion 3 de 4">
                                                </div>
                                                <div class="carousel-item active">
                                                    <img src="../' . $f['foto_fun_4'] . '" class="d-block w-100" alt="foto fundacion 4 de 4">
                                                </div>
                                            </div>
                                        </div>    ';
                                   }
                echo'<div class="col-lg-12">
                            <h3>Misión</h3>';
                                if (strlen($f['mision']) == 0) {
                                    echo '<p style="color:#333333;" >No se ha subido la misión de la fundación, estamos trabajando en ello.</p>';
                                } else {
                                    echo '<p style="color:#333333;" >' . $f['mision'] . '</p>';
                                }
                echo '</div>';       
                echo'<div class="col-lg-12">
                            <h3>Visión</h3>';
                                if (strlen($f['vision']) == 0) {
                                    echo '<p style="color:#333333;" >No se ha subido la visión de la fundación, estamos trabajando en ello.</p>';
                                } else {
                                    echo '<p style="color:#333333;" >' . $f['vision'] . '</p>';
                                }
                echo '</div>  
                        </div>
					</article>
				</div>

                ';
        }




}

// Función que retorna a la sección de información de la fundación después de que se ingresa a mascotas o eventos específicos de una fundación.

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

function MostrarMascotasFundacionEspecificaComun() {
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
                                        <h4 class="card-title text-center mb-3"><a href="mascota_especifica_fundacion.php?id='.$f['masId'].'" style="color:#333333;">' . $f['masNombre'] . '</a></h4>
                                    </a>

                                    <p class="m-0 pb-2" style="color:#333333; "><b>Especie: </b>' . $f['especie'] . '</p>
                                    <p class="m-0 pb-2" style="color:#333333; "><b>Raza: </b>' . $f['masRaza'] . '</p>
                                    <p class="m-0 pb-2" style="color:#333333; "><b>Sexo: </b>' . $f['mascota_sexo'] . '</p>
                                    <p class="m-0 pb-2" style="color:#333333; "><b>Edad: </b>' . $f['masEdad'] . '</p>

                                </div>
                            </div>
                        </div>
                    </div>
                '; 
        }
}

function MostrarMascotaFundacionEspecificaSidebar(){
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
							<a href="eventos_fundacion_especifica.php?id='.$f['id_user'].'" class="btn btn-login mb-4">Eventos</a>

                            <div mb-4">
                                <h3 class="text-center mb-2" style="font-size:25px;">Donar</h3>
                                <div class="row d-flex align-items-center pb-4">
                                    <div class="col-4 mb-3">
                                        <img src="../../Uploads/fundaciones/nequi.png" class="d-block w-100" style="border-radius:100%;" alt="foto fundacion 3 de 4">
                                    </div>
                                    <div class="col-8 mb-3">';
                                    echo strlen($f['numero_nequi']) <= 0 ? ' <p  class="text-center mb-2 num-donar">No tiene</p>' : '<p  class="text-center mb-2 num-donar">'.$f['numero_nequi'].'</p>';
                                    echo '</div>
                                    <div class="col-4">
                                        <img src="../../Uploads/fundaciones/daviplata.png" class="d-block w-100" style="border-radius:100%;" alt="foto fundacion 3 de 4">
                                    </div>
                                    <div class="col-8">';
                                        echo strlen($f['numero_daviplata']) <= 0 ? ' <p  class="text-center mb-2 num-donar">No tiene</p>' : '<p  class="text-center mb-2 num-donar">'.$f['numero_daviplata'].'</p>';
                                    echo'</div>
                                </div>
                            </div>

							<p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['localidad'].'</p></a>
							<p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['direccion'].'</p></a>
							<a href="mailto:'.$f['email'].'"><p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['email'].'</p></a>
							<a href="whatsapp://send?phone='.$f['telefono'].'&text=Hola%2C%20me%20gustar%C3%ADa%20saber%20m%C3%A1s%20acerca%20de%20su%20fundaci%C3%B3n."><p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['telefono'].'</p></a>


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
                            <a href="#">
                                <img class="card-img-top img-fluid mb-0" style="min-height:100px" src="../' . $f['masFoto'] . '"
                                    alt="Imagen de la mascota">
                            </a>
                        </div>
                        <div class="card-body p-0">
                            <a href="#">
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
                <a href="#" id="open" class="btn btn-login mt-5 align-self-end">Adoptar</a>
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

function MostrarMascotaFundacionEspecificaCliete() {
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
                            <a href="#">
                                <img class="card-img-top img-fluid mb-0" style="min-height:100px" src="../' . $f['masFoto'] . '"
                                    alt="Imagen de la mascota">
                            </a>
                        </div>
                        <div class="card-body p-0">
                            <a href="#">
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
                <a href="for_adop.php?id='.$f['masId'].'" class="btn btn-login mt-5 align-self-end">Adoptar</a>
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
                            <div class="card-body pt-0">
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
                        <div class="card-body pt-0">
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
    } else {
        
        echo '<h2 style="text-align:center;">No se encontraron mascotas que coincidan con las características seleccionadas.</h2>';  //' . $f['id_user'] . '

    }
}

function cargarEventosComun(){
    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarEventosComun();

    if (!isset($result)) {
        echo '<h2>No existen eventos registrados</h2>';  //' . $f['id_user'] . '
    } else {

        foreach ($result as $f) {
            echo ' 
                <div class="col-lg-4 col-md-6">
                <!-- product card -->
                <div class="product-item bg-light">
                    <div class="card pb-0 card-fundaciones">
                        <div class="thumb-content">
                            <!-- <div class="price">$200</div> -->
                                <h4 class="card-title text-center mb-3"><a href="evento_especifico_fundacion.php?id='.$f['eveId'].'" style="color:#333333; font-size:smaller; min-height:44px;">' . $f['eveNombre'] . '</a></h4>
                            <a href="evento_especifico_fundacion.php?id='.$f['eveId'].'">
                                <img class="card-img-top img-fluid" style="min-height:100px" src="../' . $f['eveFoto'] . '" alt="Card image cap">
                            </a>
                        </div>
                        <div class="card-body">
                            <p class="m-0 pb-2" style="color:#333333;"><b>Fecha: </b> <br>' . $f['eveFecha'] . '</p>
                            <p class="m-0 pb-2" style="color:#333333;"><b>Dirección: </b> <br>' . $f['eveDireccion'] . '</p>
                            <p class="m-0 pb-2" style="color:#333333;"><b>Hora: </b> <br>' . $f['eveHoraInicio'] . '</p>
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

function filtroEventos ($eveNombre, $eveFecha){

    $objConsultas = new Consultas();
    $result = $objConsultas->filtrarEventos($eveNombre, $eveFecha);

    if (isset($result)) {
        foreach ($result as $f) {
            echo '
            <div class="col-lg-4 col-md-6">
            <!-- product card -->
            <div class="product-item bg-light">
                <div class="card pb-0 card-fundaciones">
                    <div class="thumb-content">
                        <!-- <div class="price">$200</div> -->
                            <h4 class="card-title text-center mb-3"><a href="evento_especifico_fundacion.php?id='.$f['eveId'].'" style="color:#333333; font-size:smaller; min-height:44px;">' . $f['eveNombre'] . '</a></h4>
                        <a href="evento_especifico_fundacion.php?id='.$f['eveId'].'">
                            <img class="card-img-top img-fluid" style="min-height:100px" src="../' . $f['eveFoto'] . '" alt="Card image cap">
                        </a>
                    </div>
                    <div class="card-body">
                        <p class="m-0 pb-2" style="color:#333333;"><b>Fecha: </b> <br>' . $f['eveFecha'] . '</p>
                        <p class="m-0 pb-2" style="color:#333333;"><b>Dirección: </b> <br>' . $f['eveDireccion'] . '</p>
                        <p class="m-0 pb-2" style="color:#333333;"><b>Hora: </b> <br>' . $f['eveHoraInicio'] . '</p>
                        <div class="product-ratings">
                        </div>
                    </div>
                </div>
            </div>
        </div>
                ';
            }
    } else {
        
        echo '<h2 style="text-align:center;">No se encontraron eventos que coincidan con las características seleccionadas.</h2>';  //' . $f['id_user'] . '

    }
}

function MostrarEventosFundacionEspecificaComun() {
    //Se aterriza el Id de la fundacion enviado por el metodo GET (URL)
    $id_fundacion = $_GET['id'];

    //Se evia la el ID de la fundacion a una funcion de la clase consultas con el fin de traer la informacion de esta fundacion en especifico
    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarEventosFundacionEspecificaComun($id_fundacion);

        //Pintamos la información consultada en el artefacto (FORM)

        foreach ($result as $f) {
            echo  '
            <div class="col-lg-6">
                <!-- product card -->
                <div class="product-item bg-light">
                    <div class="card pb-0 card-fundaciones">
                        <div class="thumb-content">
                            <!-- <div class="price">$200</div> -->
                                <h4 class="card-title text-center mb-3"><a href="evento_especifico_fundacion.php?id='.$f['eveId'].'" style="color:#333333; font-size:smaller; min-height:44px;">' . $f['eveNombre'] . '</a></h4>
                            <a href="evento_especifico_fundacion.php?id='.$f['eveId'].'">
                                <img class="card-img-top img-fluid" style="min-height:100px" src="../' . $f['eveFoto'] . '" alt="Card image cap">
                            </a>
                        </div>
                        <div class="card-body">
                            <p class="m-0 pb-2" style="color:#333333;"><b>Fecha: </b> <br>' . $f['eveFecha'] . '</p>
                            <p class="m-0 pb-2" style="color:#333333;"><b>Dirección: </b> <br>' . $f['eveDireccion'] . '</p>
                            <p class="m-0 pb-2" style="color:#333333;"><b>Hora: </b> <br>' . $f['eveHoraInicio'] . '</p>
                            <div class="product-ratings">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                '; 
        }
}

function MostrarEventoFundacionEspecificaSidebar(){
    //Se aterriza el Id de la fundacion enviado por el metodo GET (URL)
    $id_evento = $_GET['id'];

    //Se evia la el ID de la fundacion a una funcion de la clase consultas con el fin de traer la informacion de esta fundacion en especifico
    $objConsultas = new Consultas();
    $result = $objConsultas->MostrarInfoFunEspecifica($id_evento);

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
							<a href="eventos_fundacion_especifica.php?id='.$f['id_user'].'" class="btn btn-login mb-4">Eventos</a>

                            <div mb-4">
                                <h3 class="text-center mb-2" style="font-size:25px;">Donar</h3>
                                <div class="row d-flex align-items-center pb-4">
                                    <div class="col-4 mb-3">
                                        <img src="../../Uploads/fundaciones/nequi.png" class="d-block w-100" style="border-radius:100%;" alt="foto fundacion 3 de 4">
                                    </div>
                                    <div class="col-8 mb-3">';
                                    echo strlen($f['numero_nequi']) <= 0 ? ' <p  class="text-center mb-2 num-donar">No tiene</p>' : '<p  class="text-center mb-2 num-donar">'.$f['numero_nequi'].'</p>';
                                    echo '</div>
                                    <div class="col-4">
                                        <img src="../../Uploads/fundaciones/daviplata.png" class="d-block w-100" style="border-radius:100%;" alt="foto fundacion 3 de 4">
                                    </div>
                                    <div class="col-8">';
                                        echo strlen($f['numero_daviplata']) <= 0 ? ' <p  class="text-center mb-2 num-donar">No tiene</p>' : '<p  class="text-center mb-2 num-donar">'.$f['numero_daviplata'].'</p>';
                                    echo'</div>
                                </div>
                            </div>

							<p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['localidad'].'</p></a>
							<p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['direccion'].'</p></a>
							<a href="mailto:'.$f['email'].'"><p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['email'].'</p></a>
							<a href="whatsapp://send?phone='.$f['telefono'].'&text=Hola%2C%20me%20gustar%C3%ADa%20saber%20m%C3%A1s%20acerca%20de%20su%20fundaci%C3%B3n."><p  class="text-center mb-2" style="font-size:18px; color: #333333;">'.$f['telefono'].'</p></a>


						</div>
	
					</div>
				</div>

                ';
        }
}

function MostrarEventoFundacionEspecificaComun() {
    // Se obtiene el ID de la mascota enviado por el método GET (URL)
    $id_evento = isset($_GET['id']) ? $_GET['id'] : null;

    // Verificamos que se haya proporcionado un ID válido
    if (!$id_evento) {
        echo "Error: ID de mascota no válido.";
        return;
    }

    // Se instancia el objeto Consultas
    $objConsultas = new Consultas();

    // Se llama a la función para obtener la información de la mascota específica
    $result = $objConsultas->MostrarEventoFundacionEspecificaComun($id_evento);

    // Verificamos que se haya obtenido algún resultado
    if (!$result) {
        echo "Error: No se encontró la mascota con el ID proporcionado.";
        return;
    }

    // Pintamos la información consultada en el artefacto (FORM)
    foreach ($result as $f) {
        echo  '
            <div class="col-lg-6">
                <p class="p-0 m-0" style="color:#333333; text-align:center;">Registrado por '.$f['nombre'].' <br>  '.$f['eveFecRegistro'].' </p>
                <div class="product-item bg-light">
                    <div class="card pb-0">
                        <div class="thumb-content">
                            <a href="#">
                                <img class="card-img-top img-fluid mb-0" style="min-height:100px" src="../' . $f['eveFoto'] . '"
                                    alt="Imagen de la mascota">
                            </a>
                        </div>
                        <div class="card-body p-0">
                            <a href="#">
                                <h4 class="card-title text-center my-3" style="font-size:25px; color:#333333;">' .$f['eveNombre'] . '</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <p class="m-0 pb-2 pl-3" style="font-size:18px; color:#333333;"><b>Tipo de evento: </b>' . $f['eveTipo'] . '</p>
                <p class="m-0 pb-2 pl-3" style="font-size:18px; color:#333333;"><b>Fecha: </b>' . $f['eveFecha'] . '</p>
                <p class="m-0 pb-2 pl-3" style="font-size:18px; color:#333333;"><b>Hora de inicio: </b>' . $f['eveHoraInicio'] . '</p>
                <p class="m-0 pb-2 pl-3" style="font-size:18px; color:#333333;"><b>Hora de finalización: </b>' . $f['eveHoraFin'] . '</p>
                <p class="m-0 pb-2 pl-3" style="font-size:18px; color:#333333;"><b>Dirección: </b>' . $f['eveDireccion'] . '</p>
            </div>
            <div class="col-lg-12">
                <p class="mt-3 pb-5 pl-3" style="font-size:18px; color:#333333;"><b>Descripción del evento: </b>' . $f['eveDescripcion'] . '</p>
            </div>
        '; 
    }
}

?>