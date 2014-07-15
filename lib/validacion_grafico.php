<?php 
include_once 'lib/conexion_bd.php';
 date_default_timezone_set('UTC');
function Vcon ($conjunto, $conexion_bd){
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
function Vfecha($date, $conexion_bd){
	$tipos 	= $conexion_bd -> prepare("SELECT distinct gas_fecha FROM gasto ");
	$tipos -> execute();		
	$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
	$conexion_bd =NULL;
	foreach ($tipos as $ids ) 
		foreach ($ids as $id ) 
			if($date==$id)
				return true;		
	return false;
}	

function VfechaA($date, $conexion_bd){
	$tipos 	= $conexion_bd -> prepare("SELECT distinct adi_fecha FROM adicional ");
	$tipos -> execute();		
	$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
	$conexion_bd =NULL;
	foreach ($tipos as $ids ) 
		foreach ($ids as $id ) 
			if($date==$id)
				return true;		
	return false;
}	

function VtipoGas($gasto, $conexion_bd){
	$tipos 	= $conexion_bd -> prepare("SELECT tga_id FROM tipo_gasto ");
	$tipos -> execute();		
	$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
	$conexion_bd =NULL;
	foreach ($tipos as $ids ) 
		foreach ($ids as $id ) 
			if($gasto==$id)
				return true;		
	return false;
}	

function VtipoAdi($gasto, $conexion_bd){
	$tipos 	= $conexion_bd -> prepare("SELECT tad_id FROM tipo_adicional ");
	$tipos -> execute();		
	$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
	$conexion_bd =NULL;
	foreach ($tipos as $ids ) 
		foreach ($ids as $id ) 
			if($gasto==$id)
				return true;		
	return false;
}	

function VdifFechas ($dateI, $dateF){
	if( strtotime ( $dateI )<= strtotime ( $dateF ))
		return true ;
	else
		return false;
}


 ?>