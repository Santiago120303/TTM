<?php
//CREAMOS UNA CLASE QUE CONTENDRA TODAS LAS FUNCIONES CRUD DEL SISTEMA
class Consultas
{

    //Función registro de usuario externo

    public function insertarUserEx($id, $nombre, $apellido, $email, $telefono, $claveMd, $rol, $estado, $tipo_doc){

        //Creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();


        //SELECT DE USUARIO REGISTRADO EN EL SISTEMA

        $validarUsu = "SELECT * FROM tbl_users WHERE id_user=:id OR email=:email";

        $result = $conexion->prepare($validarUsu);

        $result->bindParam(":id", $id);
        $result->bindParam(":email", $email);

        $result->execute();

        // Se crea un arreglo a partir de la considencia que hay en la consulta anterior, si no hay coinsidencia se creara un arreglo vacio o inexistente

        $f = $result->fetch();

        if ($f) {

            echo '<script> alert("Este usuario ya esta registrado, intentelo nuevamente o inicie sesión") </script>';
            echo "<script> location.href='../Views/clientSite/register.php' </script>";
        } else {

            //Creamos la variable que contendra la consulta a ejecutar
            $insertar = "INSERT INTO tbl_users (id_user, nombre, apellido, email, telefono, clave, cod_rol_fk, cod_estado_fk, cod_tipo_doc_fk)
                VALUES (:id, :nombre, :apellido, :email, :telefono, :claveMd, :rol, :estado, :tipo_doc)";

            //Preparamos todo lo necesario para ejecutar la funcion anterior

            $result = $conexion->prepare($insertar);

            //convertimos los argumentos en parametros

            $result->bindParam(":id", $id);
            $result->bindParam(":nombre", $nombre);
            $result->bindParam(":apellido", $apellido);
            $result->bindParam(":email", $email);
            $result->bindParam(":telefono", $telefono);
            $result->bindParam(":claveMd", $claveMd);
            $result->bindParam(":rol", $rol);
            $result->bindParam(":estado", $estado);
            $result->bindParam(":tipo_doc", $tipo_doc);

            //Ejecutamos el insert
            $result->execute();

            echo '<script> alert("Usuario Registrado con Exito") </script>';
            echo "<script> location.href='../Views/clientSite/login.php' </script>";
        }
    }

    public function insertarFundacionEx($id, $nombre, $email, $localidad, $telefono, $claveMd, $rol, $estado, $tipo_doc){

        //Creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();


        //SELECT DE USUARIO REGISTRADO EN EL SISTEMA

        $validarUsu = "SELECT * FROM tbl_users WHERE id_user=:id OR email=:email";

        $result = $conexion->prepare($validarUsu);

        $result->bindParam(":id", $id);
        $result->bindParam(":email", $email);

        $result->execute();

        // Se crea un arreglo a partir de la considencia que hay en la consulta anterior, si no hay coinsidencia se creara un arreglo vacio o inexistente

        $f = $result->fetch();

        if ($f) {

            echo '<script> alert("Esta fundación ya esta registrada, verifica la información o inicie sesión") </script>';
            echo "<script> location.href='../Views/clientSite/register_fundacion.php' </script>";
        } else {

            //Creamos la variable que contendra la consulta a ejecutar
            $insertarUsers = "INSERT INTO tbl_users (id_user, nombre, email, telefono, clave, cod_rol_fk, cod_estado_fk, cod_tipo_doc_fk)
                VALUES (:id, :nombre, :email, :telefono, :claveMd, :rol, :estado, :tipo_doc)";

            //Preparamos todo lo necesario para ejecutar la funcion anterior

            $result = $conexion->prepare($insertarUsers);

            //convertimos los argumentos en parametros

            $result->bindParam(":id", $id);
            $result->bindParam(":nombre", $nombre);
            $result->bindParam(":email", $email);
            $result->bindParam(":telefono", $telefono);
            $result->bindParam(":claveMd", $claveMd);
            $result->bindParam(":rol", $rol);
            $result->bindParam(":estado", $estado);
            $result->bindParam(":tipo_doc", $tipo_doc);

            //Ejecutamos el insert
            $result->execute();

            $insertar_tbl_fundaciones = "INSERT INTO tbl_fundaciones (id_fundacion, id_user_fundacion_fk, cod_localidad_fk)
            VALUES (:id, :id, :localidad)";

            $result = $conexion->prepare($insertar_tbl_fundaciones);

            $result->bindParam(":id", $id);
            $result->bindParam(":localidad", $localidad);

            $result->execute();

            echo '<script> alert("Fundacion Registrada con Exito, porfavor contacte al administrador para activar su cuenta") </script>';
            echo "<script> location.href='../Views/clientSite/login.php' </script>";
        }
    }

    //Dashboard Admin 

    public function insertarUserAdmin($id_user, $tipo_doc, $nombre, $apellido, $email, $telefono, $claveMd, $rol, $estado, $foto){

        //Creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();


        //SELECT DE USUARIO REGISTRADO EN EL SISTEMA

        $validarUsu = "SELECT * FROM tbl_users WHERE id_user=:id_user OR email=:email";

        $result = $conexion->prepare($validarUsu);

        $result->bindParam(":id_user", $id_user);
        $result->bindParam(":email", $email);

        $result->execute();

        $f = $result->fetch();

        if ($f) {

            echo '<script> alert("Los datos ingresados ya se encuentran registrados, verifique la infomación.") </script>';
            echo "<script> location.href='../Views/homeAdministrador/registrar_usuario.php' </script>";
        } else {

            //Creamos la variable que contendra la consulta a ejecutar
            $insertar = "INSERT INTO tbl_users (id_user, cod_tipo_doc_fk, nombre, apellido, email, telefono, clave, cod_rol_fk, cod_estado_fk, foto)
                VALUES (:id_user, :tipo_doc, :nombre, :apellido, :email, :telefono, :claveMd, :rol, :estado, :foto)";

            //Preparamos todo lo necesario para ejecutar la funcion anterior

            $result = $conexion->prepare($insertar);

            //convertimos los argumentos en parametros

            $result->bindParam(":id_user", $id_user);
            $result->bindParam(":tipo_doc", $tipo_doc);
            $result->bindParam(":nombre", $nombre);
            $result->bindParam(":apellido", $apellido);
            $result->bindParam(":email", $email);
            $result->bindParam(":telefono", $telefono);
            $result->bindParam(":claveMd", $claveMd);
            $result->bindParam(":rol", $rol);
            $result->bindParam(":estado", $estado);
            $result->bindParam(":foto", $foto);

            //Ejecutamos el insert
            $result->execute();

            echo '<script> alert("Usuario registrado exitosamente") </script>';
            echo "<script> location.href='../Views/homeAdministrador/registrar_usuario.php' </script>";
        }
    }

