<?php

//Este archivo recibe todas las consultas del modelo para mostrar la información al administrador

//Esta función es la que se llama en la vista

function cargarFundacionesCliente()
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarFundacionesTodos();

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

function cargarMascotasCliente()
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarMascotasComun();

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
                                    <h4 class="card-title text-center mb-3"><a href="mascota.php">' . $f['masNombre'] . '</a></h4>
                                </a>
                                <a href="mascota.php">
                                    <img class="card-img-top img-fluid" style="min-height:100px" src="../' . $f['masFoto'] . '" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <p class="m-0 pb-2">' . $f['especie'] . '</p>
                                <p class="m-0 pb-2">' . $f['masRaza'] . '</p>
                                <p class="m-0 pb-2">' . $f['masEdad'] . ' años</p>
                            </div>
                        </div>
                    </div>
                </div>
        ';
        }
    }
}

function perfil()
{

    //El session_start no debe estar en 2 models
    //session_start();
    //Variable de sesión del login
    $id = $_SESSION['id'];

    $objConsultas = new Consultas();
    $result = $objConsultas->VerPerfil($id);

    foreach ($result as $f) {
        echo '
            <div class="widget user-dashboard-profile">
            <!-- User Image -->
            <div class="profile-thumb">
                <img src="../' . $f['foto'] . '" alt="Foto de admin" class="">
            </div>
            <!-- User Name -->
            <h5 class="text-center">' . $f['nombre'] . ' ' . $f['apellido'] . '</h5>
            <h6 class="text center">' . $f['rol'] . '</h6>
            <a href="home.php" class="btn btn-main-sm d-block m0a"><i class="fa fa-home mr-2"></i>Inicio</a>
          </div>
            ';
    }
}

function perfilEditar()
{
    $id = $_SESSION['id'];

    $objConsultas = new Consultas();
    $result = $objConsultas->VerPerfil($id);

    foreach ($result as $f) {
        echo '
        <div class="col-lg-3">
            <div class="card perfil-user">
                <img class="w-100" src="../' . $f['foto'] . '" alt="Photo perfil">
                <h3 class="text-center pt-5 pb-1">' . $f['nombre'] . '</h3>
                <h4 class="text-center pb-4">' . $f['rol'] . '</h4>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card modificar-user">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button"
                            role="tab" aria-controls="home" aria-selected="true">Perfil</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button"
                            role="tab" aria-controls="profile" aria-selected="false">Cambiar foto</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button"
                            role="tab" aria-controls="contact" aria-selected="false">Cambiar clave</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
        
        
                    <div class="p-5 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        
                        <form action="../../Controllers/modificarCuentaCliente.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
        
                                <div class="form-group col-lg-6">
                                    <label class="mtop-4">Identificación:</label>
                                    <input readonly type="text" class="form-control" placeholder="Ej:10000004436" required name="id_user" value="' . $f['id_user'] . '">
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label>Tipo de Identificación:</label>
                                    <select required name="tipo_doc" id="" class="form-control">
                                        <option value="' . $f['cod_tipo_doc'] . '">' . $f['tipo_doc'] . '</option>
                                        <option value="1">CC</option>
                                        <option value="2">CE</option>
                                        <option value="3">PASAPORTE</option>
                                    </select>
                                </div>
        
                                <div class="form-group col-lg-12">
                                    <label>Nombre:</label>
                                    <input type="text" class="form-control" placeholder="Ej:Diana" required name="nombre"
                                        value="' . $f['nombre'] . '">
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label>Correo Electrónico:</label>
                                    <input type="email" class="form-control" placeholder="Ej:Diana@gmail.com" required name="email" value="' . $f['email'] . '">
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label>Teléfono:</label>
                                    <input type="number" class="form-control" placeholder="Ej:3154942891" required name="telefono" value="' . $f['telefono'] . '">
                                </div>
        
                            </div>
                            <button type="submit" class="btn btn-main-sm btn-flat  mt-30 w-100">Actualizar datos</button>
        
                        </form>
                    </div>
        

                    <div class="p-5 tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="../../Controllers/modificarFotoCliente.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="mtop-4">Identificación:</label>
                                <input readonly type="number" class="form-control" placeholder="Ej:10000004436" required
                                    name="id_user" value="' . $f['id_user'] . '">
                            </div>
    
                            <div class="form-group col-lg-6">
                                <label>Foto de Usuario:</label>
                                <input type="file" class="form-control" required name="foto"
                                    accept=".jpeg, .jpg, .png, .gif">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-main-sm btn-flat  mt-30 w-100">Actualizar foto</button>
    
                    </form>
                </div>
        
        
                    <div class="p-5 tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <form action="../../Controllers/modificarClaveCliente.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label class="mtop-4">Identificación:</label>
                                    <input readonly type="text" class="form-control" placeholder="Ej:10000004436" required
                                        name="id_user" value="' . $f['id_user'] . '">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Nueva Clave:</label>
                                    <input type="password" class="form-control" placeholder="Ej:**********" required
                                        name="clave">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Confirmar Clave:</label>
                                    <input type="password" class="form-control" placeholder="Ej:**********" required
                                        name="clave2">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-main-sm btn-flat  mt-30 w-100">Actualizar clave</button>
        
                        </form>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
}

function confirmarCierreSesion()
{

    //El session_start no debe estar en 2 models
    //session_start();
    //Variable de sesión del login
    $id = $_SESSION['id'];

    $objConsultas = new Consultas();
    $result = $objConsultas->VerPerfil($id);

    foreach ($result as $f) {
        echo '
            <div id="popup">
                <div class="popup-cont ">
                     <h3>¿Estás seguro de cerrar sesión?</h3>
                    <p>¡Hola ' . $f['nombre'] . '! 
                    Si estás seguro de que deseas cerrar sesión, puedes hacerlo haciendo clic en el botón "Sí, Cerrar sesión" a continuación. Si no estás seguro o has llegado aquí por error, simplemente has clic en el botón "No, Cancelar" y seguirás conectado.</p>
                    <a class="cancelar" href="#" id="close">No, Cancelar</a>
                    <a class="cerrar" href="../../Controllers/cerrarSesion.php" id="close">Sí, Cerrar sesión</a>
                </div>
            </div>    
            ';
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



function cargarFormulario(){

    $id_mascota = isset($_GET['id']) ? $_GET['id'] : null;

    $objConsultas = new Consultas();
    // Se llama a la función para obtener la información de la mascota específica
    $result = $objConsultas->mostrarMascotaFundacionEspecificaComun($id_mascota);

    foreach ($result as $f) {
        echo '
        <form action="../../Controllers/formularioAdop.php?id='. $f['masId'] .'"  method="POST">
                               
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
    
        </form>
            ';
        }

}
?>