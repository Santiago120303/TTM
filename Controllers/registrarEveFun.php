<?php
      // Enlazamos las dependencias necesarias
      require_once("../Models/conexion.php");
      require_once("../Models/consultas.php");

      // Aterrizamos en variable los datos ingresados por el usuario los cuales viaja a traves del metodo post y los names de los campos

      $eveNombre = $_POST['eveNombre'];
      $eveTipo = $_POST['eveTipo'];
      $eveDireccion = $_POST['eveDireccion'];
      $eveFecha = $_POST['eveFecha'];
      $eveHoraInicio = $_POST['eveHoraInicio'];
      $eveHoraFin = $_POST['eveHoraFin'];
      $eveEstado = $_POST['eveEstado'];
      $eveDescripcion = $_POST['eveDescripcion'];
      session_start();
      $funId = $_SESSION['id'];
            //VALIDAMOS QUE LOS CAMPOS ESTEN COMPLETAMENTE DILIGENCIADOS

      if (strlen($eveNombre) > 0 && strlen($eveFecha) > 0 && strlen($eveHora)> 0 && strlen($eveDireccion) > 0 && strlen($eveDescripcion) > 0 && strlen($eveEstado) > 0){
            
            //Creamos una variable para definir la ruta donde quedará alojada la imagen
            $eveFoto = "../Uploads/eventos/" . $_FILES['eveFoto']['name'];
            //Movemos el archivo a la carpeta Uploads y la carpeta de usuario
            $mover = move_uploaded_file($_FILES['eveFoto']['tmp_name'], $eveFoto);
            //Creamos una variable para definir la ruta donde quedará alojada la imagen

            //Creamos el objeto a partir de la clase
            //Para enviar los argumentos a la función en el modelo (archivo consultas)
            $objConsultas = new Consultas ();
            $result = $objConsultas->insertarEveFun($eveNombre, $eveTipo, $eveDireccion, $eveFecha, $eveHoraInicio, $eveHoraFin, $eveEstado, $eveDescripcion,  $eveFoto, $funId);
      
      }
      else{
            echo '<script> alert("Por favor complete todos los campos") </script>';
            echo "<script> location.href='../Views/homefundacion/registrar_eventos.php' </script>";
      }

?>