    public function mostrarUserAdmin($id_user){

        $f = null;

        //Creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $buscar = "SELECT tbl_users.id_user, tbl_users.foto, tbl_users.nombre, tbl_users.apellido, tbl_users.email, tbl_users.telefono, tbl_rol.rol, tbl_rol.cod_rol, tbl_estado.estado, tbl_estado.cod_estado, tbl_tipo_doc.tipo_doc, tbl_tipo_doc.cod_tipo_doc
        FROM (((tbl_users
        INNER JOIN tbl_rol ON tbl_users.cod_rol_fk = tbl_rol.cod_rol)
        INNER JOIN tbl_estado ON tbl_users.cod_estado_fk = tbl_estado.cod_estado)
        INNER JOIN tbl_tipo_doc ON tbl_users.cod_tipo_doc_fk = tbl_tipo_doc.cod_tipo_doc)
        WHERE tbl_users.id_user=:id_user";

        $result = $conexion->prepare($buscar);

        $result->bindParam(':id_user', $id_user);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }

    public function mostrarAdministradoresAdmin(){

        $f = null;

        //Creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT tbl_users.id_user, tbl_users.foto, tbl_users.nombre, tbl_users.apellido, tbl_users.email, tbl_users.telefono, tbl_rol.rol, tbl_estado.estado
        FROM ((tbl_users
        INNER JOIN tbl_rol ON tbl_users.cod_rol_fk = tbl_rol.cod_rol)
        INNER JOIN tbl_estado ON tbl_users.cod_estado_fk = tbl_estado.cod_estado)
        WHERE tbl_rol.cod_rol=1";


        $result = $conexion->prepare($consultar);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }

    public function actualizarAdministradorAdmin($id, $tipo_doc, $nombre, $apellido, $email, $telefono, $rol, $estado){
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = " UPDATE tbl_users SET cod_tipo_doc_fk=:tipo_doc, nombre=:nombre, apellido=:apellido, email=:email, telefono=:telefono, cod_rol_fk=:rol, cod_estado_fk=:estado WHERE id_user=:id ";
        $result = $conexion->prepare($actualizar);

        $result->bindParam(":id", $id);
        $result->bindParam(":tipo_doc", $tipo_doc);
        $result->bindParam(":nombre", $nombre);
        $result->bindParam(":apellido", $apellido);
        $result->bindParam(":email", $email);
        $result->bindParam(":telefono", $telefono);
        $result->bindParam(":rol", $rol);
        $result->bindParam(":estado", $estado);

        $result->execute();

        echo '<script> alert("Información de usuario actualizada exitosamente") </script>';
        echo "<script> location.href='../Views/homeAdministrador/modificar_administrador.php?id=$id' </script>";

    }

    public function eliminarAdministradorAdmin($id){

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $eliminar = "DELETE FROM tbl_users WHERE id_user=:id";
        $result = $conexion->prepare($eliminar);

        $result->bindParam(":id", $id);

        $result->execute();

        echo '<script> alert("Administrador eliminado") </script>';
        echo "<script> location.href='../Views/homeAdministrador/ver_administradores.php' </script>";
    }

    public function mostrarClientesAdmin(){

        $f = null;

        //Creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT tbl_users.id_user, tbl_users.foto, tbl_users.nombre, tbl_users.apellido, tbl_users.email, tbl_users.telefono, tbl_rol.rol, tbl_estado.estado
        FROM ((tbl_users
        INNER JOIN tbl_rol ON tbl_users.cod_rol_fk = tbl_rol.cod_rol)
        INNER JOIN tbl_estado ON tbl_users.cod_estado_fk = tbl_estado.cod_estado)
        WHERE tbl_rol.cod_rol=3";


        $result = $conexion->prepare($consultar);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }

    public function actualizarClienteAdmin($id, $tipo_doc, $nombre, $apellido, $email, $telefono, $rol, $estado){
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = " UPDATE tbl_users SET cod_tipo_doc_fk=:tipo_doc, nombre=:nombre, apellido=:apellido, email=:email, telefono=:telefono, cod_rol_fk=:rol, cod_estado_fk=:estado WHERE id_user=:id ";
        $result = $conexion->prepare($actualizar);

        $result->bindParam(":id", $id);
        $result->bindParam(":tipo_doc", $tipo_doc);
        $result->bindParam(":nombre", $nombre);
        $result->bindParam(":apellido", $apellido);
        $result->bindParam(":email", $email);
        $result->bindParam(":telefono", $telefono);
        $result->bindParam(":rol", $rol);
        $result->bindParam(":estado", $estado);

        $result->execute();

        echo '<script> alert("Información de usuario actualizada exitosamente") </script>';
        echo "<script> location.href='../Views/homeAdministrador/modificar_cliente.php?id=$id' </script>";

    }

    public function eliminarClienteAdmin($id){

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $eliminar = "DELETE FROM tbl_users WHERE id_user=:id";
        $result = $conexion->prepare($eliminar);

        $result->bindParam(":id", $id);

        $result->execute();

        echo '<script> alert("Cliente eliminado") </script>';
        echo "<script> location.href='../Views/homeAdministrador/ver_clientes.php' </script>";
    }

