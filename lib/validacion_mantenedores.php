<?php 

function Vnombre ($nombre){
	if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]{1,15}$/',$nombre)) 
		return true;
	return false;
}
function Vid_tipo ($id){
	if(preg_match('/^[A-Z]$/',$id)) 
		return true;
	return false;
}
?> 
