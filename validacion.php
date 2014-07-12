<?php
include_once 'lib/conexion_bd.php';

function vfecha($date){
if(preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/',$date)) 
		return true;
	return false;
}

function vtipo($tipo,$conexion_bd){
	if(strlen ($tipo) == 1){
		$tipos 	= $conexion_bd -> prepare("SELECT tga_id FROM tipo_gasto ");
		$tipos -> execute();
		$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
		foreach ($tipos as $ids ) 
			foreach ($ids as $id ) 
				if($tipo==$id){
					return true;
					$conexion_bd =NULL;
				}
	}
	$conexion_bd =NULL;
	return false; 
}

function vdecripcion($texto){
	$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZáéíóúÁÉÍÓÚñÑ1234567890 ():;,.-+%*$@	";
	for ($i=0; $i<strlen($texto); $i++){ 
      if (strpos($permitidos, substr($texto,$i,1))===false){ 
             return false; 
      }
    } 
      return true;
}

function vcosto($costo){
$permitidos = "1234567890.,";
	for ($i=0; $i<strlen($costo); $i++){ 
      if (strpos($permitidos, substr($costo,$i,1))===false){ 
             return false; 
      }
    } 
      return true;
}

?> 
