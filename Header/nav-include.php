<?php
require_once ("Controllers/mostrarInfoAdmin.php");
?>
<!-- 
<link href="./plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="./plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
 -->


<?php


if (isset($_SESSION['AUTENTICADO'])) {
    echo '<header>
    <div class="container-fluid header-container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-expand-lg navbar-light navigation">
            <a class="navbar-brand" href="index.php">
              <img src="Views/images/logo.png" alt="Logo TTM"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto main-nav">
                <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav-item" href="Views/clientSite/fundaciones.php">Fundaciones</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Views/clientSite/mascotas.php">Mascotas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Views/clientSite/events.php">Eventos</a>
                </li>
                <!-- <li class="nav-item">
                                      <a class="nav-link" href="Views/clientSite/donation.php">Donación</a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link" href="Views/clientSite/aboutUs.php">Acerca de Nosotros</a>
                </li>
              </ul>';

    if ($_SESSION['cod_rol_fk'] === 'Administrador') {
        echo '<li class="nav-item d-block pt-4"><a class="nav-link carrito-btn"
                                    href="../views/administrador/home.php">Cuenta</a></li>';
    } elseif ($_SESSION['cod_rol_fk'] === 'Cliente') {
        // Agrega más casos según los diferentes roles que puedas tener
        echo '<li class="nav-item d-block pt-4"><a class="nav-link carrito-btn"
                                    href="../views/cliente/usuario.php">Cuenta</a></li>';
    } else {
        // Redirección por defecto
        echo '<li class="nav-item d-block pt-4"><a class="nav-link carrito-btn"
                                    href="../views/emprendedor/emprendedor.php">Cuenta</a></li>';
    }

    echo '</ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>';
} else {
    echo '
    <header>
  <div class="container-fluid header-container">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light navigation">
          <a class="navbar-brand" href="index.php">
            <img src="Views/images/logo.png" alt="Logo TTM" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto main-nav">
              <li class="nav-item">
              <a class="nav-link" href="index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-item" href="Views/clientSite/fundaciones.php">Fundaciones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Views/clientSite/mascotas.php">Mascotas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Views/clientSite/events.php">Eventos</a>
              </li>
              <!-- <li class="nav-item">
									<a class="nav-link" href="Views/clientSite/donation.php">Donación</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="Views/clientSite/aboutUs.php">Acerca de Nosotros</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto mt-10">
              <li class="nav-item">
                <a class="nav-link login-button" href="Views/clientSite/login.php">Ingresar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link login-button nav-button" href="Views/clientSite/register.php">Registrarse</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>';


};