    public function insertarFundacionAdmin($id, $tipo_doc, $nombre, $email, $telefono, $estado, $localidad, $rol, $claveMd, $foto){

        //Creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();


        //SELECT DE FUNDACIONES REGISTRADO EN EL SISTEMA PARA VERICAR   QUE NO ESTE REGISRADAS

        $validarFun = "SELECT * FROM tbl_users WHERE email=:email OR id_user=:id";

        $result = $conexion->prepare($validarFun);

        $result->bindParam(":email", $email);
        $result->bindParam(":id", $id);

        $result->execute();

        $f = $result->fetch();

        if ($f) {

            echo '<script> alert("Esta fundacion ya se encuentran registrada, verifique la información") </script>';
            echo "<script> location.href='../Views/homeAdministrador/registrar_fundacion.php' </script>";

        } else {

            //Creamos la variable que contendra la consulta a ejecutar
            $insertar_tbl_users = "INSERT INTO tbl_users (id_user, nombre, telefono, email, clave, foto, cod_tipo_doc_fk, cod_rol_fk, cod_estado_fk)
                VALUES (:id, :nombre, :telefono, :email, :claveMd, :foto, :tipo_doc, :rol, :estado)";


            //Preparamos todo lo necesario para ejecutar la insercion de la funcion anterior

            
            $result = $conexion->prepare($insertar_tbl_users);
            //convertimos los argumentos en parametros

            $result->bindParam(":id", $id);
            $result->bindParam(":nombre", $nombre);
            $result->bindParam(":telefono", $telefono);
            $result->bindParam(":email", $email);
            $result->bindParam(":claveMd", $claveMd);
            $result->bindParam(":foto", $foto);
            $result->bindParam(":tipo_doc", $tipo_doc);
            $result->bindParam(":estado", $estado);
            $result->bindParam(":rol", $rol);

            //Ejecutamos el insert
            $result->execute();

            $insertar_tbl_fundaciones = "INSERT INTO tbl_fundaciones (id_fundacion, id_user_fundacion_fk, cod_localidad_fk)
                VALUES (:id, :id, :localidad)";

            $result = $conexion->prepare($insertar_tbl_fundaciones);

            $result->bindParam(":id", $id);
            $result->bindParam(":localidad", $localidad);

            $result->execute();

            echo '<script> alert("Fundación registrada con éxito") </script>';
            echo "<script> location.href='../Views/homeAdministrador/registrar_fundacion.php' </script>";
        }
    }

    public function filtrarFundacion($nombrefun, $localidadfun)
    {
        $fundaciones = null;
    
        // Creamos el objeto de la conexión
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
        $nombre = "%" .$nombrefun ."%";
        $localidad = "%" .$localidadfun ."%";

        $consultar = "SELECT tbl_users.id_user, tbl_users.nombre, tbl_users.telefono, tbl_users.email, tbl_users.foto, tbl_localidades.localidad
        FROM ((tbl_fundaciones
        INNER JOIN tbl_localidades ON tbl_fundaciones.cod_localidad_fk = tbl_localidades.cod_localidad)
        INNER JOIN tbl_users ON tbl_fundaciones.id_user_fundacion_fk = tbl_users.id_user)
        WHERE tbl_users.nombre LIKE :nombre and tbl_fundaciones.cod_localidad_fk LIKE :localidad ";
    
        $result = $conexion->prepare($consultar);
        $result->bindParam(":nombre", $nombre);
        $result->bindParam(":localidad", $localidad);

        $result->execute(); 
    
        while ($resultado = $result->fetch()) {
            $fundaciones[] = $resultado;
        }
    
        return $fundaciones;
    }

    public function mostrarFundacionesAdmin(){

        $f = null;

        //Creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT tbl_users.id_user, tbl_users.foto, tbl_users.nombre, tbl_users.apellido, tbl_users.email, tbl_users.telefono, tbl_rol.rol, tbl_estado.estado
        FROM ((tbl_users
        INNER JOIN tbl_rol ON tbl_users.cod_rol_fk = tbl_rol.cod_rol)
        INNER JOIN tbl_estado ON tbl_users.cod_estado_fk = tbl_estado.cod_estado)
        WHERE tbl_rol.cod_rol=2";


        $result = $conexion->prepare($consultar);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }
    public function mostrarFundacionesTodos()
    {
        $fundaciones = null;
    
        // Creamos el objeto de la conexión
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
    
        $consultar = "SELECT tbl_users.id_user, tbl_users.nombre, tbl_users.telefono, tbl_users.email, tbl_users.foto,  tbl_localidades.localidad
        FROM ((tbl_fundaciones
        INNER JOIN tbl_localidades ON tbl_fundaciones.cod_localidad_fk = tbl_localidades.cod_localidad)
        INNER JOIN tbl_users ON tbl_fundaciones.id_user_fundacion_fk = tbl_users.id_user)
        WHERE tbl_users.cod_estado_fk = 1";
    
        $result = $conexion->prepare($consultar);
        $result->execute(); 
    
        while ($resultado = $result->fetch()) {
            $fundaciones[] = $resultado;
        }
    
        return $fundaciones;
    }

 

    public function MostrarInfoFunEspecifica($id_fundacion)
    {
        $fundacion = null;
    
        // Creamos el objeto de la conexión
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
    
        $consulta = "SELECT *
        FROM (((tbl_fundaciones
        INNER JOIN tbl_localidades ON tbl_fundaciones.cod_localidad_fk = tbl_localidades.cod_localidad)
        INNER JOIN tbl_users ON tbl_fundaciones.id_user_fundacion_fk = tbl_users.id_user)
        INNER JOIN tbl_tipo_doc ON tbl_users.cod_tipo_doc_fk = tbl_tipo_doc.cod_tipo_doc)
        WHERE tbl_users.id_user = :id_fundacion";
    
        $result = $conexion->prepare($consulta);

        $result->bindParam(':id_fundacion',$id_fundacion);

        $result->execute(); 
    
        while ($resultado = $result->fetch()) {
            $fundacion[] = $resultado;
        }
    
        return $fundacion;
    }

    public function mostrarMascotasComun()
    {
        $mascotas = [];
    
        // Creamos el objeto de la conexión
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
    
        // Consulta para obtener solo los campos necesarios
        $consultar = "SELECT tbl_mascotas.masId, tbl_mascotas.masNombre, tbl_mascotas.masFoto, tbl_mascotas.masRaza, tbl_mascotas.masEdad, tbl_mascotas.masEstSalud, tbl_mascotas.masVacunas, tbl_mascotas.id_fun_mas_fk, tbl_especies.especie, tbl_mascota_sexo.mascota_sexo
        FROM ((tbl_mascotas
        INNER JOIN tbl_especies ON tbl_mascotas.cod_especie_fk = tbl_especies.cod_especie)
        INNER JOIN tbl_mascota_sexo ON tbl_mascotas.cod_mascota_sexo_fk = tbl_mascota_sexo.cod_mascota_sexo)";

        $result = $conexion->prepare($consultar);
        $result->execute();
    
        while ($resultado = $result->fetch()) {
            $mascotas[] = $resultado;
        }
    
        return $mascotas;
    }

