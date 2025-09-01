<?php
session_start();
require_once('modelPersona.php');
//VALIDAR, NO SEAN VAGOS
//Capturar cada dato obtenido del array asociativos
//generado por el metodo de transmision POST elegido
$ci = $_POST['ci'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
//Creacion de objeto (instanciar)
$unaPersona = new Persona($ci, $nombre, $edad);
$_SESSION['nombre'] = $unaPersona->getNombre();
header('Location:viewConfirmacion.php');
//include_once('viewConfirmacion.php');
?>