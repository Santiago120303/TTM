<?php

//Este archivo recibe todas las consultas del modelo para mostrar la información al administrador

//Esta función es la que se llama en la vista

function cargarAdministradores()
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarAdministradoresAdmin();

    if (!isset($result)) {
        echo '<h2>NO HAY ADMINISTRADORES REGISTRADOS</h2>';
    } else {

        foreach ($result as $f) {
            echo '
                <tr>
                    <td><img src="../' . $f['foto'] . '" alt="Foto User" style="height: 50px; border-radius: 10px; margin: 0 auto;"></td>
                    <td >' . $f['id_user'] . '</td>
                    <td >' . $f['nombre'] . '</td>
                    <td >' . $f['email'] . '</td>
                    <td>' . $f['estado'] . '</td>
                    <td><a href="modificar_administrador.php?id=' . $f['id_user'] . '" class=" bg-main"><i class="fa-solid fa-pencil"></i> Editar</a></td>
                    <td><a href="../../Controllers/eliminarAdministradorAdmin.php?id=' . $f['id_user'] . '" class=" bg-red"><i class="fa-solid fa-trash"></i> Eliminar</a></td>
                </tr>
                ';
        }
    }
}

function cargarAdministradorEditar()
{
    // Aterrizamos la PK enviada desde la tabla 
    $id_user = $_GET['id'];

    //Enviamos la PK a una función de la clase consultas
    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarUserAdmin($id_user);

    //Pintamos la información consultada en el artefacto (FORM)

    foreach ($result as $f) {
        echo  '
        <a class="d-block w-100 text-right font-weight-bold" href="ver_administradores.php"><i class="fa-solid fa-arrow-left mr-2"></i>Volver</a>
            <form action="../../Controllers/actualizarAdministradorAdmin.php" method="POST">
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Identificación:</label>
                    <input type="text" value="' . $f['id_user'] . '" class="form-control" readonly placeholder="Ej:10000004436" required name="id_user">
                </div>

                <div class="form-group col-lg-6">
                    <label>Tipo de Identificación:</label>
                    <select required name="tipo_doc" id="" class="form-control">
                        <option  value="' . $f['cod_tipo_doc'] . '">' . $f['tipo_doc'] . '</option>
                        <option value="1">CC</option>
                        <option value="2">CE</option>
                        <option value="3">PASAPORTE</option>
                    </select>
                </div>

                <div class="form-group col-lg-6">
                    <label>Nombre:</label>
                    <input type="text" value="' . $f['nombre'] . '" class="form-control" placeholder="Ej:Diana" required name="nombre">
                </div>

                <div class="form-group col-lg-6">
                    <label>Apellido:</label>
                    <input type="text" value="' . $f['apellido'] . '" class="form-control" placeholder="Ej:Ramírez"  name="apellido">
                </div>
                <div class="form-group col-lg-6">
                    <label>Correo electrónico:</label>
                    <input type="email" value="' . $f['email'] . '" class="form-control" placeholder="Ej:Diana@gmail.com" required name="email">
                </div>
                <div class="form-group col-lg-6">
                    <label>Teléfono:</label>
                    <input type="number" value="' . $f['telefono'] . '" class="form-control" placeholder="Ej:3154942891" required name="telefono">
                </div>
            
                <div class="form-group col-lg-6">
                        <label>Rol:</label>
                        <select disabled  name="rol" id="" class="form-control">
                            <option value="' . $f['cod_rol'] . '">' . $f['rol'] . '</option>
                            <option value="1">Administrador</option>
                            <option value="2">Fundacion</option>
                            <option value="3">Cliente</option>
                        </select>
                </div>
                
                <div class="form-group col-lg-6">
                        <label>Estado:</label>
                        <select required name="estado" id="" class="form-control">
                            <option value="' . $f['cod_estado'] . '">' . $f['estado'] . '</option>
                            <option value="1">Activo</option>
                            <option value="2">Pendiente</option>
                            <option value="3">Bloqueado</option>
                        </select>
                </div>
            </div>
            <button type="submit" class="btn btn-main-sm btn-flat mb-30 mt-30 w-100" >Actualizar datos de usuario</button>
            
        </form>
            ';
    }
}

