<?php

    session_start();

        if (!isset($_SESSION['AUTENTICADO'])) {
            echo '<script> alert("Por favor, inicie sesión") </script>';
            echo "<script> location.href='../clientSite/login.php' </script>";
            exit; // Termina la ejecución del script después de la redirección
        }

        if ($_SESSION['rol'] != 1) {
            echo '<script> alert("No posee permisos para acceder a esta intefaz") </script>';
            echo "<script> history.go(-1); </script>";
            exit; // Termina la ejecución del script después de la redirección
        }

?>