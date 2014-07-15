<?php 
include_once 'lib/conexion_bd.php';

function DatosGastos($conexion_bd){	
	$i=0;
	$datos = array();
	$tipos = $conexion_bd -> prepare("SELECT gas_id FROM gasto ");
	$tipos -> execute();
	$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
	$conexion_bd =NULL;
	foreach ($tipos as $gastos ) 
		foreach ($gastos as $gasto ) {
			if($i<9)
				$datos[++$i]=$gasto;
		}

	return $datos;
}

?> 
