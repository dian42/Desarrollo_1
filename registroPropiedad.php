<?php
//session_start();
require_once 'lib/twigLoad.php';
//include_once 'lib/conexion_bd.php';

session_start(); //Iniciamos una posible sesión




if (count($_SESSION) != 0 && $_SESSION['tipo'] == false ) {
	include_once 'lib/conexion_bd.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(isset($_POST['conjunto'], $_POST['numero'], $_POST['m2'],  $_POST['alicuota'])) {
		    $conjunto = $_POST['conjunto'];
		    $numero = $_POST['numero'];
		    $m2 = $_POST['m2'];
		    $alicuota = $_POST['alicuota'];
		    //echo "$conjunto  $numero  $propietario  $m2  $fecha_compra  $alicuota";
		    $repeat=$conexion_bd -> prepare(" SELECT pro_id 
		    								  FROM propiedad
		    								  WHERE pro_numero='$numero' and
		    								  		pro_con_id = $conjunto");
		    $repeat->execute();
			$insert = $repeat -> fetchAll(PDO::FETCH_ASSOC);
			$largo = count($insert);
			if ($largo){
				$con = $conexion_bd->prepare("SELECT * FROM conjunto");
				$con -> execute();
				$consult_propiedad = $con -> fetchAll(PDO::FETCH_ASSOC); //Saca el todas las propiedades asociadas a un conjunto
				render('Rpropiedad/errorNew.html.twig', array('conjunto' => $consult_propiedad, 'valido' => $_SESSION['valido']));
			}
			else {
				$consulta_cop = $conexion_bd -> exec (" INSERT INTO propiedad
														values (default, '$numero', $m2, $alicuota, $conjunto)"); //Definimos la consulta a la base de datos.
				$consulta = $conexion_bd->prepare("SELECT pro_id, pro_numero, pro_m2, pro_alicuota, pro_con_id, con_nombre FROM propiedad, conjunto WHERE pro_con_id=con_id"); //Definimos la consulta a la base de datos.
				$consulta->execute();
				$propiedad = $consulta->fetchALL(PDO::FETCH_ASSOC); //Ejecutamos la consulta
				render('Rpropiedad/index.html.twig', array('propiedad' => $propiedad, 'valido' => $_SESSION['valido']));	
			}

		}
	}
	else {
		$con = $conexion_bd->prepare("SELECT * FROM conjunto");
		$con -> execute();
		$consult_propiedad = $con -> fetchAll(PDO::FETCH_ASSOC); //Saca el todas las propiedades asociadas a un conjunto
		render('Rpropiedad/new.html.twig', array('conjunto' => $consult_propiedad, 'valido' => $_SESSION['valido'], 'conjuntoAdm' => $_SESSION['datos']));
	}
	$conexion_bd = NULL; // se cierra la conexión a la BD.
} else {
	if (count($_SESSION) != 0 && $_SESSION['tipo'] == true ) {
		render('default/index.html.twig', array('valido' => $_SESSION['valido']));
	}else
		render('login/index.html.twig', array());

}

?>
