<?php

require_once("../Models/conexion.php");
require_once("../Models/consultas.php");

// ATERRIZAMOS EL ID QUE SE ENVIA DESDE LA TABLA Y LO ATERRZAMOS EN UNA VARIABLE
$adopId = $_GET['id'];

$objConsultas = new Consultas();
$result = $objConsultas->eliminarFormFun($adopId);


?>