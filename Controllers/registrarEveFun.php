<?php
      // Enlazamos las dependencias necesarias
      require_once("../Models/conexion.php");
      require_once("../Models/consultas.php");

      // Aterrizamos en variable los datos ingresados por el usuario los cuales viaja a traves del metodo post y los names de los campos

      $eveNombre = $_POST['eveNombre'];
      $eveFecha = $_POST['eveFecha']; 
      $eveHora = $_POST['eveHora']; 
      $eveDireccion = $_POST['eveDireccion'];
      $eveDescripcion = $_POST['eveDescripcion'];
      $eveEstado = $_POST['eveEstado'];
      session_start();
      $funId = $_SESSION['id'];
            //VALIDAMOS QUE LOS CAMPOS ESTEN COMPLETAMENTE DILIGENCIADOS

      if (strlen($eveNombre) > 0 && strlen($eveFecha) > 0 && strlen($eveHora)> 0 && strlen($eveDireccion) > 0 && strlen($eveDescripcion) > 0 && strlen($eveEstado) > 0){
            
            //Creamos una variable para definir la ruta donde quedará alojada la imagen
            $img = "../Uploads/Fundaciones/" . $_FILES['img']['name'];
            //Movemos el archivo a la carpeta Uploads y la carpeta de usuario
            $mover = move_uploaded_file($_FILES['img']['tmp_name'], $img);
            //Creamos una variable para definir la ruta donde quedará alojada la imagen

            //Creamos el objeto a partir de la clase
            //Para enviar los argumentos a la función en el modelo (archivo consultas)
            $objConsultas = new Consultas ();
            $result = $objConsultas->insertarEveFun($eveNombre, $eveFecha, $eveHora, $eveDireccion, $eveDescripcion, $eveEstado, $img, $funId);
      
      }
      else{
            echo '<script> alert("Por favor complete todos los campos") </script>';
            echo "<script> location.href='../Views/homefundacion/registrar_eventos.php' </script>";
      }

?>