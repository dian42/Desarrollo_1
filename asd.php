<?php 
$b ='2002/02/12';
$a ='2012/02/12';

if( strtotime ( $a )>= strtotime ( $b ))
	if( strtotime ( $a )> strtotime ( $b ))
		echo "tiempo a mayor";
	else
		echo "tiempos iguales";
else
	echo "tiempo b mayor";



 ?>