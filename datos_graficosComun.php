<?php
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';
require_once 'lib/validacion_propiedad.php';
require_once 'lib/validacion_grafico.php';
include_once 'Grafico_gastos_comun.php';
session_start(); //Iniciamos una posible sesión

if (count($_SESSION) != 0 && $_SESSION['tipo'] == false ) {
	include_once 'lib/conexion_bd.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(isset($_POST['id'], $_POST['tga'], $_POST['fIni'],  $_POST['fFin'])) {
			$id = $_POST['id'];
			$tga = $_POST['tga'];
			$fIni = $_POST['fIni'];
			$fFin = $_POST['fFin'];
			if(Vcon($id,$conexion_bd) && VtipoGas($tga,$conexion_bd) && Vfecha($fIni,$conexion_bd) && Vfecha($fFin,$conexion_bd)&&VdifFechas($fIni,$fFin)){
				// grafico_comun ($fIni, $fFin, $id, $tga,$conexion_bd );
				echo $fIni." ". $fFin." ". $id." ". $tga;
			}
		}
	}
}

?>