function cargarClientes()
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarClientesAdmin();

    if (!isset($result)) {
        echo '<h2>NO HAY CLIENTES REGISTRADOS</h2>';
    } else {

        foreach ($result as $f) {
            echo '
                <tr>
                    <td><img src="../' . $f['foto'] . '" alt="Foto User" style="height: 50px; border-radius: 10px; margin: 0 auto;"></td>
                    <td >' . $f['id_user'] . '</td>
                    <td >' . $f['nombre'] . '</td>
                    <td >' . $f['email'] . '</td>
                    <td>' . $f['estado'] . '</td>
                    <td><a href="modificar_cliente.php?id=' . $f['id_user'] . '" class=" bg-main"><i class="fa-solid fa-pencil"></i> Editar</a></td>
                    <td><a href="../../Controllers/eliminarClienteAdmin.php?id=' . $f['id_user'] . '" class=" bg-red"><i class="fa-solid fa-trash"></i> Eliminar</a></td>
                </tr>
                ';
        }
    }
}

function cargarClienteEditar()
{
    // Aterrizamos la PK enviada desde la tabla 
    $id_user = $_GET['id'];

    //Enviamos la PK a una función de la clase consultas
    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarUserAdmin($id_user);

    //Pintamos la información consultada en el artefacto (FORM)

    foreach ($result as $f) {
        echo  '
        <a class="d-block w-100 text-right font-weight-bold" href="ver_clientes.php"><i class="fa-solid fa-arrow-left mr-2"></i>Volver</a>
            <form action="../../Controllers/actualizarClienteAdmin.php" method="POST">
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Identificación:</label>
                    <input type="text" value="' . $f['id_user'] . '" class="form-control" readonly placeholder="Ej:10000004436" required name="id_user">
                </div>

                <div class="form-group col-lg-6">
                    <label>Tipo de Identificación:</label>
                    <select required name="tipo_doc" id="" class="form-control">
                        <option  value="' . $f['cod_tipo_doc'] . '">' . $f['tipo_doc'] . '</option>
                        <option value="1">CC</option>
                        <option value="2">CE</option>
                        <option value="3">PASAPORTE</option>
                    </select>
                </div>

                <div class="form-group col-lg-6">
                    <label>Nombre:</label>
                    <input type="text" value="' . $f['nombre'] . '" class="form-control" placeholder="Ej:Diana" required name="nombre">
                </div>

                <div class="form-group col-lg-6">
                    <label>Apellido:</label>
                    <input type="text" value="' . $f['apellido'] . '" class="form-control" placeholder="Ej:Ramírez"  name="apellido">
                </div>
                <div class="form-group col-lg-6">
                    <label>Correo electrónico:</label>
                    <input type="email" value="' . $f['email'] . '" class="form-control" placeholder="Ej:Diana@gmail.com" required name="email">
                </div>
                <div class="form-group col-lg-6">
                    <label>Teléfono:</label>
                    <input type="number" value="' . $f['telefono'] . '" class="form-control" placeholder="Ej:3154942891" required name="telefono">
                </div>
            
                <div class="form-group col-lg-6">
                        <label>Rol:</label>
                        <select required name="rol" id="" class="form-control">
                            <option value="' . $f['cod_rol'] . '">' . $f['rol'] . '</option>
                            <option value="1">Administrador</option>
                            <option value="2">Fundacion</option>
                            <option value="3">Cliente</option>
                        </select>
                </div>
                
                <div class="form-group col-lg-6">
                        <label>Estado:</label>
                        <select required name="estado" id="" class="form-control">
                            <option value="' . $f['cod_estado'] . '">' . $f['estado'] . '</option>
                            <option value="1">Activo</option>
                            <option value="2">Pendiente</option>
                            <option value="3">Bloqueado</option>
                        </select>
                </div>
            </div>
            <button type="submit" class="btn btn-main-sm btn-flat mb-30 mt-30 w-100" >Actualizar datos de usuario</button>
            
        </form>
            ';
    }
}

