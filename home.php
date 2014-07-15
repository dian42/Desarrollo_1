<?php
/*require_once 'lib/twigLoad.php';

session_start(); //Iniciamos una posible sesión



if (count($_SESSION) != 0 && $_SESSION['tipo'] == false ) {
		render('default/inicio.html.twig', array('valido' => $_SESSION['valido'] ));
}else {
	if (count($_SESSION) != 0 && $_SESSION['tipo'] == true ) {
		render('default/inicio.html.twig', array('valido' => $_SESSION['valido'] ));
	}else
		render('default/index.html.twig', array());
}
*/
require_once 'lib/twigLoad.php';

session_start();
if (count($_SESSION) != 0  && $_SESSION['tipo'] == false  ) {
	include_once 'lib/conexion_bd.php';
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		if(isset($_GET['condominio'])) {
			$bool = false;
			foreach ($_SESSION['datos'] as $value) 
				if ($value['con_id'] === $_GET['condominio']) 
					$bool = true;
			if ($bool){
				$seleccion = $_GET['condominio'];
				$usr = $_SESSION['usuario'];
				$reporte = $conexion_bd -> prepare(" SELECT cop_run, cop_nombres, cop_ap_paterno, cop_ap_materno, pro_numero
													 FROM cop_pro, propiedad, copropietario, conjunto
													 WHERE pro_con_id = $seleccion AND
													 	cpr_pro_id = pro_id AND
													 	cpr_eco_id = 'A' AND
													 	cpr_cop_id = cop_run AND
													 	pro_con_id = con_id");
				$reporte -> execute();
				$reporte = $reporte -> fetchAll(PDO::FETCH_ASSOC);
				/*$reporte = $conexion_bd -> prepare(" SELECT cop_run, cop_nombres, cop_ap_paterno, cop_ap_materno, pro_numero, tcop_nombre, eco_descripcion
													 FROM cop_pro, copropietario, propiedad, estado_copropietario, tipo_copropietario
													 WHERE cpr_cop_id = cop_run AND cpr_eco_id = eco_id AND
													 	   cpr_pro_id = pro_id AND cop_tcop_id = tcop_id AND
													 	   pro_con_id = $seleccion");
				$reporte -> execute();
				$reporte = $reporte -> fetchAll(PDO::FETCH_ASSOC);*/
				render('/reporte/index.html.twig',array('reporte' => $reporte, 'valido' => $_SESSION['valido'], 'conjunto' => $seleccion));
			}
		}
		else{
			$usr = $_SESSION['usuario'];
			$conjuntos = $conexion_bd -> prepare("SELECT con_id, con_nombre FROM conjunto WHERE con_adm_run = $usr");
			$conjuntos -> execute();
			$conjuntos = $conjuntos -> fetchAll(PDO::FETCH_ASSOC);
			render('/reporte/index.html.twig', array('conjunto' => $conjuntos, 'valido' => $_SESSION['valido'], 'conjunto' => $seleccion));
		}
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