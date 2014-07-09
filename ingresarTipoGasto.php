<?php
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['Id'],$_POST['Nombre'])) {
		$tga_id = $_POST['Id'];
		$tga_nombre = $_POST['Nombre'];
		
		$insert_bd = $Conexion_BD -> exec("INSERT INTO tipo_gasto VALUES ('$tga_id', '$tga_nombre')");
		$conexion_bd = NULL;
		print_r($insert_bd);
	}
}
else{
	$consulta = $conexion_bd->prepare(
		"SELECT * 
		FROM tipo_gasto"); //Definimos la consulta a la base de datos.
	$consulta->execute();
	$tGasto = $consulta->fetchALL(PDO::FETCH_ASSOC); //Ejecutamos la consulta
	$conexion_bd = NULL; // se cierra la conexión a la BD
	print_r($tGasto);
	//render('basicos/index.html.twig',array('gasto' => $tGasto[0][tga_id]));
}
?>