<?php
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['id'],$_POST['nombre'])) {
		$tga_id = $_POST['id'];
		$tga_nombre = $_POST['nombre'];
		
		$insert_bd = $conexion_bd -> exec("INSERT INTO tipo_gasto VALUES ('$tga_id', '$tga_nombre')");
		//$conexion_bd = NULL;
		print_r($insert_bd);

		$consulta = $conexion_bd->prepare("SELECT * FROM tipo_gasto"); //Definimos la consulta a la base de datos.
		$consulta->execute();
		$tGasto = $consulta->fetchALL(PDO::FETCH_ASSOC); //Ejecutamos la consulta
		$conexion_bd = NULL; // se cierra la conexión a la BD
		render('basicos/index.html.twig',array('tGasto' => $tGasto));
	}

	//no cacho de aki pa abajo ya cambie el create 
}elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
		//$consulta = $conexion_bd->prepare("SELECT * FROM tipo_gasto WHERE tga_id = '$tga_id'"); //Definimos la consulta a la base de datos.
		//$consulta->execute();
		//$tGasto = $consulta->fetch(PDO::FETCH_ASSOC); //Ejecutamos la consulta

		$conexion_bd = NULL; // se cierra la conexión a la BD
		render('basicos/create.html.twig', array());
}

?>