<?php
      // Enlazamos las dependencias necesarias
      require_once("../Models/conexion.php");
      require_once("../Models/consultas.php");

      // Aterrizamos en variable los datos ingresados por el usuario los cuales viaja a traves del metodo post y los names de los campos

      $nombre = $_POST['masNombre'];
      $edad = $_POST['masEdad'];
      $historia = $_POST['masHistoria'];
      $reqAdopcion = $_POST['masReqAdopcion'];
      $vacunas = $_POST['masVacunas'];
      $vacuna1 = $_POST['masVacuna1'];
      $vacuna2 = $_POST['masVacuna2'];
      $vacuna3 = $_POST['masVacuna3'];
      $vacuna4 = $_POST['masVacuna4'];
      $especie = $_POST['masEspecie'];
      $raza = $_POST['masRaza'];
      $sexo = $_POST['masSexo'];
      $estSalud = $_POST['masEstSalud'];
      $personalidad = $_POST['masPersonalidad'];
      session_start();
      $funId = $_SESSION['id'];

            //VALIDAMOS QUE LOS CAMPOS ESTEN COMPLETAMENTE DILIGENCIADOS

      if (strlen($especie) > 0 && strlen($raza) > 0 && strlen($nombre) > 0 && strlen($sexo) > 0 && strlen($edad) > 0 && strlen($vacunas) > 0 && strlen($estSalud) > 0 && strlen($personalidad) > 0 && strlen($historia) > 0 && strlen($reqAdopcion) > 0){
            
            $foto = "../Uploads/mascotas/" . $_FILES['masFoto']['name'];
            //Movemos el archivo a la carpeta Uploads y la carpeta de usuario
            $mover = move_uploaded_file($_FILES['masFoto']['tmp_name'], $foto);
            //Creamos una variable para definir la ruta donde quedará alojada la imagen
 

            //Creamos el objeto a partir de la clase
            //Para enviar los argumentos a la función en el modelo (archivo consultas)
            $objConsultas = new Consultas ();
            $result = $objConsultas->insertarMasFun($nombre, $edad, $historia, $reqAdopcion, $vacunas, $vacuna1, $vacuna2, $vacuna3, $vacuna4, $especie, $raza, $sexo, $estSalud, $personalidad, $foto, $funId);
      
      }
      else{
            echo '<script> alert("Por favor complete todos los campos") </script>';
            echo "<script> location.href='../Views/homeFundacion/registrar_mascotas.php' </script>";
      }

?>