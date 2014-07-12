<?php
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['button3'])) {
		$tga_id = $_GET['button3'];	
		$consulta = $conexion_bd->prepare("SELECT * FROM tipo_gasto WHERE tga_id = '$tga_id'"); //Definimos la consulta a la base de datos.
		$consulta->execute();
		$tGasto = $consulta->fetch(PDO::FETCH_ASSOC); //Ejecutamos la consulta

		$conexion_bd = NULL; // se cierra la conexión a la BD
		render('basicos/read.html.twig', array('tGasto' => $tGasto ));
	}else{
		$consulta = $conexion_bd->prepare("SELECT * FROM tipo_gasto"); //Definimos la consulta a la base de datos.
		$consulta->execute();
		$tGasto = $consulta->fetchALL(PDO::FETCH_ASSOC); //Ejecutamos la consulta
		$conexion_bd = NULL; // se cierra la conexión a la BD
		render('basicos/index.html.twig',array('tGasto' => $tGasto));
	}
}

?>