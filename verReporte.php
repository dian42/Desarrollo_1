<?php
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';

session_start();
if (count($_SESSION) != 0  && $_SESSION['tipo'] == false  ) {
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		if(isset($_GET['button2'], $_GET['button3'])) {
			$con_id = $_GET['button3'];
			$cop_run = $_GET['button2'];
			$usr = $_SESSION['usuario'];
			$reporte = $conexion_bd -> prepare(" SELECT cop_run, cop_nombres, cop_ap_paterno, cop_ap_materno, cpr_fecha, tcop_nombre, eco_descripcion, cop_fono, 
														cop_direccion, cop_mail, com_nombre, reg_nombre, pro_id, pro_numero, pro_m2, pro_alicuota, con_nombre
												 FROM cop_pro, copropietario, propiedad ,conjunto, comuna, region, estado_copropietario, tipo_copropietario
												 WHERE cop_run = $cop_run AND
													 cpr_cop_id = cop_run AND
													 cpr_pro_id = pro_id AND
													 cpr_eco_id = eco_id AND
													 eco_id = 'A' AND
													 cop_com_id = com_id AND
													 com_reg_id = reg_id AND
													 pro_con_id = con_id AND
													 tcop_id = cop_tcop_id AND
													 con_id  = $con_id");
			$reporte -> execute();
			$reporte = $reporte -> fetchAll(PDO::FETCH_ASSOC);
			$conj = $conexion_bd -> prepare(" SELECT con_nombre, con_fono, con_direccion, con_fondo FROM conjunto WHERE con_id = $con_id");
			$conj -> execute();
			$conj = $conj -> fetch(PDO::FETCH_ASSOC);
			render('/reporte/verReporte.html.twig',array('reporte' => $reporte, 'valido' => $_SESSION['valido'], 'conjunto' => $conj));
		}
	}
	else{
		$usr = $_SESSION['usuario'];
		$conjuntos = $conexion_bd -> prepare("SELECT con_id, con_nombre FROM conjunto WHERE con_adm_run = $usr");
		$conjuntos -> execute();
		$conjuntos = $conjuntos -> fetchAll(PDO::FETCH_ASSOC);
		render('/reporte/index.html.twig', array('conjunto' => $conjuntos, 'valido' => $_SESSION['valido'], 'conjuntoAdm' => $_SESSION['datos']));
	}
}
else {
	if (count($_SESSION) != 0 && $_SESSION['tipo'] == true ) {
		render('default/index.html.twig', array('valido' => $_SESSION['valido']));
	}
	else
		render('login/index.html.twig', array());
}
?>