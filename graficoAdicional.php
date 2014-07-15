<?php
	require_once 'lib/twigLoad.php';
	include_once 'lib/conexion_bd.php'; 

	session_start(); //Iniciamos una posible sesión
	if (count($_SESSION) != 0 && $_SESSION['tipo'] == false ) {
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			if(isset($_GET['condominio'])){
				$bool = false;
				foreach ($_SESSION['datos'] as $value) 
					if ($value['con_id'] === $_GET['condominio']) 
						$bool = true;
				if ($bool){
					$conjunto = $_GET['condominio'];
					$propiedad=$conexion_bd -> prepare(" SELECT pro_id, pro_numero
			    								  		 FROM propiedad
			    										 WHERE pro_con_id = $conjunto");
				    $propiedad->execute();
					$propiedad = $propiedad -> fetchAll(PDO::FETCH_ASSOC);


					$fechas = $conexion_bd -> prepare(" SELECT DISTINCT (adi_fecha)
			    								  	  FROM adicional");
				    $fechas->execute();
					$fechas = $fechas -> fetchAll(PDO::FETCH_ASSOC);

					$tadicional=$conexion_bd -> prepare(" SELECT *
			    								  		 FROM tipo_adicional");
				    $tadicional->execute();
					$tadicional = $tadicional -> fetchAll(PDO::FETCH_ASSOC);
					render('grafico/graficoAdicional.html.twig', array('conjunto' => $conjunto, 'propiedad' => $propiedad, 'fechas_ini' => $fechas,'fechas_ter' => $fechas, 'tadicional' => $tadicional, 'valido' => $_SESSION['valido']));
				}
				else
					render('default/errorGET.html.twig');
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