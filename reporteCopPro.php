<?php
require_once 'lib/twigLoad.php';

session_start();
if (count($_SESSION) != 0  && $_SESSION['tipo'] == false  ) {
	include_once 'lib/conexion_bd.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(isset($_POST['conjunto'])) {
			$seleccion = $_POST['conjunto'];
			$usr = $_SESSION['usuario'];
			$reporte = $conexion_bd -> prepare(" SELECT cop_run, cop_nombres, cop_ap_paterno, cop_ap_materno, pro_numero, tcop_nombre, eco_descripcion
												 FROM cop_pro, copropietario, propiedad, estado_copropietario, tipo_copropietario
												 WHERE cpr_cop_id = cop_run AND cpr_eco_id = eco_id AND
												 	   cpr_pro_id = pro_id AND cop_tcop_id = tcop_id AND
												 	   pro_con_id = $seleccion");
			$reporte -> execute();
			$reporte = $reporte -> fetchAll(PDO::FETCH_ASSOC);
			$conjuntos = $conexion_bd -> prepare("SELECT con_id, con_nombre FROM conjunto WHERE con_adm_run = $usr");
			$conjuntos -> execute();
			$conjuntos = $conjuntos -> fetchAll(PDO::FETCH_ASSOC);
			render('/reporte/reporte.html.twig',array('reporte' => $reporte, 'conjunto' => $conjuntos, 'valido' => $_SESSION['valido'], 'conjuntoAdm' => $_SESSION['datos']));
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