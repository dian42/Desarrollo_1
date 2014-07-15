<?php 
include_once 'conexion_bd.php';

// echo Vpropiedad('c023')." ".Vm2(85)." ".Valicuota(0.250)." ". Vconjunto(1,$conexion_bd);

function Vpropiedad($prop) {
	if(preg_match('/^([a-zA-Z]*[0-9]+){1,8}$/',$prop)) 
		return true;
	return false;
}

function Vm2 ($m2){
	if(preg_match('/^[0-9]{1,4}$/',$m2)&& $m2 >= 1) 
		return true;
	return false;
}

function Valicuota ($ali){
	if(preg_match('/^[0-9]\.[0-9]+$/',$ali))
		return true;
	return false;
}

function Vconjunto ($conjunto, $conexion_bd){
	$tipos 	= $conexion_bd -> prepare("SELECT con_id FROM conjunto WHERE con_id = $conjunto");
	$tipos -> execute();		
	$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
	$conexion_bd =NULL;
	foreach ($tipos as $ids ) 
		foreach ($ids as $id ) 
			if($conjunto==$id)
				return true;		
	return false;
}
?>