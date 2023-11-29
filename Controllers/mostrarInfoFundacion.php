<?php

//Este archivo recibe todas las consultas del modelo para mostrar la información al administrador

//Esta función es la que se llama en la vista

function mostrarInfoFunHome()
{
    $id_fundacion = $_SESSION['id'];

    $objConsultas = new Consultas();
    $result = $objConsultas->MostrarInfoFunEspecifica($id_fundacion);

    foreach ($result as $f) {
        echo '<h2 class="text-center mb-4">Detalles de ' . htmlspecialchars($f['nombre']) . '</h2>';

        MostrarCantidadEventosRegistrados();
        MostrarCantidadMascotasRegistradas();

        echo '</div><div class="row">
            <div class="col-lg-12">
                <h3>Descripción</h3>';
        echo strlen($f['descripcion']) == 0 ? '<p>No se ha subido la descripción de la fundación, estamos trabajando en ello.</p>' : '<p>' . htmlspecialchars($f['descripcion']) . '</p>';
        echo '</div>
            <div class="col-lg-12">
                <h3>Misión</h3>';
        echo strlen($f['mision']) == 0 ? '<p>No se ha subido la misión de la fundación, estamos trabajando en ello.</p>' : '<p>' . htmlspecialchars($f['mision']) . '</p>';
        echo '</div>
            <div class="col-lg-12">
                <h3>Visión</h3>';
        echo strlen($f['vision']) == 0 ? '<p>No se ha subido la visión de la fundación, estamos trabajando en ello.</p>' : '<p>' . htmlspecialchars($f['vision']) . '</p>';
        echo '</div>
            <div class="col-lg-6">
                <p class="mb-4 pb-2" style="color:#333333; font-size:18px;"><b>Dirección: </b>' . htmlspecialchars($f['direccion']) . '</p>
            </div>
            <div class="col-lg-6">
                <p class="mb-4 pb-2" style="color:#333333; font-size:18px;"><b>Localidad: </b>' . htmlspecialchars($f['localidad']) . '</p>
            </div>
            <div class="col-lg-12">
                <p class="mb-4 pb-2" style="color:#333333; font-size:18px;"><b>Fotos Representativas: </b> <br>' . htmlspecialchars($f['direccion']) . '</p>
            </div>';

        $fotos = array($f['foto_fun_1'], $f['foto_fun_2'], $f['foto_fun_3'], $f['foto_fun_4']);

        foreach ($fotos as $foto) {
            if (!empty($foto)) {
                echo '<div class="col-lg-3">
                        <div class="product-item bg-light">
                            <div class="card pb-0">
                                <div class="thumb-content">
                                    <img class="card-img-top img-fluid mb-0" style="min-height:100px" src="../' . htmlspecialchars($foto) . '" alt="Imagen representativa">
                                </div>
                            </div>
                        </div>
                    </div>';
            }
        }

        echo '<a href="actualizar_informacion_fundacion.php" class="btn btn-login mb-3"><i class="fa fa-pencil mr-2"></i>Actualizar</a>';
    }
}



