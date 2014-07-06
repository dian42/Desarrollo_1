<?php
include_once 'lib/Conexion_BD.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['Descripcion'])) {
		$tga_nombre = $_POST['Descripcion'];
		$insert_bd = $Conexion_BD -> exec("UPDATE tipo_gasto SET tga_nombre = '$tga_nombre'  WHERE tga_nombre = '$tga_nombre'");
		$conexion_bd = NULL;
		print_r($insert_bd);
	}
}
else 
	render('modificaTipoGasto.html');
?>