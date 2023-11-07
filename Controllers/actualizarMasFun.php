<?php
      // Enlazamos las dependencias necesarias
      require_once("../Models/conexion.php");
      require_once("../Models/consultas.php");

      // Aterrizamos en variable los datos ingresados por el usuario los cuales viaja a traves del metodo post y los names de los campos

<<<<<<< HEAD
      $eveId = $_GET['id'];
      $eveNombre = $_POST['eveNombre'];
      $eveFecha = $_POST['eveFecha'];
      $eveDireccion = $_POST['eveDireccion'];
      $eveDescripcion = $_POST['eveDescripcion'];
      $eveEstado = $_POST['eveEstado'];
=======
      $masId = $_GET['id'];
      $masNombre = $_POST['masNombre'];
      $masEdad = $_POST['masEdad'];
      $masHistoria = $_POST['masHistoria'];
      $masVacunas = $_POST['masVacunas'];
      $masRaza = $_POST['masRaza'];
      $masEstSalud = $_POST['masEstSalud'];
>>>>>>> main

      //Creamos el objeto a partir de la clase
      //Para enviar los argumentos a la función en el modelo (archivo consultas)
      $objConsultas = new Consultas ();
<<<<<<< HEAD
      $result = $objConsultas->actualizarMasFun($eveId, $eveNombre, $eveFecha, $eveDireccion, $eveDescripcion, $eveEstado);
=======
      $result = $objConsultas->actualizarMasFun($masId, $masNombre, $masEdad, $masHistoria, $masVacunas, $masEstSalud);
>>>>>>> main


?>