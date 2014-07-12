<?php
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['descripcion'],$_POST['id'])) {
		$tga_nombre = $_POST['descripcion'];
		$tga_id = $_POST['id'];
		$insert_bd = $conexion_bd -> exec("UPDATE tipo_gasto SET tga_nombre = '$tga_nombre' WHERE tga_id = '$tga_id'");
		//$conexion_bd = NULL;
		//print_r($insert_bd);
		$consulta = $conexion_bd->prepare("SELECT * FROM tipo_gasto"); //Definimos la consulta a la base de datos.
		$consulta->execute();
		$tGasto = $consulta->fetchALL(PDO::FETCH_ASSOC); //Ejecutamos la consulta
		$conexion_bd = NULL; // se cierra la conexión a la BD
		render('basicos/index.html.twig',array('tGasto' => $tGasto));
	}
}elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['button2'])) {
		$tga_id = $_GET['button2'];	
		$consulta = $conexion_bd->prepare("SELECT * FROM tipo_gasto WHERE tga_id = '$tga_id'"); //Definimos la consulta a la base de datos.
		$consulta->execute();
		$tGasto = $consulta->fetch(PDO::FETCH_ASSOC); //Ejecutamos la consulta

		$conexion_bd = NULL; // se cierra la conexión a la BD
		render('basicos/update.html.twig', array('tGasto' => $tGasto ));
	}else{
		$consulta = $conexion_bd->prepare("SELECT * FROM tipo_gasto"); //Definimos la consulta a la base de datos.
		$consulta->execute();
		$tGasto = $consulta->fetchALL(PDO::FETCH_ASSOC); //Ejecutamos la consulta
		$conexion_bd = NULL; // se cierra la conexión a la BD
		render('basicos/index.html.twig',array('tGasto' => $tGasto));
	}
}

?>