<?php 
function validaAdministrador($id , $run){
	include_once 'lib/conexion_bd.php';
	$consulta_bd = $conexion_bd->prepare("SELECT con_id FROM  conjunto WHERE con_id = $id AND con_adm_run = $run ");
	$consulta_bd -> execute();
	$valido = $consulta_bd->fetchAll(PDO::FETCH_ASSOC);
	$conexion_bd = NULL;

	return (empty($valido));
	/*
	if (empty($valido)) {
		//existe
	}else{
		//no existe malo
	}
	*/
}

function validaAdministrador($id , $run){
	include_once 'lib/conexion_bd.php';
	$consulta_bd = $conexion_bd->prepare("SELECT con_id FROM  conjunto WHERE con_id = $id AND con_adm_run = $run ");
	$consulta_bd -> execute();
	$valido = $consulta_bd->fetchAll(PDO::FETCH_ASSOC);
	$conexion_bd = NULL;

	return (empty($valido));
	/*
	if (empty($valido)) {
		//existe
	}else{
		//no existe malo
	}
	*/
}

?>