function cargarEventosFundacion()
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarEventosComun();

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
                    <td><a href="modificar_eventos.php?id=' . $f['eveId'] . '" class=" bg-main"><i class="fa-solid fa-pencil"></i> Editar</a></td>
                    <td><a href="../../Controllers/eliminarEveFun.php?id=' . $f['eveId'] . '" class=" bg-red"><i class="fa-solid fa-trash"></i> Eliminar</a></td>
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
    $id_fundacion = $_SESSION['id'];

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarMasFun($id_fundacion);

    if (!isset($result)) {
        echo '<h2>NO HAY MASCOTAS REGISTRADAS</h2>';
    } else {

        foreach ($result as $f) {


            // echo '
            
            // <div class="col-lg-4 col-md-6">
            //             <!-- product card -->
            //             <div class="product-item bg-light">
            //                 <div class="card">
            //                     <div class="thumb-content">
            //                         <h4 class="card-title text-center mb-3">
            //                             <a href="eventoEsp.php">' . $f['eveNombre'] . '</a>
            //                         </h4>
            //                         <a  class="bg-mascota" href="eventoEsp.php">
            //                             <img class="card-img-top img-fluid" src="../' . $f['eveImg'] . '" alt="Imagen de evento">
            //                         </a>
            //                     </div>
            //                     <div class="card-body">
            //                         <ul class="list-inline product-meta">
            //                             <li class="list-inline-item">
            //                                 <a href="fundacion.php"><i class="fa fa-calendar"  style="color: #4942e4;"></i>' . $f['eveFecha'] . '</a>
            //                             </li>
            //                             <li class="list-inline-item">
            //                                 <a href="category.php"><i class="fa-solid fa-clock" style="color: #4942e4;"></i>' . $f['eveHora'] . '</a>
            //                             </li>
            //                             <li class="list-inline-item">
            //                                 <a href="category.php"><i class="fa-sharp fa-solid fa-location-dot"  style="color: #4942e4;"></i>' . $f['eveDireccion'] . '</a>
            //                             </li>
            //                         </ul>
            //                     </div>
            //                 </div>
            //             </div>
            //         </div>
            
            // ';
            echo '

                <tr>
                    <td><img src="../' . $f['masFoto'] . '" alt="Foto User" style="width: 60px; height: 60px; border-radius: 25%"></td>
                    <td>' . $f['masNombre'] . '</td>
                    <td>' . $f['masEdad'] . '</td>
                    <td>' . $f['masRaza'] . '</td>
                    <td>' . $f['masVacunas'] . '</td>
                    <td>' . $f['masEstSalud'] . '</td>
                    <td><a href="modificar_mascotas.php?id=' . $f['masId'] . '" class=" bg-main"><i class="fa-solid fa-pencil"></i> Editar</a></td>
                    <td><a href="../../Controllers/eliminarMasFun.php?id=' . $f['masId'] . '" class=" bg-red"><i class="fa-solid fa-trash"></i> Eliminar</a></td>
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
                        <label>Estado de Salud</label>
                        <input type="text" value="' . $f['masEstSalud'] . '" class="form-control" placeholder="Describe el estado de salud de la mascota." required name="masEstSalud">
                    </div>
                                
                </div>  

                <button type="submit" class="btn btn-main-sm btn-flat m-b-30 m-t-30">Editar información de mascota</button>

            </form>
            ';
    }
}

function cargarMascotasReporte()
{

    $id_fundacion = $_SESSION['id'];
    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarMasFun($id_fundacion);
    // En caso de no haber fundaciones registradas se mostrar este texto
    if (!isset($result)) {
        echo '<h2>NO HAY MASCOTAS REGISTRADAS</h2>';
    } else {
        foreach ($result as $f) {
            echo '
                <tr>
                    <td>' . $f['masNombre'] . '</td>
                    <td>' . $f['masEdad'] . '</td>
                    <td>' . $f['masRaza'] . '</td>
                    <td>' . $f['especie'] .'</td>
                    <td>' . $f['masVacunas'] . '</td>
                    <td>' . $f['masEstSalud'] . '</td>
                </tr>
                ';
        }
    }
}

// function cargarFormularios()
// {

//     $objConsultas = new Consultas();
//     $result = $objConsultas->mostrarFormFun();

//     if (!isset($result)) {
//         echo '<h2>NO HAY SOLICITUDES DE ADOPCIÓN</h2>';
//     } else {

