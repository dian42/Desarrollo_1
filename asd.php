<?php 
include_once 'lib/conexion_bd.php';
DatosAdicionales ($conexion_bd,'2022-02-26', '2001-01-12', 1, 'C');

function DatosAdicionales($conexion_bd, $fecha_inicial, $fecha_final, $propiedad, $tipo_adicional){	
	$i=0;
	$datos = array();
	$tipos = $conexion_bd -> prepare("SELECT adi_costo FROM adicional WHERE adi_tad_id = '$tipo_adicional' AND adi_pro_id = $propiedad AND adi_fecha BETWEEN '$fecha_inicial' AND '$fecha_final' "); 
	$tipos -> execute();
	$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
	$fechas = $conexion_bd -> prepare("SELECT distinct(gas_fecha) FROM adicional  WHERE  adi_fecha BETWEEN '$fecha_inicial' AND '$fecha_final' ");
	$fechas -> execute();
	$fechas = $fechas->fetchAll(PDO::FETCH_ASSOC);
	$conexion_bd =NULL;
	$total=array( );
	print_r($tipos);
	foreach ($fechas as $fecha) {
		$total[$i]=0;
	 	foreach ($tipos as $gastos ) {
	 		if($fecha["gas_fecha"]===$gastos['gas_fecha'])
	 				$total[$i]=$total[$i]+$gastos['gas_costo'];
	 		
	 	}
	 	$i++;
	}	
	print_r($total);
}



 ?>