    public function filtrarMascotas ($masEspecie, $masEdad, $masSexo, $masRaza)
    {
        $mascotas = null;
    
        // Creamos el objeto de la conexión
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
        $especie = "%" .$masEspecie ."%";
        $edad = "%" .$masEdad ."%";
        $sexo = "%" .$masSexo ."%";
        $raza = "%" .$masRaza ."%";

        // Consulta para obtener solo los campos necesarios
        $consultar = "SELECT tbl_mascotas.masId, tbl_mascotas.masNombre, tbl_mascotas.masFoto, tbl_mascotas.masRaza, tbl_mascotas.masEdad, tbl_especies.especie, tbl_mascota_sexo.mascota_sexo
        FROM ((tbl_mascotas
        INNER JOIN tbl_especies ON tbl_mascotas.cod_especie_fk = tbl_especies.cod_especie)
        INNER JOIN tbl_mascota_sexo ON tbl_mascotas.cod_mascota_sexo_fk = tbl_mascota_sexo.cod_mascota_sexo)
        WHERE tbl_mascotas.cod_especie_fk LIKE :especie AND tbl_mascotas.masEdad LIKE :edad AND tbl_mascotas.cod_mascota_sexo_fk LIKE :sexo AND tbl_mascotas.masRaza LIKE :raza";
    
        $result = $conexion->prepare($consultar);
        $result->bindParam(":especie", $especie);
        $result->bindParam(":edad", $edad);
        $result->bindParam(":sexo", $sexo);
        $result->bindParam(":raza", $raza);


        $result->execute();
    
        while ($resultado = $result->fetch()) {
            $mascotas[] = $resultado;
        }
    
        return $mascotas;
    }

    public function mostrarMascotasFundacionEspecificaComun($id_fundacion)
    {
        $mascotas = [];
    
        // Creamos el objeto de la conexión
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
    
        // Consulta para obtener solo los campos necesarios
        $consultar = "SELECT tbl_mascotas.id_fun_mas_fk, tbl_mascotas.masId, tbl_mascotas.masNombre, tbl_mascotas.masFoto, tbl_mascotas.masRaza, tbl_mascotas.masEdad, tbl_especies.especie, tbl_mascota_sexo.mascota_sexo
        FROM ((tbl_mascotas
        INNER JOIN tbl_especies ON tbl_mascotas.cod_especie_fk = tbl_especies.cod_especie)
        INNER JOIN tbl_mascota_sexo ON tbl_mascotas.cod_mascota_sexo_fk = tbl_mascota_sexo.cod_mascota_sexo)
        WHERE tbl_mascotas.id_fun_mas_fk = :id_fundacion";
    
        $result = $conexion->prepare($consultar);

        $result->bindParam('id_fundacion',$id_fundacion);
        
        $result->execute();
    
        while ($resultado = $result->fetch()) {
            $mascotas[] = $resultado;
        }
    
        return $mascotas;
    }

    public function mostrarMascotaFundacionEspecificaComun($id_mascota) {
        $mascota = [];
    
        // Creamos el objeto de la conexión
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
    
        // Consulta para obtener solo los campos necesarios
        $consultar = "SELECT  *
        FROM (((((tbl_mascotas
        INNER JOIN tbl_especies ON tbl_mascotas.cod_especie_fk = tbl_especies.cod_especie)
        INNER JOIN tbl_mascota_sexo ON tbl_mascotas.cod_mascota_sexo_fk = tbl_mascota_sexo.cod_mascota_sexo)
        INNER JOIN tbl_users ON tbl_mascotas.id_fun_mas_fk = tbl_users.id_user)
        INNER JOIN tbl_fundaciones ON tbl_mascotas.id_fun_mas_fk  = tbl_fundaciones.id_fundacion)
        INNER JOIN tbl_localidades ON tbl_fundaciones.cod_localidad_fk  = tbl_localidades.cod_localidad)
        WHERE tbl_mascotas.masId = :id_mascota";
    
        $result = $conexion->prepare($consultar);

        $result->bindParam('id_mascota',$id_mascota);
        
        $result->execute();
    
        while ($resultado = $result->fetch()) {
            $mascota[] = $resultado;
        }
    
        return $mascota;
    }
    

    public function mostrarEventosComun(){
        $eventos = null;
    
        // Creamos el objeto de la conexión
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
    
        $consultar = "SELECT * FROM tbl_eventos";
    
        $result = $conexion->prepare($consultar);
        $result->execute(); 
    
        while ($resultado = $result->fetch()) {
            $eventos[] = $resultado;
        }
    
        return $eventos;
    }

    public function mostrarEventosFundacionEspecificaComun($id_fundacion){
        $eventos = null;
    
        // Creamos el objeto de la conexión
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
    
        $consultar = "SELECT * FROM tbl_eventos WHERE tbl_eventos.id_fun_eve_fk = :id_fundacion";
    
        $result = $conexion->prepare($consultar);

        $result->bindParam('id_fundacion',$id_fundacion);

        $result->execute(); 
    
        while ($resultado = $result->fetch()) {
            $eventos[] = $resultado;
        }
    
        return $eventos;
    }

    public function MostrarEventoFundacionEspecificaComun($id_evento) {
        $mascota = [];
    
        // Creamos el objeto de la conexión
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
    
        // Consulta para obtener solo los campos necesarios
        $consultar = "SELECT * 
        FROM (tbl_eventos
        INNER JOIN tbl_users ON tbl_eventos.id_fun_eve_fk = tbl_users.id_user)
        WHERE tbl_eventos.eveId = :id_evento";

    
        $result = $conexion->prepare($consultar);

        $result->bindParam('id_evento',$id_evento);
        
        $result->execute();
    
        while ($resultado = $result->fetch()) {
            $mascota[] = $resultado;
        }
    
        return $mascota;
    }

