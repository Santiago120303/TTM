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
                        <div class="card pb-0">
                            <div class="thumb-content">
                                <!-- <div class="price">$200</div> -->
                                <a href="fundacion.php">
                                    <h4 class="card-title text-center mb-3"><a href="fundacion.php">' . $f['nombre'] . '</a></h4>
                                </a>
                                <a href="fundacion.php">
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
                        <div class="card pb-0">
                            <div class="thumb-content">
                                <!-- <div class="price">$200</div> -->
                                <a href="fundacion.php">
                                    <h4 class="card-title text-center mb-3"><a href="fundacion.php">' . $f['nombre'] . '</a></h4>
                                </a>
                                <a href="fundacion.php">
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
                    <!-- product card -->
                    <div class="product-item bg-light">
                        <div class="card pb-0 ">
                            <div class="thumb-content">
                                <!-- <div class="price">$200</div> -->

                                <a href="mascota.php">
                                    <img class="card-img-top img-fluid" style="min-height:100px"
                                        src="../' . $f['foto'] . '" alt="Card image cap">
                                </a>

                                <a href="mascota.php">
                                    <h4 class="card-title text-center mb-3"><a href="mascota.php">' .$f['masNombre'] . '</a></h4>
                                </a>
                                
                            </div>
                            <div class="card-body">
                                <p class="m-0 pb-2"><b>Especie: </b>' . $f['especie'] . '</p>
                                <p class="m-0 pb-2"><b>Raza: </b>' . $f['masRaza'] . '</p>
                                <p class="m-0 pb-2"><b>Edad: </b>' . $f['masEdad'] . ' años</p>
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

function cargarEventos()
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarEventosClientsite();

    if (!isset($result)) {
        echo '<h2>NO HAY EVENTOS REGISTRADOS</h2>';
    } else {

        foreach ($result as $f) {
            echo '
                    <div class="col-lg-4 col-md-6">
                        <!-- product card -->
                        <div class="product-item bg-light">
                            <div class="card">
                                <div class="thumb-content">
                                    <h4 class="card-title text-center mb-3">
                                        <a href="fundacion.php">' . $f['eveNombre'] . '</a>
                                    </h4>
                                    <a  class="bg-mascota" href="fundacion.php">
                                        <img class="card-img-top img-fluid" src="../' . $f['eveImg'] . '" alt="Imagen de evento">
                                    </a>
                                </div>
                                <div class="card-body">
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
    }
}

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