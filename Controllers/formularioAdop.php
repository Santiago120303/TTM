<?php
      // Enlazamos las dependencias necesarias
      require_once("../Models/conexion.php");
      require_once("../Models/consultas.php");

      // Aterrizamos en variable los datos ingresados por el usuario los cuales viaja a traves del metodo post y los names de los campos
      $masId = $_GET['id'];
      $adopEdad = $_POST['adopEdad'];
      $adopMasAnterior = $_POST['adopMasAnterior'];
      $adopMasActual = $_POST['adopMasActual'];
      $adopTrabajo = $_POST['adopTrabajo'];
      $adopMasHogar = $_POST['adopMasHogar'];
      $adopMuda = $_POST['adopMuda'];
      $adopNinos = $_POST['adopNinos'];
      $adopAcceso = $_POST['adopAcceso'];
      $adopRazon = $_POST['adopRazon'];
      $adopHorMascota = $_POST['adopHorMascota'];
      $adopSalida = $_POST['adopSalida'];
      $adopVisita = $_POST['adopVisita'];
      session_start();
      $id_usu_for_fk = $_SESSION['id'];

      //VALIDAMOS QUE LOS CAMPOS ESTEN COMPLETAMENTE DILIGENCIADOS

      if (strlen($adopEdad) > 0 && strlen($adopMasAnterior) > 0 && strlen($adopMasActual) > 0 && strlen($adopTrabajo) > 0 && strlen($adopMasHogar) 
      > 0 && strlen($adopMuda) > 0 && strlen($adopNinos) > 0 && strlen($adopAcceso) > 0 && strlen($adopRazon) > 0 && strlen($adopHorMascota) > 0 && strlen($adopSalida)
      > 0 && strlen($adopVisita)){
            
            //Creamos el objeto a partir de la clase
            //Para enviar los argumentos a la función en el modelo (archivo consultas)
            $objConsultas = new Consultas ();
            $result = $objConsultas->insertarFormulario($masId, $adopEdad, $adopMasAnterior, $adopMasActual, $adopTrabajo, $adopMasHogar,
            $adopMuda, $adopNinos, $adopAcceso, $adopRazon, $adopHorMascota, $adopSalida, $adopVisita, $id_usu_for_fk);
      
      }
      else{
            echo '<script> alert("Por favor complete todos los campos") </script>';
            echo "<script> location.href='for_adop.php' </script>";
      }

?>