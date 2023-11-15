<?php

//Este archivo recibe todas las consultas del modelo para mostrar la información al los usuarios que ingresan al sito web
function cargarFundaciones()
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarFundacionesClientsite();

    if (!isset($result)) {
        echo '<h2>NO HAY FUNDACIONES REGISTRADAS</h2>';  //' . $f['id_user'] . '
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
                            <div class="card-body">
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

function buscarNombreFundacion ($nombrefun, $localidadfun)
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarNombreFundacion($nombrefun, $localidadfun);

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
                            <div class="card-body">
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
        
        echo '<h2>NO HAY FUNDACIONES REGISTRADAS</h2>';  //' . $f['id_user'] . '

    }
}

function cargarMascotas()
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarMascotasClientsite();

    if (!isset($result)) {
        echo '<h2>NO EXISTEN MASCOTAS REGISTRADAS</h2>';  //' . $f['id_user'] . '
    } else {

        foreach ($result as $f) {
            echo ' 
                <div class="col-lg-4 col-md-6">
                <!-- product card -->
                <div class="product-item bg-light">
                    <div class="card pb-0">
                        <div class="thumb-content">
                            <!-- <div class="price">$200</div> -->
                            <a href="mascota.php">
                                <h4 class="card-title text-center mb-3"><a href="mascota.php">' .
                                        $f['masNombre'] . '</a></h4>
                            </a>
                            <a href="mascota.php">
                                <img class="card-img-top img-fluid" style="min-height:100px"
                                    src="../' . $f['foto'] . '" alt="Card image cap">
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <p class="m-0 pb-2">' . $f['especie'] . '</p>
                            <p class="m-0 pb-2">' . $f['masRaza'] . '</p>
                            <p class="m-0 pb-2">' . $f['masEdad'] . ' años</p>
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


?>