    public function mostrarEventoEspecificoComun($id_evento) {
        $evento = [];
    
        // Creamos el objeto de la conexión
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
    
        // Consulta para obtener solo los campos necesarios
        $consultar = "SELECT  *
        FROM (((((tbl_eventos
        INNER JOIN tbl_especies ON tbl_mascotas.cod_especie_fk = tbl_especies.cod_especie)
        INNER JOIN tbl_mascota_sexo ON tbl_mascotas.cod_mascota_sexo_fk = tbl_mascota_sexo.cod_mascota_sexo)
        INNER JOIN tbl_users ON tbl_mascotas.id_fun_mas_fk = tbl_users.id_user)
        INNER JOIN tbl_fundaciones ON tbl_mascotas.id_fun_mas_fk  = tbl_fundaciones.id_fundacion)
        INNER JOIN tbl_localidades ON tbl_fundaciones.cod_localidad_fk  = tbl_localidades.cod_localidad)
        WHERE tbl_eventos.eveId = :id_evento";
    
        $result = $conexion->prepare($consultar);

        $result->bindParam('id_evento',$id_evento);
        
        $result->execute();
    
        while ($resultado = $result->fetch()) {
            $evento[] = $resultado;
        }
    
        return $evento;
    }

    public function mostrarFundacionAdmin($id_fundacion){

        $f = null;

        //Creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $buscar = "SELECT * FROM fundaciones WHERE identificacion=:id_fundacion";

        $result = $conexion->prepare($buscar);

        $result->bindParam(':id_fundacion', $id_fundacion);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }

    public function actualizarFundacionAdmin($id, $tipo_doc, $nombre, $email, $telefono, $rol, $estado){
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = " UPDATE tbl_users SET cod_tipo_doc_fk=:tipo_doc, nombre=:nombre, email=:email, telefono=:telefono, cod_rol_fk=:rol, cod_estado_fk=:estado WHERE id_user=:id ";
        $result = $conexion->prepare($actualizar);

        $result->bindParam(":id", $id);
        $result->bindParam(":tipo_doc", $tipo_doc);
        $result->bindParam(":nombre", $nombre);
        $result->bindParam(":email", $email);
        $result->bindParam(":telefono", $telefono);
        $result->bindParam(":rol", $rol);
        $result->bindParam(":estado", $estado);

        $result->execute();

        echo '<script> alert("Información de fundacion actualizada exitosamente") </script>';
        echo "<script> location.href='../Views/homeAdministrador/modificar_fundacion.php?id=$id' </script>";

    }

    public function eliminarFundacionAdmin($id){

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $eliminarFundcion = "DELETE FROM tbl_fundaciones WHERE id_fundacion=:id";
        $result = $conexion->prepare($eliminarFundcion);

        $result->bindParam(":id", $id);

        $result->execute();

        $eliminarFunUser = "DELETE FROM tbl_users WHERE id_user=:id";
        $result = $conexion->prepare($eliminarFunUser);

        $result->bindParam(":id", $id);

        $result->execute();

        echo '<script> alert("Fundacion eliminada") </script>';
        echo "<script> location.href='../Views/homeAdministrador/ver_fundaciones.php' </script>";
    }

    public function actualizarInfoFundacion($id_fundacion, $direccion, $localidad, $descripcion, $mision, $vision){

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = " UPDATE tbl_fundaciones SET direccion=:direccion, descripcion=:descripcion, mision=:mision, vision=:vision, cod_localidad_fk=:localidad WHERE id_fundacion=:id_fundacion ";
        $result = $conexion->prepare($actualizar);

        $result->bindParam(":id_fundacion", $id_fundacion);
        $result->bindParam(":direccion", $direccion);
        $result->bindParam(":descripcion", $descripcion);
        $result->bindParam(":mision", $mision);
        $result->bindParam(":vision", $vision);
        $result->bindParam(":localidad", $localidad);

        $result->execute();

        echo '<script> alert("Información de fundación actualizada exitosamente") </script>';
        echo "<script> location.href='../Views/homefundacion/home.php' </script>";

    
    }

    public function insertarEveFun($eveNombre, $eveTipo, $eveDireccion, $eveFecha, $eveHoraInicio, $eveHoraFin, $eveEstado, $eveDescripcion,  $eveFoto, $funId){

        //Creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();


        //SELECT DE USUARIO REGISTRADO EN EL SISTEMA

        $validarEve = "SELECT * FROM tbl_eventos WHERE eveNombre=:eveNombre AND eveFecha=:eveFecha AND eveDireccion=:eveDireccion ";

        $result = $conexion->prepare($validarEve);

        $result->bindParam(":eveNombre", $eveNombre);
        $result->bindParam(":eveFecha", $eveFecha);
        $result->bindParam(":eveDireccion", $eveDireccion);

        $result->execute();

        $f = $result->fetch();

        if ($f) {

            echo '<script> alert(" Los datos proporcionados ya han sido registrados. Por favor, verifique la información e intente ingresarla nuevamente.") </script>';
            echo "<script> location.href='../Views/homefundacion/registrar_eventos.php' </script>";
        } else {

            //Creamos la variable que contendra la consulta a ejecutar
            $insertar = "INSERT INTO tbl_eventos (eveNombre, eveFecha, eveHoraInicio, eveHoraFin, eveDireccion, eveEstado, eveTipo, eveDescripcion, eveFoto, id_fun_eve_fk)
                VALUES (:eveNombre, :eveFecha, :eveHoraInicio, :eveHoraFin, :eveDireccion, :eveEstado, :eveTipo, :eveDescripcion, :eveFoto, :funId )";

            //Preparamos todo lo necesario para ejecutar la funcion anterior

            $result = $conexion->prepare($insertar);

            //convertimos los argumentos en parametros

            $result->bindParam(":eveNombre", $eveNombre);
            $result->bindParam(":eveFecha", $eveFecha);
            $result->bindParam(":eveHoraInicio", $eveHoraInicio);
            $result->bindParam(":eveHoraFin", $eveHoraFin);
            $result->bindParam(":eveDireccion", $eveDireccion);
            $result->bindParam(":eveEstado", $eveEstado);
            $result->bindParam(":eveTipo", $eveTipo);
            $result->bindParam(":eveDescripcion", $eveDescripcion);
            $result->bindParam(":eveFoto", $eveFoto);
            $result->bindParam(":funId", $funId);


            //Ejecutamos el insert
            $result->execute();

            echo '<script> alert("Evento Registrado con Éxito") </script>';
            echo "<script> location.href='../Views/homefundacion/registrar_eventos.php' </script>";
        }
    }

