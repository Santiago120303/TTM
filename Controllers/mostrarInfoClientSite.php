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
                                    <img class="card-img-top img-fluid" src="../' . $f['foto_fundacion'] . '" alt="Card image cap">
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

function cargarMascotas()
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarMascotasClientsite();

    if (!isset($result)) {
        echo '<h2>NO EXISTEN MASCOTAS REGISTRADAS</h2>';  //' . $f['id_user'] . '
    } else {

        foreach ($result as $f) {
            echo '
            <div class="col-lg-9 col-md-8">
            <div class="product-grid-list">
                <div class="row mt-30">
                    <div class="col-lg-4 col-md-6">
                        <!-- product card -->
                        <div class="product-item bg-light">
                            <div class="card">
                                <div class="thumb-content">
                                    <!-- <div class="price">$200</div> -->
                                    <a class="bg-mascota" href="mascota.php">
                                        <img class="card-img-top img-fluid"
                                            src="../../Uploads/mascotas/mascota1.png"
                                            alt="Card image cap">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><a href="mascota.php">Tom</a></h4> 
                                    <p><strong>Edad:</strong> 2 años</p>	
                                    <p><strong>Personalidad:</strong> Tom es un perro amigable y cariñoso que tiene un corazón lleno de amor para compartir.</p>
                                    <p><strong>Sauld:</strong> Tom está en excelente estado de salud y ha recibido todas sus vacunas al día. Ha sido castrado y se encuentra al día con sus chequeos veterinarios regulares.</p>				
                                    <div class="product-ratings">
                                    </div>
                                </div>
                            </div>
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
