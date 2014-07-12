<?php
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['Descripcion'])) {
		$tga_nombre = $_POST['Descripcion'];
		$insert_bd = $conexion_bd -> exec("DELETE FROM tipo_gasto WHERE tga_nombre = '$tga_nombre'");
		$conexion_bd = NULL;
		print_r($insert_bd);
	}
}
else 
	render('basicos/delete.html.twig', array('tGasto' => array('id' => 1, 'descripcion' => "inllegable")));
?>