<?php

require_once("../Models/conexion.php");
require_once("../Models/consultas.php");

// Configura el tipo de contenido y el nombre del archivo
header("Content-Type: text/php");
header("Content-Disposition: attachment; filename=Formulario.pdf");

function cargarFormulario(){

    $id_mascota = isset($_GET['id']) ? $_GET['id'] : null;

    $objConsultas = new Consultas();
    // Se llama a la función para obtener la información de la mascota específica
    $result = $objConsultas->mostrarMascotaFundacionEspecificaComun($id_mascota);

    foreach ($result as $f) {
            echo '

        <h3>Usuario adoptante: ' . $f ['nombre'] . '</h3>
        <h3>Mascota: ' . $f ['masNombre'] . '</h3>
        <form>                       
            <div class="row">
             <div class="form-group col-lg-12">
                 <label>¿Qué edad tienes?</label>
                 <input value="' . $f ['adopEdad'] . '" type="number" class="form-control" placeholder="Ej: 25" required name="adopEdad">
             </div>
        
             <div class="form-group col-lg-12">
                 <label>¿Has tenido mascotas anteriormente?</label><br>
                     <input type="radio" value="' . $f ['adopMasAnterior'] . '" name="adopMasAnterior" required>
                     <label for="radio">Sí</label><br>
                     <input type="radio" value="' . $f ['adopMasAnterior'] . '" name="adopMasAnterior" required>
                     <label for="radio">No</label>
             </div>
        
             <div class="form-group col-lg-12">
                 <label>¿Actualmente tienes mascotas? Si tiene mencione cuántas.</label>
                 <input value="' . $f ['adopMasActual'] . '" type="text" class="form-control" placeholder="Ej: Sí, 4 mascotas" required name="adopMasActual">
             </div>
        
             <div class="form-group col-lg-12">
                 <label>¿Cuál es su situación laboral o fuentes de ingreso actualmente?</label>
                 <input value="' . $f ['adopTrabajo'] . '" type="text" class="form-control" placeholder="Ej: Tengo un trabajo estable como..." required name="adopTrabajo">
             </div>
        
             <div class="form-group col-lg-12">
                 <label>¿Cuenta con casa propia o renta?</label><br>
                     <input type="radio" value="' . $f ['adopMasHogar'] . '" name="adopMasHogar" required>
                     <label for="radio">Casa propia</label><br>
                     <input type="radio" value="' . $f ['adopMasHogar'] . '" name="adopMasHogar" required>
                     <label for="radio">Renta</label>
             </div>
        
             <div class="form-group col-lg-12">
                 <label>Si se muda de casa, de ciudad o de país en el futuro, ¿qué sucedera con su mascota?</label>
                 <input value="' . $f ['adopMuda'] . '" type="text" class="form-control" placeholder="Ej: Mi mascota se mudará conmigo..." required name="adopMuda">
             </div>
             <div class="form-group col-lg-12">
                 <label>¿Hay niños en casa? Por favor, describa sus edades.</label>
                 <input value="' . $f ['adopNinos'] . '" type="text" class="form-control" placeholder="Ej: Sí, 1 niño de 8 años." required name="adopNinos">
             </div>
        
             <div class="form-group col-lg-12">
                <label>¿La mascota tendrá acceso a cualquier lugar de la casa?</label><br>
                    <input type="radio" value="' . $f ['adopAcesso'] . '" name="adopAcceso" required>
                    <label for="radio">Sí</label><br>
                    <input type="radio" value="' . $f ['adopAcesso'] . '" name="adopAcceso" required>
                    <label for="radio">No</label>
             </div>
             <div class="form-group col-lg-12">
                 <label>¿Cuál es la razón por la cual quiere adoptar a la mascota?</label>
                 <input value="' . $f ['adopRazon'] . '" type="text" class="form-control" placeholder="Ej: Quiero adptar una mascota porque.." required name="adopRazon">
             </div>
             <div class="form-group col-lg-12">
                 <label>¿Cuántas horas al día estará sola en casa la mascota?</label>
                 <input value="' . $f ['adopHorMascota'] . '" type="text" class="form-control" placeholder="Ej: 2 horas." required name="adopHorMascota">
             </div>
             <div class="form-group col-lg-12">
                 <label>Si tiene que salir de emergencia de su ciudad, ¿con quién dejaría a su nuevo amigo?</label>
                 <input value="' . $f ['adopSalida'] . '" type="text" class="form-control" placeholder="Ej: La dejaría con mi familiar." required name="adopSalida">
             </div>
             <div class="form-group col-lg-12">
                <label>¿Está de acuerdo que se le haga una visita previa a la mascota en su dirección de residencia?</label><br>
                    <input type="radio" value="' . $f ['adopSalida'] . '" name="adopVisita" required>
                    <label for="radio">Sí</label><br>
                    <input type="radio" value="' . $f ['adopVisita'] . '" name="adopVisita" required>
                    <label for="radio">No</label>
             </div>
    
        </form>
';
    }
}

    $formulario = cargarFormulario();
    // Envía el contenido al navegador
    echo $formulario;
?>
