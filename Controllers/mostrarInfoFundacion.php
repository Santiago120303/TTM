<?php

//Este archivo recibe todas las consultas del modelo para mostrar la información al administrador

//Esta función es la que se llama en la vista

function cargarEventos()
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarEveFun();

    if (!isset($result)) {
        echo '<h2>NO HAY EVENTOS REGISTRADOS</h2>';
    } else {

        foreach ($result as $f) {
            echo '
                <tr>
                    <td><img src="../' . $f['eveImg'] . '" alt="Logo Fundación" style="width: 60px; height: 60px; border-radius: 25%"></td>
                    <td>' . $f['eveNombre'] . '</td>
                    <td>' . $f['eveFecha'] . '</td>
                    <td>' . $f['eveHora'] . '</td>
                    <td>' . $f['eveDireccion'] . '</td>
                    <td>' . $f['eveEstado'] . '</td>
                    <td><a href="modificar_eventos.php?id=' . $f['eveId'] . '" class="btn btn-primary"><i class="ti-pencil-alt"></i> Editar</a></td>
                    <td><a href="../../Controllers/eliminarEveFun.php?id=' . $f['eveId'] . '" class="btn btn-danger"><i class="ti-trash"></i> Eliminar</a></td>
                </tr>
                ';
        }
    }
}

function cargarEventosEditar()
{
    // Aterrizamos la PK enviada desde la tabla 
    $eveId = $_GET['id'];

    //Enviamos la PK a una función de la clase consultas
    $objConsultas = new Consultas();
    $result = $objConsultas->editarEveFun($eveId);

    //Pintamos la información consultada en el artefacto (FORM)

    foreach ($result as $f) {
        echo  '
        <a class="d-block w-100 text-right font-weight-bold" href="ver_eventos.php"><i class="fa-solid fa-arrow-left mr-2"></i>Volver</a>
        <form action="../../Controllers/actualizarEveFun.php?id='. $f['eveId'] .'" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div class="form-group col-lg-6">
                    <label>Nombre del evento</label>
                    <input type="text" value="' . $f['eveNombre'] . '" class="form-control" placeholder="Ej:Evento caritativo" required name="eveNombre">
                </div>

                <div class="form-group col-lg-6">
                    <label>Fecha del evento</label>
                    <input type="date" value="' . $f['eveFecha'] . '" class="form-control" required name="eveFecha">
                </div>

                <div class="form-group col-lg-6">
                <label>Fecha del evento</label>
                <input type="date" value="' . $f['eveHora'] . '" class="form-control" required name="eveFecha">
            </div>

                <div class="form-group col-lg-6">
                    <label>Dirección del evento</label>
                    <input type="text" value="' . $f['eveDireccion'] . '" class="form-control" placeholder="Ej:Carrera 1 #3-4 sur" required name="eveDireccion">
                </div>
                <div class="form-group col-lg-6">
                    <label>Estado del evento</label>
                    <select required name="eveEstado"  class="form-control">
                        <option value="' . $f['eveEstado'] . '">' . $f['eveEstado'] . '</option>
                        <option value="Activo">Activo</option>
                        <option value="Cancelado">Cancelado</option>
                        <option value="En estado de confirmacion">En estado de confirmación</option>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Descripción del evento</label>
                    <input type="text" value="' . $f['eveDescripcion'] . '" class="form-control" placeholder="Escriba la descripción del evento" required name="eveDescripcion">
                </div>

            </div>
            <button type="submit" class="btn btn-main-sm btn-flat m-b-30 m-t-30">Modificar evento</button>
        </form>
            ';
    }
}