function cargarClientesReporte()
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarClientesAdmin();

    if (!isset($result)) {
        echo '<h2>NO HAY USUARIOS REGISTRADOS</h2>';
    } else {

        foreach ($result as $f) {
            echo '
                <tr>
                    <td>' . $f['id_user'] . '</td>
                    <td>' . $f['nombre'] . '</td>
                    <td>' . $f['apellido'] . '</td>
                    <td>' . $f['email'] . '</td>
                    <td>' . $f['telefono'] . '</td>
                    <td>' . $f['estado'] . '</td>
                    <td>' . $f['rol'] . '</td>
                </tr>
                ';
        }
    }
}

function cargarFundaciones()
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarFundacionesAdmin();

    if (!isset($result)) {
        echo '<h2>NO HAY FUNDACIONES REGISTRADAS</h2>';
    } else {

        foreach ($result as $f) {
            echo '
                <tr>
                    <td><img src="../' . $f['foto'] . '" alt="Foto User" style="height: 50px; border-radius: 10px; margin: 0 auto;"></td>
                    <td >' . $f['id_user'] . '</td>
                    <td>' . $f['nombre'] . '</td>
                    <td>' . $f['email'] . '</td>
                    <td>' . $f['estado'] . '</td>
                    <td><a href="modificar_fundacion.php?id=' . $f['id_user'] . '" class=" bg-main"><i class="fa-solid fa-pencil"></i> Editar</a></td>
                    <td><a href="../../Controllers/eliminarFundacionAdmin.php?id=' . $f['id_user'] . '" class=" bg-red"><i class="fa-solid fa-trash"></i> Eliminar</a></td>
                </tr>
                ';
        }
    }
}

function cargarFundacionEditar()
{
    // Aterrizamos la PK enviada desde la tabla 
    $id_user = $_GET['id'];

    //Enviamos la PK a una función de la clase consultas
    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarUserAdmin($id_user);

    //Pintamos la información consultada en el artefacto (FORM)

    foreach ($result as $f) {
        echo  '
        <a class="d-block w-100 text-right font-weight-bold" href="ver_fundaciones.php"><i class="fa-solid fa-arrow-left mr-2"></i>Volver</a>
            <form action="../../Controllers/actualizarFundacionAdmin.php" method="POST">
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Identificación:</label>
                    <input type="text" value="' . $f['id_user'] . '" class="form-control" readonly placeholder="Ej:10000004436" required name="id_user">
                </div>

                <div class="form-group col-lg-6">
                    <label>Tipo de Identificación:</label>
                    <select required name="tipo_doc" id="" class="form-control">
                        <option  value="' . $f['cod_tipo_doc'] . '">' . $f['tipo_doc'] . '</option>
                        <option value="1">CC</option>
                        <option value="4">NIT</option>
                    </select>
                </div>

                <div class="form-group col-lg-6">
                    <label>Nombre:</label>
                    <input type="text" value="' . $f['nombre'] . '" class="form-control" placeholder="Ej:Diana" required name="nombre">
                </div>

                <div class="form-group col-lg-6">
                    <label>Correo electrónico:</label>
                    <input type="email" value="' . $f['email'] . '" class="form-control" placeholder="Ej:Diana@gmail.com" required name="email">
                </div>

                <div class="form-group col-lg-6">
                    <label>Teléfono:</label>
                    <input type="number" value="' . $f['telefono'] . '" class="form-control" placeholder="Ej:3154942891" required name="telefono">
                </div>
                
                <div class="form-group col-lg-6">
                        <label>Estado:</label>
                        <select required name="estado" id="" class="form-control">
                            <option value="' . $f['cod_estado'] . '">' . $f['estado'] . '</option>
                            <option value="1">Activo</option>
                            <option value="2">Pendiente</option>
                            <option value="3">Bloqueado</option>
                        </select>
                </div>
            </div>
            <button type="submit" class="btn btn-main-sm btn-flat mb-30 mt-30 w-100" >Actualizar datos de fundación</button>
            
        </form>
            ';
    }
}

