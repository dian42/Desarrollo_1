<?php
include_once 'lib/render.php';
include_once 'lib/Conexion_BD.php';
render('header.html');

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
	render('ingresaTipoGasto.html');
render('footer.html');
?>