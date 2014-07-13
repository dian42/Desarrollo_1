<?php
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['id'], $_POST['conjunto'], $_POST['numero'], $_POST['m2'],  $_POST['alicuota'])) {
	    $pro_id = $_POST['id'];
	    $pro_numero = $_POST['numero'];
		$pro_m2 = $_POST['m2'];
	    $pro_alicuota = $_POST['alicuota'];
    	$pro_con_id = $_POST['conjunto'];
    	$repeat=$conexion_bd -> prepare(" SELECT pro_id 
	    								  FROM propiedad
	    								  WHERE pro_numero='$pro_numero' and
	    								  		pro_con_id = $pro_con_id");
	    $repeat->execute();
		$insert = $repeat -> fetchAll(PDO::FETCH_ASSOC);
		$largo = count($insert);
		if ($largo){
			$consulta = $conexion_bd->prepare("SELECT pro_id, pro_numero, pro_m2, pro_alicuota, pro_con_id, con_nombre FROM propiedad, conjunto WHERE pro_con_id=con_id"); //Definimos la consulta a la base de datos.
			$consulta->execute();
			$propiedad = $consulta->fetchALL(PDO::FETCH_ASSOC); //Ejecutamos la consulta
			$conexion_bd = NULL; // se cierra la conexión a la BD
			render('Rpropiedad/errorModificaPropiedad.html.twig',array('propiedad' => $propiedad));
		}
		else {
			$insert_bd = $conexion_bd -> exec(" UPDATE propiedad
											SET pro_numero = '$pro_numero', pro_m2 = '$pro_m2', pro_alicuota = '$pro_alicuota', pro_con_id = '$pro_con_id'
										    WHERE pro_id = '$pro_id'");
			//$operacion = print_r($insert_bd, true);
			$consulta = $conexion_bd->prepare("SELECT pro_id, pro_numero, pro_m2, pro_alicuota, pro_con_id, con_nombre FROM propiedad, conjunto WHERE pro_con_id=con_id"); //Definimos la consulta a la base de datos.
			$consulta->execute();
			$propiedad = $consulta->fetchALL(PDO::FETCH_ASSOC); //Ejecutamos la consulta
			$conexion_bd = NULL; // se cierra la conexión a la BD
			render('Rpropiedad/index.html.twig',array('propiedad' => $propiedad));
		}
	}
}elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['button1'])) {
		$propiedad_id = $_GET['button1'];	
		$consulta = $conexion_bd->prepare("SELECT * FROM propiedad WHERE pro_id = '$propiedad_id'"); //Definimos la consulta a la base de datos.
		$consulta->execute();
		$propiedad = $consulta->fetch(PDO::FETCH_ASSOC); //Ejecutamos la consulta

		$con = $conexion_bd->prepare("SELECT * FROM conjunto");
		$con -> execute();
		$consult_propiedad = $con -> fetchAll(PDO::FETCH_ASSOC); //Saca el todas las propiedades asociadas a un conjunto

		$conexion_bd = NULL; // se cierra la conexión a la BD
		render('Rpropiedad/update.html.twig', array('propiedad' => $propiedad ,'conjunto' => $consult_propiedad ));
	}else{
		$consulta = $conexion_bd->prepare("SELECT pro_id, pro_numero, pro_m2, pro_alicuota, pro_con_id, con_nombre FROM propiedad, conjunto WHERE pro_con_id=con_id"); //Definimos la consulta a la base de datos.
		$consulta->execute();
		$propiedad = $consulta->fetchALL(PDO::FETCH_ASSOC); //Ejecutamos la consulta
		$conexion_bd = NULL; // se cierra la conexión a la BD
		render('Rpropiedad/index.html.twig',array('propiedad' => $propiedad));
	}
}

?>