<?php
//include_once 'lib/render.php';
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';
//render('header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['Id'],$_POST['Nombre'])) {
		$tga_id = $_POST['Id'];
		$tga_nombre = $_POST['Nombre'];
		
		$insert_bd = $Conexion_BD -> exec("INSERT INTO tipo_gasto VALUES ('$tga_id', '$tga_nombre')");
		$conexion_bd = NULL;
		print_r($insert_bd);
	}
}
else 
	render('basicos/update.html.twig', array('ingresar' => "ejemplo", 'caca' => "ejemplo2"));
//render('footer.html');
?>