    public function mostrarEveFun(){

        $f = null;

        //Creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM tbl_eventos";

        $result = $conexion->prepare($consultar);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }

    public function mostrarNombreEvento($eveNombre)
    {
        $fundaciones = null;
    
        // Creamos el objeto de la conexión
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
        $eveNombre = "%" .$eveNombre ."%";


        $consultar = "SELECT tbl_eventos.eveNombre, tbl_eventos.masFecha, tbl_eventos.eveHora, tbl_eventos.eveImg, tbl_eventos.id_fun_eve_fk
        FROM tbl_eventos
        INNER JOIN tbl_eventos ON tbl_fundaciones.id_fun_eve_fk = tbl_fundaciones.id_user_fundacion_fk)";
    
        $result = $conexion->prepare($consultar);
        $result->bindParam(":eveNombre", $eveNombre);

        $result->execute(); 
    
        while ($resultado = $result->fetch()) {
            $fundaciones[] = $resultado;
        }
    
        return $fundaciones;
    }

    public function editarEveFun($eveId){

        $f = null;

        //Creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $buscar = "SELECT * FROM tbl_eventos WHERE eveId=:eveId";

        $result = $conexion->prepare($buscar);

        $result->bindParam(':eveId', $eveId);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }

    public function actualizarEveFun($eveId, $eveNombre, $eveFecha, $eveHora,  $eveDireccion, $eveDescripcion,  $eveEstado){
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = " UPDATE tbl_eventos SET eveNombre=:eveNombre, eveFecha=:eveFecha, eveHora=:eveHora, eveDireccion=:eveDireccion, eveEstado=:eveEstado, eveDescripcion=:eveDescripcion WHERE eveId=:eveId ";
        $result = $conexion->prepare($actualizar);

        $result->bindParam(":eveId", $eveId);
        $result->bindParam(":eveNombre", $eveNombre);
        $result->bindParam(":eveFecha", $eveFecha);
        $result->bindParam(":eveHora", $eveHora);
        $result->bindParam(":eveDireccion", $eveDireccion);
        $result->bindParam(":eveEstado", $eveEstado);
        $result->bindParam(":eveDescripcion", $eveDescripcion);
        $result->execute();

        echo '<script> alert("Información de evento actualizada exitosamente") </script>';
        echo "<script> location.href='../Views/homefundacion/modificar_eventos.php?id=$eveId' </script>";

    }

    public function eliminarEveFun($eveId){

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $eliminar = "DELETE FROM tbl_eventos WHERE eveId=:eveId";
        $result = $conexion->prepare($eliminar);

        $result->bindParam(":eveId", $eveId);

        $result->execute();

        echo '<script> alert("Evento Eliminado") </script>';
        echo "<script> location.href='../Views/homefundacion/ver_eventos.php' </script>";
    }


    public function insertarMasFun($nombre, $edad, $historia, $reqAdopcion, $vacunas, $vacuna1, $vacuna2, $vacuna3, $vacuna4, $especie, $raza, $sexo, $estSalud, $personalidad, $foto, $funId){   

        //Creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        //Creamos la variable que contendra la consulta a ejecutar
        $insertar = "INSERT INTO tbl_mascotas (masNombre, masEdad, masHistoria, masReqAdopcion, masVacunas, masVacuna1, masVacuna2, masVacuna3, masVacuna4, cod_especie_fk, masRaza, cod_mascota_sexo_fk, masEstSalud, masPersonalidad, masFoto, id_fun_mas_fk)
            VALUES (:nombre, :edad, :historia, :reqAdopcion, :vacunas, :vacuna1, :vacuna2, :vacuna3, :vacuna4, :especie, :raza, :sexo, :estSalud, :personalidad, :foto, :funId)";
        //Preparamos todo lo necesario para ejecutar la funcion anterior
        $result = $conexion->prepare($insertar);
        //convertimos los argumentos en parametros
        $result->bindParam(":nombre", $nombre);
        $result->bindParam(":edad", $edad);
        $result->bindParam(":historia", $historia);
        $result->bindParam(":reqAdopcion", $reqAdopcion);
        $result->bindParam(":vacunas", $vacunas);
        $result->bindParam(":vacuna1", $vacuna1);
        $result->bindParam(":vacuna2", $vacuna2);
        $result->bindParam(":vacuna3", $vacuna3);
        $result->bindParam(":vacuna4", $vacuna4);
        $result->bindParam(":especie", $especie);
        $result->bindParam(":raza", $raza);
        $result->bindParam(":sexo", $sexo);
        $result->bindParam(":estSalud", $estSalud);
        $result->bindParam(":personalidad", $personalidad);
        $result->bindParam(":foto", $foto);
        $result->bindParam(":funId", $funId);
        //Ejecutamos el insert
        $result->execute();

        echo '<script> alert("Mascota Registrada con Éxito") </script>';
        echo "<script> location.href='../Views/homeFundacion/registrar_mascotas.php' </script>";
    }

    public function mostrarMasFun($id_fundacion){

        $f = null;

        //Creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT  tbl_mascotas.masId, tbl_mascotas.masNombre, tbl_mascotas.masFoto, tbl_mascotas.masRaza, tbl_mascotas.masEdad, tbl_mascotas.masEstSalud, tbl_mascotas.masVacunas, tbl_especies.especie
        FROM (tbl_mascotas
        INNER JOIN tbl_especies ON tbl_mascotas.cod_especie_fk=tbl_especies.cod_especie)
        WHERE tbl_mascotas.id_fun_mas_fk = :id_fundacion";

        $result = $conexion->prepare($consultar);

        $result->bindParam(':id_fundacion', $id_fundacion);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }

    public function editarMasFun($masId){

        $f = null;

        //Creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $buscar = "SELECT * FROM tbl_mascotas WHERE masId=:masId";

        $result = $conexion->prepare($buscar);

        $result->bindParam(':masId', $masId);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }

    public function actualizarMasFun($masId, $masNombre, $masEdad, $masHistoria, $masVacunas, $masEstSalud){
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = " UPDATE tbl_mascotas SET masNombre=:masNombre, masEdad=:masEdad, masHistoria=:masHistoria, masVacunas=:masVacunas, masEstSalud=:masEstSalud WHERE masId=:masId ";
        $result = $conexion->prepare($actualizar);

        $result->bindParam(":masId", $masId);
        $result->bindParam(":masNombre", $masNombre);
        $result->bindParam(":masEdad", $masEdad);
        $result->bindParam(":masHistoria", $masHistoria);
        $result->bindParam(":masVacunas", $masVacunas);
        $result->bindParam(":masEstSalud", $masEstSalud);
        $result->execute();

        echo '<script> alert("Información de mascota actualizada exitosamente") </script>';
        echo "<script> location.href='../Views/homefundacion/modificar_mascotas.php?id=$masId' </script>";

    }

    public function eliminarMasFun($masId){

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $eliminar = "DELETE FROM tbl_mascotas WHERE masId=:id";
        $result = $conexion->prepare($eliminar);

        $result->bindParam(":id", $masId);

        $result->execute();

        echo '<script> alert("Mascota Eliminada") </script>';
        echo "<script> location.href='../Views/homefundacion/ver_mascotas.php' </script>";
    }

    public function VerPerfil($id){

        $f = null;

        //Creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();


        $buscar = "SELECT tbl_users.id_user, tbl_users.foto, tbl_users.nombre, tbl_users.apellido, tbl_users.telefono, tbl_users.email, tbl_users.foto, tbl_rol.rol, tbl_estado.estado, tbl_tipo_doc.tipo_doc, tbl_tipo_doc.cod_tipo_doc
        FROM (((tbl_users
        INNER JOIN tbl_rol ON tbl_users.cod_rol_fk = tbl_rol.cod_rol)
        INNER JOIN tbl_estado ON tbl_users.cod_estado_fk = tbl_estado.cod_estado)
        INNER JOIN tbl_tipo_doc ON tbl_users.cod_tipo_doc_fk = tbl_tipo_doc.cod_tipo_doc)
        WHERE id_user=:id";

        $result = $conexion->prepare($buscar);

        $result->bindParam(':id', $id);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }

    public function modificarCuentaAdmin($id, $tipo_doc, $nombre, $apellido, $email, $telefono){

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = " UPDATE tbl_users SET cod_tipo_doc_fk=:tipo_doc, nombre=:nombre, apellido=:apellido, email=:email, telefono=:telefono WHERE id_user=:id ";
        $result = $conexion->prepare($actualizar);

        $result->bindParam(":id", $id);
        $result->bindParam(":tipo_doc", $tipo_doc);
        $result->bindParam(":nombre", $nombre);
        $result->bindParam(":apellido", $apellido);
        $result->bindParam(":email", $email);
        $result->bindParam(":telefono", $telefono);

        $result->execute();

        echo '<script> alert("Información de usuario actualizada") </script>';
        echo "<script> location.href='../Views/homeAdministrador/perfil.php?id=$id' </script>";

    }

    public function actualizarFotoAdmin($id, $foto){
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = " UPDATE tbl_users SET foto=:foto WHERE id_user=:id ";
        $result = $conexion->prepare($actualizar);

        $result->bindParam(":id", $id);
        $result->bindParam(":foto", $foto);


        $result->execute();

        echo '<script> alert("Foto de perfil actualizada") </script>';
        echo "<script> location.href='../Views/homeAdministrador/perfil.php' </script>";
    }

    public function actualizarClaveAdmin($id, $claveMd){
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = " UPDATE tbl_users SET clave=:claveMd WHERE id_user=:id ";
        $result = $conexion->prepare($actualizar);

        $result->bindParam(":id", $id);
        $result->bindParam(":claveMd", $claveMd);


        $result->execute();

        echo '<script> alert("Clave actualizada correctamente") </script>';
        echo "<script> location.href='../Views/homeAdministrador/perfil.php' </script>";
    }

    public function actualizarClaveFundacion($id, $claveMd){
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = " UPDATE tbl_users SET clave=:claveMd WHERE id_user=:id ";
        $result = $conexion->prepare($actualizar);

        $result->bindParam(":id", $id);
        $result->bindParam(":claveMd", $claveMd);


        $result->execute();

        echo '<script> alert("Clave actualizada correctamente") </script>';
        echo "<script> location.href='../Views/homeFundacion/perfil.php' </script>";
    }

    //Dashboard Fundacion

    public function modificarCuentaFundacion($id, $tipo_doc, $nombre, $email, $telefono){
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = "UPDATE tbl_users SET cod_tipo_doc_fk=:tipo_doc, nombre=:nombre, email=:email, telefono=:telefono WHERE id_user=:id";

        $result = $conexion->prepare($actualizar);

        $result->bindParam(":id", $id);
        $result->bindParam(":tipo_doc", $tipo_doc);
        $result->bindParam(":nombre", $nombre);
        $result->bindParam(":email", $email);
        $result->bindParam(":telefono", $telefono);

        $result->execute();

        echo '<script> alert("Información de fundación actualizada") </script>';
        echo "<script> location.href='../Views/homeFundacion/perfil.php' </script>";

        
    }

    public function actualizarLogoFundacion($id, $logo){
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $actualizar = " UPDATE tbl_users SET foto=:logo WHERE id_user=:id ";
        $result = $conexion->prepare($actualizar);

        $result->bindParam(":id", $id);
        $result->bindParam(":logo", $logo);


        $result->execute();

        echo '<script> alert("Logo de fundación actualizado") </script>';
        echo "<script> location.href='../Views/homeFundacion/perfil.php' </script>";
    }

    //Formulario de adopción 

    public function insertarFormulario($adopEdad, $adopMasAnterior, $adopMasActual, $adopTrabajo, $adopMasHogar,
        $adopMuda, $adopNinos, $adopAcceso, $adopRazon, $adopHorMascota, $adopSalida, $adopVisita, $id_usu_for_fk)
    {

        //Creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();


        if ($_SESSION['AUTENTICADO']) {

            //Creamos la variable que contendra la consulta a ejecutar
            $insertar = "INSERT INTO tbl_adopciones (adopEdad, adopMasAnterior, adopMasActual, adopTrabajo, adopMasHogar,
            adopMuda, adopNinos, adopAcceso, adopRazon, adopHorMascota, adopSalida, adopVisita, id_usu_for_fk)
                VALUES (:adopEdad, :adopMasAnterior, :adopMasActual, :adopTrabajo, :adopMasHogar, :adopMuda, :adopNinos, 
            :adopAcceso, :adopRazon, :adopHorMascota, :adopSalida, :adopVisita, :id_usu_for_fk)";

            //Preparamos todo lo necesario para ejecutar la funcion anterior

            $result = $conexion->prepare($insertar);

            //convertimos los argumentos en parametros

            $result->bindParam(":adopEdad", $adopEdad);
            $result->bindParam(":adopMasAnterior", $adopMasAnterior);
            $result->bindParam(":adopMasActual", $adopMasActual);
            $result->bindParam(":adopTrabajo", $adopTrabajo);
            $result->bindParam(":adopMasHogar", $adopMasHogar);
            $result->bindParam(":adopMuda", $adopMuda);
            $result->bindParam(":adopNinos", $adopNinos);
            $result->bindParam(":adopAcceso", $adopAcceso);
            $result->bindParam(":adopRazon", $adopRazon);
            $result->bindParam(":adopHorMascota", $adopHorMascota);
            $result->bindParam(":adopSalida", $adopSalida);
            $result->bindParam(":adopVisita", $adopVisita);
            $result->bindParam(":id_usu_for_fk", $id_usu_for_fk);

            //Ejecutamos el insert
            $result->execute();

            echo '<script> alert("Su formulario fue enviado, por favor, espera una respuesta de la fundación") </script>';
            echo "<script> location.href='../Views/clientSite/mascotas.php' </script>";
        }
    }
    //consulta para saber cuantos usuarios estan registrados
    public function cantidadUsuariosRegistrados (){
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $cantidadusuarios = "SELECT COUNT(id_user) as cantidadUsers FROM tbl_users WHERE cod_rol_fk=3";
        $result = $conexion->prepare($cantidadusuarios);
        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }

    //consulta para saber cuantas fundaciones estan registrados
    public function cantidadFundacionesRegistradas (){
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $cantidafundaciones = "SELECT COUNT(id_user) as cantidadFundaciones FROM tbl_users WHERE cod_rol_fk=2";
        $result = $conexion->prepare($cantidafundaciones);
        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }

    //consulta para saber cuantos eventos estan registrados
    public function cantidadEventosRegistrados (){
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $cantidaeventos = "SELECT COUNT(eveId) as cantidadEventos FROM tbl_eventos";
        $result = $conexion->prepare($cantidaeventos);
        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }

    //consulta para saber cuantas mascotas estan registradas
    public function cantidadMascotasRegistradas (){
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $cantidamascotas = "SELECT COUNT(masId) as cantidadMascotas FROM tbl_mascotas";
        $result = $conexion->prepare($cantidamascotas);
        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }

    //consulta para saber cuantos eventos tiene la fundación activos
    public function cantidadEventosRegistradosFundacion($id_fundacion){

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $cantidaeventos = "SELECT COUNT(eveId) as cantidadEventos FROM tbl_eventos WHERE tbl_eventos.id_fun_eve_fk = :id_fundacion";
        $result = $conexion->prepare($cantidaeventos);

        $result->bindParam(':id_fundacion', $id_fundacion);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }

    //consulta para saber cuantas mascotas estan registradas
    public function cantidadMascotasRegistradasFundacion($id_fundacion){

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $cantidamascotas = "SELECT COUNT(masId) as cantidadMascotas FROM tbl_mascotas WHERE tbl_mascotas.id_fun_mas_fk = :id_fundacion";
        $result = $conexion->prepare($cantidamascotas);

        $result->bindParam(':id_fundacion', $id_fundacion);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }
}


