<?php 
dato();
function dato (){
	include_once 'lib/conexion_bd.php';
	$j=array();
	$q=0;
	$tipos  = $conexion_bd -> prepare("SELECT gas_costo FROM gasto WHERE gas_con_id = 1 ");
	$tipos -> execute();
	$tipos = $tipos->fetchAll(PDO::FETCH_ASSOC);
	foreach ($tipos as $ids )
		foreach ($ids as $id){
		$j[++$q]= $id;
	} 
	for($q;$q>0;$q--)
		echo $j[$q]."<br>";

}
?> 