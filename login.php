<?php
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';
//include_once 'vistas/login.html';

//session_start(); //Iniciamos una posible sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['user'], $_POST['pass'])) {
	    $user = $_POST['user']; //generamos la variable donde se pasan los datos del formulario, en este caso usuario
	    $pass = $_POST['pass']; //generamos la variable donde se pasan los datos del formulario, en este caso contraseña
$consulta_cop = $conexion_bd->prepare("SELECT cop_run , cop_clave FROM copropietario WHERE cop_run = $user AND cop_clave = '$pass'"); //Definimos la consulta a la base de datos.
$consulta_cop->execute();
$consult_cp = $consulta_cop->fetch(PDO::FETCH_ASSOC); //Ejecutamos la consulta
$consulta_adm = $conexion_bd->prepare("SELECT adm_run, adm_password FROM administrador WHERE adm_run = $user AND adm_password = '$pass'"); //Definimos la consulta a la base de datos.
$consulta_adm->execute();

$consult_ad = $consulta_adm->fetch(PDO::FETCH_ASSOC); //Ejecutamos la consulta

$conexion_bd = NULL; // se cierra la conexión a la BD.
//comprobamos que los datos obtenidos de la consulta, correspondan con los ingresados por usuario.
if($user == $consult_cp['cop_run'] && $pass == $consult_cp['cop_clave'])
	render('login.html.twig', array());
else
	if ($user == $consult_ad['adm_run'] && $pass == $consult_ad['adm_password']) 
		render('login.html.twig', array());	
//De forma contraria, mostramos el formulario y un mensaje de vuelta-
echo"asd2";
	}
}else
	include_once 'vistas/login.html';
?>