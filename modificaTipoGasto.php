<?php
require_once 'lib/twigLoad.php';
include_once 'lib/validacion_mantenedores.php';
session_start(); //Iniciamos una posible sesión
if (count($_SESSION) != 0  && $_SESSION['tipo'] == false  ) {
	include_once 'lib/conexion_bd.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	    if(isset($_POST['id'], $_POST['descripcion'])) {
			$tga_nombre = $_POST['descripcion'];
			$tga_id = $_POST['id'];
			if(Vnombre($tga_nombre) && Vid_tipo($tga_id)){	
				$insert_bd = $conexion_bd -> exec("UPDATE tipo_gasto SET tga_nombre = '$tga_nombre' WHERE tga_id = '$tga_id'");
				//$operacion = print_r($insert_bd, true);
				$consulta = $conexion_bd->prepare("SELECT * FROM tipo_gasto"); //Definimos la consulta a la base de datos.
				$consulta->execute();
				$tGasto = $consulta->fetchALL(PDO::FETCH_ASSOC); //Ejecutamos la consulta
				$conexion_bd = NULL; // se cierra la conexión a la BD
				render('basicos/index.html.twig', array('tGasto' => $tGasto, 'valido' => $_SESSION['valido']));
			}else{
			$consulta_bd = $conexion_bd->prepare("SELECT * FROM tipo_gasto");
			$consulta_bd -> execute();
			/* Se obtiene el primer registro del conjunto de resultados
			 * como un arreglo asociativo */
			$tGasto = $consulta_bd->fetchAll(PDO::FETCH_ASSOC);
			// Se cierra la conexión con la BD.
			$conexion_bd = NULL;
			render('basicos/error2.html.twig', array('tGasto' => $tGasto, 'valido' => $_SESSION['valido'],'error'=>"Valores ingresados no válidos"));
			}
		}
	}elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
	    if(isset($_GET['button2'])) {
			$tga_id = $_GET['button2'];	
			$consulta = $conexion_bd->prepare("SELECT * FROM tipo_gasto WHERE tga_id = '$tga_id'"); //Definimos la consulta a la base de datos.
			$consulta->execute();
			$tGasto = $consulta->fetch(PDO::FETCH_ASSOC); //Ejecutamos la consulta

			$conexion_bd = NULL; // se cierra la conexión a la BD
			//render('basicos/update.html.twig', array('tGasto' => $tGasto ));
			render('basicos/update.html.twig', array('tGasto' => $tGasto, 'valido' => $_SESSION['valido']));
		}else{
			$consulta = $conexion_bd->prepare("SELECT * FROM tipo_gasto"); //Definimos la consulta a la base de datos.
			$consulta->execute();
			$tGasto = $consulta->fetchALL(PDO::FETCH_ASSOC); //Ejecutamos la consulta
			$conexion_bd = NULL; // se cierra la conexión a la BD
			render('basicos/index.html.twig', array('tGasto' => $tGasto, 'valido' => $_SESSION['valido']));
		}
	}
} else {
	if (count($_SESSION) != 0 && $_SESSION['tipo'] == true ) {
		render('default/index.html.twig', array('valido' => $_SESSION['valido']));
	}else
		render('login/index.html.twig', array());
}
?>