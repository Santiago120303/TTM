<?php
      // Enlazamos las dependencias necesarias
      require_once("../Models/conexion.php");
      require_once("../Models/consultas.php");

      // Aterrizamos en variable los datos ingresados por el usuario los cuales viaja a traves del metodo post y los names de los campos

      $id_fundacion = $_POST['id_user'];
      $direccion = $_POST['direccion'];
      $localidad = $_POST['localidad'];
      $descripcion = $_POST['descripcion'];
      $mision = $_POST['mision'];
      $vision = $_POST['vision'];


      //Creamos el objeto a partir de la clase
      //Para enviar los argumentos a la función en el modelo (archivo consultas)
      $objConsultas = new Consultas ();
      $result = $objConsultas->actualizarInfoFundacion($id_fundacion, $direccion, $localidad, $descripcion, $mision, $vision);



?>