<?php
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['conjunto'])) {
		$seleccion = $_POST['conjunto'];
		/*$reporte = $conexion_bd -> prepare(" SELECT cop_run, cop_nombres, cop_ap_paterno, cop_ap_materno, tcop_nombre, eco_descripcion, pro_numero
											   FROM cop_pro, copropietario, propiedad, estado_copropietario, tipo_copropietario
											   WHERE cpr_cop_id = cop_id AND 
											   		 cpr_eco_id = eco_id AND 
											   		 cpr_pro_id = pro_id AND 
											   		 cop_id = tco_id AND 
											   		 pro_con_id = con_id");
		$reporte -> execute();
		$reporte = $reporte -> fetchAll(PDO::FETCH_ASSOC);
		render('/reporte/index.html.twig', 'conjunto' => $reporte);*/
	}
	$conjuntos = $conexion_bd -> prepare("SELECT con_id, con_nombre FROM conjunto WHERE con_adm_run = 9287546");
	$conjuntos -> execute();
	$conjuntos = $conjuntos -> fetchAll(PDO::FETCH_ASSOC);
	render('/reporte/index.html.twig', array('conjunto' => $conjuntos));
}

else{
	$conjuntos = $conexion_bd -> prepare("SELECT con_id, con_nombre FROM conjunto WHERE con_adm_run = 9287546");
	$conjuntos -> execute();
	$conjuntos = $conjuntos -> fetchAll(PDO::FETCH_ASSOC);
	render('/reporte/index.html.twig', array('conjunto' => $conjuntos));
}
?>