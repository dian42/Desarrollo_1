<?php
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['Id'],$_POST['Nombre'])) {
		$tga_id = $_POST['Id'];
		$tga_nombre = $_POST['Nombre'];
		
		$insert_bd = $conexion_bd -> exec("INSERT INTO tipo_gasto VALUES ('$tga_id', '$tga_nombre')");
		$conexion_bd = NULL;
		print_r($insert_bd);
	}
}else{
    if(isset($_GET['propiedad'])){
    	$propiedad = $_GET['propiedad'];
    	render('default/index.html.twig',array());
    }
    if(isset($_GET['button1'])) {
    	render('default/index.html.twig',array());
	}elseif (isset($_GET['button2'])) {
		print_r($_GET['button2']);
    	render('default/index.html.twig',array());
	}
	$consulta = $conexion_bd->prepare("SELECT * FROM tipo_gasto"); //Definimos la consulta a la base de datos.
	$consulta->execute();
	$tGasto = $consulta->fetchALL(PDO::FETCH_ASSOC); //Ejecutamos la consulta
	$conexion_bd = NULL; // se cierra la conexión a la BD
	//print_r($tGasto);
	render('basicos/index.html.twig',array('tGasto' => $tGasto));
}

?>