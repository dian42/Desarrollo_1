<?php
require_once 'lib/twigLoad.php';
require_once 'lib/validacion_propiedad.php';
require_once 'lib/validacion_grafico.php';
include_once 'Grafico_gastos_adicional.php';
session_start(); //Iniciamos una posible sesión

if (count($_SESSION) != 0 && $_SESSION['tipo'] == false ) {
	include_once 'lib/conexion_bd.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(isset($_POST['id'], $_POST['tad'],$_POST['pro_id'], $_POST['fIni'],  $_POST['fFin'])) {
			$id = $_POST['id'];
			$pro_id = $_POST['pro_id'];
			$tad = $_POST['tad'];
			$fIni = $_POST['fIni'];
			$fFin = $_POST['fFin'];

			if(VtipoAdi($tad,$conexion_bd) && VfechaA($fIni,$conexion_bd) && VfechaA($fFin,$conexion_bd)&&VdifFechas($fIni,$fFin)){
				if (count(DatosAdicionales1($conexion_bd, $fIni, $fFin, $pro_id, $tad))>0)
					 grafico_adicional ($fIni, $fFin, $pro_id, $tad,$conexion_bd );
				else 
					echo "error";

				 grafico_adicional ($fIni, $fFin, $pro_id, $tad,$conexion_bd );
				// echo $fIni." ". $fFin." ". $id." ". $tga;
			}
		}
	}
}


function DatosAdicionales1($conexion_bd, $fecha_inicial, $fecha_final, $propiedad, $tipo_adicional){	
	$i=0;
	$datos = array();
	$tipos = $conexion_bd -> prepare("SELECT adi_costo, adi_fecha FROM adicional WHERE adi_tad_id = '$tipo_adicional' AND adi_pro_id = $propiedad AND adi_fecha BETWEEN '$fecha_inicial' AND '$fecha_final' "); 
	$tipos -> execute();
	$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
	$fechas = $conexion_bd -> prepare("SELECT distinct(adi_fecha) FROM adicional  WHERE adi_tad_id = '$tipo_adicional' AND adi_pro_id = $propiedad AND adi_fecha BETWEEN '$fecha_inicial' AND '$fecha_final' "); 
	$fechas -> execute();
	$fechas = $fechas->fetchAll(PDO::FETCH_ASSOC);
	$conexion_bd =NULL;
	$total=array( );
	foreach ($fechas as $fecha) {
		$total[$i]=0;
	 	foreach ($tipos as $gastos ) {
	 		if($fecha['adi_fecha']===$gastos['adi_fecha']){
	 				$total[$i]=$total[$i]+$gastos['adi_costo'];
	 				
	 		}
	 	}
	 	$i++; 
	}	
	return $total;
}

?>