//Función de validad sesión
class ValidarSesion
{

    public function iniciarSesion($email, $clave){

        //Creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM tbl_users WHERE email=:email";

        $result = $conexion->prepare($consultar);

        $result->bindParam(":email", $email);

        $result->execute();

        //Convertir la variable result en un arreglo para segmentar los datos que necesitamos
        $f = $result->fetch();

        if ($f) {

            //Se valida la contraseña del usuario

            if ($f['clave'] == $clave) {

                if ($f['cod_estado_fk'] == "1") {

                    //Se realiza el inicio de sesión

                    session_start();

                    //Creamos variables de sesión
                    $_SESSION['id'] = $f['id_user'];
                    $_SESSION['email'] = $f['email'];
                    $_SESSION['rol'] = $f['cod_rol_fk'];
                    $_SESSION['AUTENTICADO'] = "SI";

                    //Validamos el rol para redireccionar a la interfaz correspondiente

                    switch ($f['cod_rol_fk']) {

                        case '1':
                            echo '<script> alert("Bienvenid@ ' . $f['nombre'] . '") </script>';
                            echo '<script> location.href="../Views/homeAdministrador/home.php" </script>';
                            break;

                        case '2':
                            echo '<script> alert("Bienvenida fundación ' . $f['nombre'] . '  ") </script>';
                            echo "<script> location.href='../Views/homeFundacion/home.php' </script>";
                            break;

                        case '3':
                            echo '<script> alert("Bienvenido") </script>';
                            echo "<script> location.href='../Views/homeClient/home.php' </script>";
                            break;
                    }
                } else {
                    echo '<script> alert("Contacte al administrador para activar su cuenta") </script>';
                    echo "<script> location.href='../Views/clientSite/login.php' </script>";
                }
            } else {
                echo '<script> alert("La contraseña es incorrecta") </script>';
                echo "<script> location.href='../Views/clientSite/login.php' </script>";
            }
        } else {
            echo '<script> alert("Este usuario no existe, verifique su correo") </script>';
            echo "<script> location.href='../Views/clientSite/login.php' </script>";
        }
    }

    public function cerrarSesion()
{

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        session_start();
        session_destroy();

        echo "<script> location.href='../Views/clientSite/login.php' </script>";
    }
}
?>