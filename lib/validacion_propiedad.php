<?php 
include_once 'conexion_bd.php';

function Vpropiedad($prop) {
	if(preg_match('/^([a-zA-Z]+[0-9]+){1,4}$/',$prop)) 
		return true;
	return false;
}

function Vm2 ($m2){
	if(preg_match('/^[0-9]{1,4}$/',$m2)&& $m2 >= 1) 
		return true;
	return false;
}

function Valicuota ($ali){
	if(preg_match('/^\d+(.\d+)?$/',$ali))
		return true;
	return false;
}

function Vconjunto ($conjunto, $conexion_bd){
	$tipos 	= $conexion_bd -> prepare("SELECT con_nombre FROM conjunto ");
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