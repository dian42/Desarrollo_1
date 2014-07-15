<?php
	require_once 'lib/twigLoad.php';
	include_once 'lib/conexion_bd.php'; 

	session_start(); //Iniciamos una posible sesión
	if (count($_SESSION) != 0 && $_SESSION['tipo'] == false ) {
		include_once 'lib/conexion_bd.php';
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			if(isset($_GET['condominio'])){
				$bool = false;
				foreach ($_SESSION['datos'] as $value) 
					if ($value['con_id'] === $_GET['condominio']) 
						$bool = true;
				if ($bool){
					$conjunto = $_GET['condominio'];

					$fechas = $conexion_bd -> prepare(" SELECT DISTINCT (gas_fecha)
			    								  	  FROM gasto");
				    $fechas->execute();
					$fechas = $fechas -> fetchAll(PDO::FETCH_ASSOC);

					$tgasto=$conexion_bd -> prepare(" SELECT *
			    								  		 FROM tipo_gasto");
				    $tgasto->execute();
					$tgasto = $tgasto -> fetchAll(PDO::FETCH_ASSOC);
					render('grafico/graficoComun.html.twig', array('conjunto' => $conjunto, 'fechas_ini' => $fechas, 'fechas_ter' => $fechas, 'tgasto' => $tgasto, 'valido' => $_SESSION['valido']));
				}
			}
			else
				render('default/errorGET.html.twig');
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