function cargarFundacionesReporte()
{

    $objConsultas = new Consultas();
    $result = $objConsultas->mostrarFundacionesAdmin();

    if (!isset($result)) {
        echo '<h2>NO HAY USUARIOS REGISTRADOS</h2>';
    } else {

        foreach ($result as $f) {
            echo '
                <tr>
                    <td>' . $f['id_user'] . '</td>
                    <td>' . $f['nombre'] . '</td>
                    <td>' . $f['email'] . '</td>
                    <td>' . $f['telefono'] . '</td>
                    <td>' . $f['estado'] . '</td>
                    <td>' . $f['rol'] . '</td>
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
                <img src="../' . $f['foto'] . '" alt="Foto de admin" class="rounded-circle">
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
                <h3 class="text-center pt-5 pb-1">' . $f['nombre'] . ' ' . $f['apellido'] . '</h3>
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
        
                        <form action="../../Controllers/modificarCuentaAdmin.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
        
                                <div class="form-group col-lg-6">
                                    <label class="mtop-4">Identificación:</label>
                                    <input readonly type="number" class="form-control" placeholder="Ej:10000004436" required
                                        name="id_user" value="' . $f['id_user'] . '">
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
        
                                <div class="form-group col-lg-6">
                                    <label>Nombre:</label>
                                    <input type="text" class="form-control" placeholder="Ej:Diana" required name="nombre"
                                        value="' . $f['nombre'] . '">
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label>Apellido:</label>
                                    <input type="text" class="form-control" placeholder="Ej:Ramírez" required name="apellido"
                                        value="' . $f['apellido'] . '">
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label>Correo electrónico:</label>
                                    <input type="email" class="form-control" placeholder="Ej:Diana@gmail.com" required
                                        name="email" value="' . $f['email'] . '">
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label>Teléfono:</label>
                                    <input type="number" class="form-control" placeholder="Ej:3154942891" required
                                        name="telefono" value="' . $f['telefono'] . '">
                                </div>
        
                            </div>
                            <button type="submit" class="btn btn-main-sm btn-flat  mt-30 w-100">Actualizar datos</button>
        
                        </form>
                    </div>
        
        
                    <div class="p-5 tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="../../Controllers/modificarFotoAdmin.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="mtop-4">Identificación:</label>
                                    <input readonly type="number" class="form-control" placeholder="Ej:10000004436" required
                                        name="id_user" value="' . $f['id_user'] . '">
                                </div>
        
                                <div class="form-group col-lg-6">
                                    <label>Foto de usuario:</label>
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
                                    <input readonly type="number" class="form-control" placeholder="Ej:10000004436" required
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

function MostrarCantidadUsuariosRegistrados()
{
    $objConsultas = new Consultas();
    $result = $objConsultas->cantidadUsuariosRegistrados();

    foreach ($result as $f) {
        echo '
                <div class="col-lg-6">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="fa-solid fa-user" style="color: #11009e;"></i>
                            </div>
                            <div class="stat-content dib">
                                <div class="stat-text">Usuarios registrados</div>
                                <div class="stat-digit">' . $f ['cantidadUsers'] . '</div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
    }
}

function MostrarCantidadFundacionesRegistradas()
{
    $objConsultas = new Consultas();
    $result = $objConsultas->cantidadFundacionesRegistradas();

    foreach ($result as $f) {
        echo '
                <div class="col-lg-6">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="fa-solid fa-house" style="color: #4942e4;"></i>
                            </div>
                            <div class="stat-content dib">
                                <div class="stat-text">Fundaciones registradas</div>
                                <div class="stat-digit">' . $f['cantidadFundaciones'] . '</div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
    }
}

function MostrarCantidadEventosRegistrados()
{
    $objConsultas = new Consultas();
    $result = $objConsultas->cantidadEventosRegistrados();

    foreach ($result as $f) {
        echo '
                <div class="col-lg-6">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="fa-regular fa-calendar-check" style="color: #8696FE;"></i>
                            </div>
                            <div class="stat-content dib">
                                <div class="stat-text">Eventos registrados</div>
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
    $objConsultas = new Consultas();
    $result = $objConsultas->cantidadMascotasRegistradas();

    foreach ($result as $f) {
        echo '
                <div class="col-lg-6">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="fa-solid fa-paw" style="color: #11009e;"></i>
                            </div>
                            <div class="stat-content dib">
                                <div class="stat-text">Mascotas registradas</div>
                                <div class="stat-digit">' . $f['cantidadMascotas'] . '</div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
    }
}