function cargarMascotas()
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarMasFun();

    if (!isset($result)) {
        echo '<h2>NO HAY MASCOTAS REGISTRADAS</h2>';
    } else {

        foreach ($result as $f) {
            echo '
                <tr>
                    <td><img src="../' . $f['foto'] . '" alt="Foto User" style="width: 60px; height: 60px; border-radius: 25%"></td>
                    <td>' . $f['masNombre'] . '</td>
                    <td>' . $f['masEdad'] . '</td>
                    <td>' . $f['masRaza'] . '</td>
                    <td>' . $f['masVacunas'] . '</td>
                    <td>' . $f['masEstSalud'] . '</td>
                    <td><a href="modificar_mascotas.php?id=' . $f['masId'] . '" class="btn btn-primary"><i class="ti-pencil-alt"></i> Editar</a></td>
                    <td><a href="../../Controllers/eliminarMasFun.php?id=' . $f['masId'] . '" class="btn btn-danger"><i class="ti-trash"></i> Eliminar</a></td>
                </tr>
                ';
        }
    }
}

function cargarMascotasEditar()
{
    // Aterrizamos la PK enviada desde la tabla 
    $masId = $_GET['id'];

    //Enviamos la PK a una función de la clase consultas
    $objConsultas = new Consultas();
    $result = $objConsultas->editarMasFun($masId);

    //Pintamos la información consultada en el artefacto (FORM)

    foreach ($result as $f) {
        echo  '
        <a class="d-block w-100 text-right font-weight-bold" href="ver_mascotas.php"><i class="fa-solid fa-arrow-left mr-2"></i>Volver</a>
            
            <form action="../../Controllers/actualizarMasFun.php?id='. $f['masId'] .'" method="POST" enctype="multipart/form-data">
                               
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label>Nombre</label>
                        <input type="text" value="' . $f['masNombre'] . '" class="form-control" placeholder="Ej: Simba" required name="masNombre">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Edad (años)</label>
                        <input type="text" value="' . $f['masEdad'] . '" class="form-control" placeholder="Ej: 5 " required name="masEdad">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Historia</label>
                        <input type="text" value="' . $f['masHistoria'] . '" class="form-control" placeholder="Ingresa aquí la historia de la mascota." required name="masHistoria">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Vacunas</label>
                        <input type="text" value="' . $f['masVacunas'] . '" class="form-control" placeholder="Ingresa información sobre las vacunas que tiene la mascota." required name="masVacunas">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Raza</label>
                        <input type="text" value="' . $f['masRaza'] . '" class="form-control" placeholder="Ingresa la raza de la mascota." required name="masRaza">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Estado de salud</label>
                        <input type="text" value="' . $f['masEstSalud'] . '" class="form-control" placeholder="Describe el estado de salud de la mascota." required name="masEstSalud">
                    </div>
                                
                </div>  

                <button type="submit" class="btn btn-main-sm btn-flat m-b-30 m-t-30">Editar información de mascota</button>

            </form>
            ';
    }
}

