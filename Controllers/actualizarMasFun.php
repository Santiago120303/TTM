<?php
      // Enlazamos las dependencias necesarias
      require_once("../Models/conexion.php");
      require_once("../Models/consultas.php");

      // Aterrizamos en variable los datos ingresados por el usuario los cuales viaja a traves del metodo post y los names de los campos

      $eveId = $_GET['id'];
      $eveNombre = $_POST['eveNombre'];
      $eveFecha = $_POST['eveFecha'];
      $eveDireccion = $_POST['eveDireccion'];
      $eveDescripcion = $_POST['eveDescripcion'];
      $eveEstado = $_POST['eveEstado'];

      //Creamos el objeto a partir de la clase
      //Para enviar los argumentos a la función en el modelo (archivo consultas)
      $objConsultas = new Consultas ();
      $result = $objConsultas->actualizarMasFun($eveId, $eveNombre, $eveFecha, $eveDireccion, $eveDescripcion, $eveEstado);


?>