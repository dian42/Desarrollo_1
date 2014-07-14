<?php
include_once 'conexion_bd.php';

function vfecha($date){
	if(preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/',$date)) 
		return true;
	if(preg_match('/^\d{1,2}-\d{1,2}-\d{4}$/',$date)) 
		return true;	
	return false;
}	

function vtipoC($tipo,$conexion_bd){
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
function vtipoA($tipo,$conexion_bd){
	if(strlen ($tipo) == 1){
		$tipos 	= $conexion_bd -> prepare("SELECT tad_id FROM tipo_adicional ");
		$tipos -> execute();
		$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
		foreach ($tipos as $ids ) 
			foreach ($ids as $id ) 
				if($tipo == $id){
					return true;
					$conexion_bd =NULL;
				}
	}
	$conexion_bd =NULL;
	return false; 
}

function vdecripcion($texto){
	if(strlen ($texto) <= 100){
		$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZáéíóúÁÉÍÓÚñÑ1234567890 ():;,.-+%*$@	";
		for ($i=0; $i<strlen($texto); $i++){ 
	      if (strpos($permitidos, substr($texto,$i,1))===false){ 
	             return false; 
	      }
	    } 
    return true;
  }
  return false;
}

function vcosto($costo){
	if(strlen ($costo)<=7){
		$permitidos = "1234567890.,";
		for ($i=0; $i<strlen($costo); $i++){ 
	      if (strpos($permitidos, substr($costo,$i,1))===false){ 
	             return false; 
	      }
	    } 
	      return true;
  }
  return false;
}


function vpropiedad($prop) {
	if(strlen ($prop)<= 8){
		$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		for ($i=0; $i<strlen($prop); $i++){ 
	      if (strpos($permitidos, substr($prop,$i,1))===false){ 
	             return false; 
	      }
	    } 
	      return true;
  }
  return false;
}


?> 