function cargarFormularios()
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarFormFun();

    if (!isset($result)) {
        echo '<h2>NO HAY SOLICITUDES DE ADOPCIÓN</h2>';
    } else {

        foreach ($result as $f) {
            echo '
                <tr>
                    <td><img src="../' . $f['foto'] . '" alt="Foto Mascota" style="width: 60px; height: 60px; border-radius: 25%"></td>
                    <td>' . $f['masNombre'] . '</td>
                    <td>' . $f['masEdad'] . '</td>
                    <td>' . $f['masRaza'] . '</td>
                    <td>' . $f['nombre'] . '</td>
                    <td>' . $f['telefono'] . '</td>
                    <td><a href="" class="btn btn-primary"><i class="ti-pencil-alt"></i> Editar</a></td>
                    <td><a href="../../Controllers/eliminarFormFun.php?id=' . $f['adopId'] . '" class="btn btn-danger"><i class="ti-trash"></i> Eliminar</a></td>
                </tr>
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
                <a href="perfil.php" class="btn btn-login mb-3"><i class="fa fa-home mr-2"></i>Editar perfil</a>
                <a href="mascotas.php" class="btn btn-login mb-3">Mascotas</a>
			    <a href="eventos.php" class="btn btn-login mb-3">Eventos</a>
			<p  class="text-center mb-2">Kennedy </p></a>
			<p  class="text-center mb-2">Cl. 8 #19a 51</p></a>
				<a href="mailto:patitassolidarias@gmail.com"><p  class="text-center mb-2">patitassolidarias@gmail.com</p></a>
				<a href="whatsapp://send?phone=310123456757&text=Hola%2C%20me%20gustar%C3%ADa%20saber%20m%C3%A1s%20acerca%20de%20su%20fundaci%C3%B3n."><p  class="text-center mb-2">3101234567</p></a>
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
                        <button class="nav-link" id="logo-tab" data-toggle="tab" data-target="#logo" type="button"
                            role="tab" aria-controls="logo" aria-selected="false">Cambiar logo</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="img-principal-tab" data-toggle="tab" data-target="#img-principal" type="button"
                            role="tab" aria-controls="img-principal" aria-selected="false">Cambiar imagen principal</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button"
                            role="tab" aria-controls="contact" aria-selected="false">Cambiar clave</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
        
        
                    <div class="p-5 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        
                        <form action="../../Controllers/modificarCuentaFundacion.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
        
                                <div class="form-group col-lg-6">
                                    <label class="mtop-4">Identificación:</label>
                                    <input readonly type="text" class="form-control" placeholder="Ej:10000004436" required name="id_user" value="' . $f['id_user'] . '">
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label>Tipo de Identificación:</label>
                                    <select disabled required name="tipo_doc" id="" class="form-control">
                                        <option value="' . $f['cod_tipo_doc'] . '">' . $f['tipo_doc'] . '</option>
                                        <option value="4">NIT</option>
                                        <option value="1">CC</option>
                                    </select>
                                </div>
        
                                <div class="form-group col-lg-12">
                                    <label>Nombre:</label>
                                    <input type="text" class="form-control" placeholder="Ej:Diana" required name="nombre"
                                        value="' . $f['nombre'] . '">
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label>Correo electrónico:</label>
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
        
        
                    <div class="p-5 tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                        <form action="../../Controllers/modificarLogoFundacion.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="mtop-4">Identificación:</label>
                                    <input readonly type="text" class="form-control" placeholder="Ej:10000004436" required name="id_user" value="' . $f['id_user'] . '">
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label>Foto de logo</label>
                                    <input type="file" class="form-control" required name="logo" accept=".jpeg, .jpg, .png, .gif">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-main-sm btn-flat  mt-30 w-100">Actualizar logo</button>
        
                        </form>
                    </div>

                    <div class="p-5 tab-pane fade" id="img-principal" role="tabpanel" aria-labelledby="img-principal-tab">
                        <form action="../../Controllers/modificarFotoFundacion.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="mtop-4">Identificación:</label>
                                    <input readonly type="text" class="form-control" placeholder="Ej:10000004436" required name="id_user" value="' . $f['id_user'] . '">
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label>Imagen principal</label>
                                    <input type="file" class="form-control" required name="foto" accept=".jpeg, .jpg, .png, .gif">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-main-sm btn-flat  mt-30 w-100">Actualizar foto</button>
        
                        </form>
                    </div>
        
        
                    <div class="p-5 tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <form action="../../Controllers/modificarClaveAdmin.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label class="mtop-4">Identificación:</label>
                                    <input readonly type="text" class="form-control" placeholder="Ej:10000004436" required
                                        name="id_user" value="' . $f['id_user'] . '">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Nueva clave:</label>
                                    <input type="password" class="form-control" placeholder="Ej:**********" required
                                        name="clave">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Confirmar clave:</label>
                                    <input type="password" class="form-control" placeholder="Ej:**********" required
                                        name="clave2">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-main-sm btn-flat  mt-30 w-100">Actualizar Clave</button>
        
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

function cargarMascotas1()
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

function cargarEventos1()
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

function cargarFundaciones1()
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

?>