<head>
  <!-- <link rel="stylesheet" href="../css/styleDashboarNoCol.css"> -->
  <style>

    #menu ul{
      display: none;
      transition: 1s;
    }
  </style>
</head>

<div class="col-lg-3">
  <div class="sidebar">
    <!-- Se trae una pequena seccion que mostrar la foto del usuario, su rol y su nombre -->
    <?php
      perfil();
    ?>
    <div class="widget user-dashboard-menu">
      <ul id="menu">
        <li class="nav-item dropdown dropdown-slide"> <a class="nav-link dropdown-toggle"><i class="fa fa-solid fa-plus"></i>Registrar</a>
            <ul class="drop-down-menu">
                <li><a class="dropdown-item" href="registrar_usuario.php"><i class="fa fa-user"></i>Usuario</a></li>
                <li><a class="dropdown-item" href="registrar_fundacion.php"><i class="fa fa-home"></i>Fundación</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown dropdown-slide"> <a class="nav-link dropdown-toggle"><i class="fa fa-solid fa-eye"></i>Ver</a>
            <ul class="drop-down-menu">
                <li><a class="dropdown-item" href="ver_administradores.php"><i class="fa fa-user"></i>Administradores</a></li>
                <li><a class="dropdown-item" href="ver_clientes.php"><i class="fa fa-user"></i>Clientes</a></li>
                <li><a class="dropdown-item" href="ver_fundaciones.php"><i class="fa fa-home"></i>Fundaciones</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown dropdown-slide"> <a class="nav-link dropdown-toggle"><i class="fa-solid fa-file-arrow-down"></i>Reportes</a>
            <ul class="drop-down-menu">
                <li><a class="dropdown-item" href="reporte_administradores.php"><i class="fa fa-user"></i>Administradores</a></li>
                <li><a class="dropdown-item" href="reporte_clientes.php"><i class="fa fa-user"></i>Clientes</a></li>
                <li><a class="dropdown-item" href="reporte_fundaciones.php"><i class="fa fa-home"></i>Fundaciones</a></li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</div>

<script src="https://kit.fontawesome.com/3b8b956f1a.js" crossorigin="anonymous"></script>
<!-- <script src="https://unpkg.com/jquery@3.7.0/dist/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  $(".dropdown-slide").on("mouseover", function () {
    $(this).find(".drop-down-menu").fadeIn(10)
  });

  $(".dropdown-slide").on("mouseleave", function () {
    $(this).find(".drop-down-menu").fadeOut(10);
  });
}); -->

<script>
    // Obtén la lista de elementos del menú
    var menu = document.getElementById('menu');
    var elementosMenu = menu.getElementsByTagName('li');

    // Agrega un controlador de eventos a cada elemento del menú
    for (var i = 0; i < elementosMenu.length; i++) {
      elementosMenu[i].addEventListener('click', function () {
        var submenu = this.querySelector('ul');
        if (submenu) {
          if (submenu.style.display === 'none' || submenu.style.display === '') {
            submenu.style.display = 'block';
          } else {
            submenu.style.display = 'none';
          }
        }
      });
    }
  </script>


</script>