//         foreach ($result as $f) {
//             echo '
//                 <tr>
//                     <td><img src="../' . $f['foto'] . '" alt="Foto Mascota" style="width: 60px; height: 60px; border-radius: 25%"></td>
//                     <td>' . $f['masNombre'] . '</td>
//                     <td>' . $f['masEdad'] . '</td>
//                     <td>' . $f['masRaza'] . '</td>
//                     <td>' . $f['nombre'] . '</td>
//                     <td>' . $f['telefono'] . '</td>
//                     <td><a href="" class="btn btn-primary"><i class="ti-pencil-alt"></i> Editar</a></td>
//                     <td><a href="../../Controllers/eliminarFormFun.php?id=' . $f['adopId'] . '" class="btn btn-danger"><i class="ti-trash"></i> Eliminar</a></td>
//                 </tr>
//                 ';
//         }
//     }
// }

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
                <img class="w-50" src="../' . $f['foto'] . '" alt="Foto de admin" class="">
            </div>
            <!-- User Name -->
            <h5 class="text-center">' . $f['nombre'] . '</h5>
            <h6 class="text center">' . $f['rol'] . '</h6>
                <a href="perfil.php" class="btn btn-login mb-3"><i class="fa fa-home mr-2"></i>Editar perfil</a>
                <a href="home.php" class="btn btn-login mb-3"><i class="fa fa-info mr-2"></i>Mi perfil</a>
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
        
        
                    <div class="p-5 tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                        <form action="../../Controllers/modificarLogoFundacion.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="mtop-4">Identificación:</label>
                                    <input readonly type="text" class="form-control" placeholder="Ej:10000004436" required name="id_user" value="' . $f['id_user'] . '">
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label>Foto de Logo</label>
                                    <input type="file" class="form-control" required name="logo" accept=".jpeg, .jpg, .png, .gif">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-main-sm btn-flat  mt-30 w-100">Actualizar logo</button>
        
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

