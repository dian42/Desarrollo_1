<?php
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';
include_once 'lib/validacion_propiedad.php';
session_start(); //Iniciamos una posible sesión



if (count($_SESSION) != 0 && $_SESSION['tipo'] == false ) {
	include_once 'lib/conexion_bd.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	    if(isset($_POST['id'], $_POST['conjunto'], $_POST['numero'], $_POST['m2'],  $_POST['alicuota'])) {
		    $pro_id = $_POST['id'];
		    $pro_numero = $_POST['numero'];
			$pro_m2 = $_POST['m2'];
		    $pro_alicuota = $_POST['alicuota'];
	    	$pro_con_id = $_POST['conjunto'];
	    	if(Vpropiedad($pro_numero) && Vm2($pro_m2) && Valicuota($pro_alicuota) && Vconjunto($pro_con_id, $conexion_bd)) {
		    	$repeat=$conexion_bd -> prepare(" SELECT pro_id FROM propiedad WHERE pro_numero ='$pro_numero' and pro_con_id = $pro_con_id");
			    $repeat->execute();
				$insert = $repeat -> fetchAll(PDO::FETCH_ASSOC);
				$largo = count($insert);
				if ($largo){
					$consulta = $conexion_bd->prepare("SELECT pro_id, pro_numero, pro_m2, pro_alicuota, pro_con_id, con_nombre FROM propiedad, conjunto WHERE pro_con_id=con_id"); //Definimos la consulta a la base de datos.
					$consulta->execute();
					$propiedad = $consulta->fetchALL(PDO::FETCH_ASSOC); //Ejecutamos la consulta
					$conexion_bd = NULL; // se cierra la conexión a la BD
					render('Rpropiedad/errorModificaPropiedad.html.twig',array('propiedad' => $propiedad, 'valido' => $_SESSION['valido'], 'error'=>"Número de propiedad duplicada."));
				}else{
					$consulta = $conexion_bd-> exec("UPDATE propiedad SET pro_numero = '$pro_numero', pro_m2 = $pro_m2, pro_alicuota = $pro_alicuota, pro_con_id = $pro_con_id WHERE pro_id = $pro_id "); //Definimos la consulta a la base de datos.
					$consulta = $conexion_bd->prepare("SELECT pro_id, pro_numero, pro_m2, pro_alicuota, pro_con_id, con_nombre FROM propiedad, conjunto WHERE pro_con_id=con_id"); //Definimos la consulta a la base de datos.
					$consulta->execute();
					$propiedad = $consulta->fetchALL(PDO::FETCH_ASSOC); 
					$conexion_bd = NULL;
					render('Rpropiedad/index.html.twig',array('propiedad' => $propiedad, 'valido' => $_SESSION['valido']));
				}
			}else{
				$consulta = $conexion_bd->prepare("SELECT pro_id, pro_numero, pro_m2, pro_alicuota, pro_con_id, con_nombre FROM propiedad, conjunto WHERE pro_con_id=con_id"); //Definimos la consulta a la base de datos.
				$consulta->execute();
				$propiedad = $consulta->fetch(PDO::FETCH_ASSOC); //Ejecutamos la consulta
				$conexion_bd = NULL; // se cierra la conexión a la BD
				render('Rpropiedad/errorModificaPropiedad.html.twig',array('propiedad' => $propiedad, 'valido' => $_SESSION['valido'], 'error'=>"Datos no válidos"));	
			}
		}
	}else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	    if(isset($_GET['button1'])) {
			$propiedad_id = $_GET['button1'];	
			$consulta = $conexion_bd->prepare("SELECT * FROM propiedad WHERE pro_id = '$propiedad_id'"); //Definimos la consulta a la base de datos.
			$consulta->execute();
			$propiedad = $consulta->fetch(PDO::FETCH_ASSOC); //Ejecutamos la consulta
			$conexion_bd = NULL; // se cierra la conexión a la BD
			render('Rpropiedad/update.html.twig', array('propiedad' => $propiedad ,'conjunto' => $_SESSION['datos'], 'valido' => $_SESSION['valido'] ));
		}else{
			$consulta = $conexion_bd->prepare("SELECT pro_id, pro_numero, pro_m2, pro_alicuota, pro_con_id, con_nombre FROM propiedad, conjunto WHERE pro_con_id=con_id"); //Definimos la consulta a la base de datos.
			$consulta->execute();
			$propiedad = $consulta->fetchALL(PDO::FETCH_ASSOC); //Ejecutamos la consulta
			$conexion_bd = NULL; // se cierra la conexión a la BD
			render('Rpropiedad/index.html.twig',array('propiedad' => $propiedad, 'valido' => $_SESSION['valido']));
		}
	}
}else {
	if (count($_SESSION) != 0 && $_SESSION['tipo'] == true ) {
		render('default/index.html.twig', array('valido' => $_SESSION['valido']));
	}else
		render('login/index.html.twig', array());
}
?>