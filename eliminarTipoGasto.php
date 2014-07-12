<?php
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['button1'])) {
		$tga_id = $_GET['button1'];
		$insert_bd = $conexion_bd -> exec("DELETE FROM tipo_gasto WHERE tga_id = '$tga_id'");
		//$conexion_bd = NULL;
		print_r($insert_bd);
		$consulta = $conexion_bd->prepare("SELECT * FROM tipo_gasto"); //Definimos la consulta a la base de datos.
		$consulta->execute();
		$tGasto = $consulta->fetchALL(PDO::FETCH_ASSOC); //Ejecutamos la consulta
		$conexion_bd = NULL; // se cierra la conexión a la BD
		render('basicos/index.html.twig',array('tGasto' => $tGasto));
	}
}
//else 
	//render('basicos/delete.html.twig', array('tGasto' => array('id' => 1, 'descripcion' => "inllegable")));
?>