function informacionEditar()
{
    $id_fundacion = $_SESSION['id'];

    $objConsultas = new Consultas();
    $result = $objConsultas->MostrarInfoFunEspecifica($id_fundacion);

    foreach ($result as $f) {
        echo '
        
        <div class="col-lg-12">
            <div class="card modificar-user">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button"
                            role="tab" aria-controls="home" aria-selected="true">Informacion</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="foto1" data-toggle="tab" data-target="#foto1" type="button" role="tab"
                            aria-controls="foto1" aria-selected="false">Foto 1</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="foto2" data-toggle="tab" data-target="#foto2"
                            type="button" role="tab" aria-controls="foto2" aria-selected="false">Foto 2</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="Foto3" data-toggle="tab" data-target="#contact" type="button"
                            role="tab" aria-controls="contact" aria-selected="false">Foto 3</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="Foto4" data-toggle="tab" data-target="#contact" type="button"
                            role="tab" aria-controls="contact" aria-selected="false">Foto 4</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
        
        
                    <div class="p-5 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        
                        <form action="../../Controllers/actualizarInfoFundacion.php" method="POST"
                            enctype="multipart/form-data">
                            <div class="row">
        
                                <div class="form-group col-lg-12">
                                    <label class="mtop-4">Identificación</label>
                                    <input readonly type="text" class="form-control" placeholder="Ej:10000004436" required
                                        name="id_user" value="' . $f['id_user'] . '">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label class="mtop-4">Dirección</label>
                                    <input required type="text" class="form-control" placeholder="Ej: Cl 39 No. 15-13" 
                                        name="direccion" value="' . $f['direccion'] . '">
                                </div>

                                <div class="form-group col-lg-6">
                                <label>Localidad</label>
                                <select required name="localidad" id="" class="form-control"  >
                                <option value="' . $f['cod_localidad_fk'] . '">' . $f['localidad'] . '</option>
                                <option value="AnNa">Antonio Nariño</option>
                                <option value="BaUn">Barrio Unidos</option>
                                <option value="Bo">Bosa</option>
                                <option value="Ch">Chapinero</option>
                                <option value="CiBo">Ciudad Bolívar</option>
                                <option value="En">Engativá</option>
                                <option value="Fo">Fontibón</option>
                                <option value="Ke">Kennedy</option>
                                <option value="LaCa">La Candelaria</option>
                                <option value="LoMa">Los Mártires</option>
                                <option value="PuAr">Puente Aranda</option>
                                <option value="RaUrUr">Rafael Uribe Uribe</option>
                                <option value="SaCr">San Cristóbal</option>
                                <option value="Sa">Santa Fe</option>
                                <option value="Su">Suba</option>
                                <option value="Sum">Sumapaz</option>
                                <option value="Te">Teusaquillo</option>
                                <option value="Tu">Tunjuelito</option>
                                <option value="Us">Usaquén</option>
                                <option value="Usm">Usme</option>
                                </select>
                                </div>
    
        
                                <div class="form-group col-lg-12">
                                    <label>Descripción</label>
                                    <textarea class="form-control" required name="descripcion" cols="20" rows="5" placeholder="Ingresa aquí, la historia de la mascota en un parrfo corto.">' . $f['descripcion'] . '</textarea>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Misión</label>
                                    <textarea class="form-control" required name="mision" cols="20" rows="5" placeholder="Ingresa aquí, la historia de la mascota en un parrfo corto.">' . $f['descripcion'] . '</textarea>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Visión</label>
                                    <textarea class="form-control" required name="vision" cols="20" rows="5" placeholder="Ingresa aquí, la historia de la mascota en un parrfo corto.">' . $f['descripcion'] . '</textarea>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-main-sm btn-flat  mt-30 w-100">Actualizar datos</button>
        
                        </form>
                    </div>
        
        
                    <div class="p-5 tab-pane fade" id="foto1" role="tabpanel" aria-labelledby="logo-tab">
                        <form action="../../Controllers/modificarLogoFundacion.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card perfil-user">
                                        <img class="w-100" src="../' . $f['foto_fun_1'] . '" alt="Photo perfil">
                                    </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="mtop-4">Identificación:</label>
                                    <input readonly type="text" class="form-control" placeholder="Ej:10000004436" required
                                        name="id_user" value="' . $f['id_user'] . '">
                                </div>
        
                                <div class="form-group col-lg-4">
                                    <label>Foto representativa 1</label>
                                    <input type="file" class="form-control" required name="logo"
                                        accept=".jpeg, .jpg, .png, .gif">
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
                                    <input readonly type="text" class="form-control" placeholder="Ej:10000004436" required
                                        name="id_user" value="' . $f['id_user'] . '">
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label>Imagen Principal</label>
                                    <input type="file" class="form-control" required name="foto"
                                        accept=".jpeg, .jpg, .png, .gif">
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

function cargarEventos()
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarEventosComun();

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
                                        <a href="eventoEsp.php">' . $f['eveNombre'] . '</a>
                                    </h4>
                                    <a  class="bg-mascota" href="eventoEsp.php">
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

function cargarFundacionesFundacion()
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

function MostrarCantidadEventosRegistrados()
{
    $id_fundacion = $_SESSION['id'];
    $objConsultas = new Consultas();
    $result = $objConsultas->cantidadEventosRegistradosFundacion($id_fundacion);

    foreach ($result as $f) {
        echo '
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="fa-regular fa-calendar-check" style="color: #8696FE;"></i>
                            </div>
                            <div class="stat-content dib">
                                <div class="stat-text">EventoS Registrados</div>
                                <div class="stat-digit">' . $f['cantidadEventos'] . '</div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
    }
}

function MostrarCantidadMascotasRegistradas()
{
    $id_fundacion = $_SESSION['id'];
    $objConsultas = new Consultas();
    $result = $objConsultas->cantidadMascotasRegistradasFundacion($id_fundacion);

    foreach ($result as $f) {
        echo '
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="fa-solid fa-paw" style="color: #11009e;"></i>
                            </div>
                            <div class="stat-content dib">
                                <div class="stat-text">Mascotas Registradas</div>
                                <div class="stat-digit">' . $f['cantidadMascotas'] . '</div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
    }
}
?>