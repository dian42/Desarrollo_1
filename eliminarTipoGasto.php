<?php
require_once 'lib/twigLoad.php';

session_start(); //Iniciamos una posible sesión
if (count($_SESSION) != 0  && $_SESSION['tipo'] == false  ) {
	include_once 'lib/conexion_bd.php';
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	    if(isset($_GET['button1'])) {
			$tga_id = $_GET['button1'];
			$insert_bd = $conexion_bd -> exec("DELETE FROM tipo_gasto WHERE tga_id = '$tga_id'");
			//$conexion_bd = NULL;
			$operacion = print_r($insert_bd, true);
			if($operacion){
				$consulta = $conexion_bd->prepare("SELECT * FROM tipo_gasto"); //Definimos la consulta a la base de datos.
				$consulta->execute();
				$tGasto = $consulta->fetchALL(PDO::FETCH_ASSOC); //Ejecutamos la consulta
				$conexion_bd = NULL; // se cierra la conexión a la BD
				render('basicos/index.html.twig', array('tGasto' => $tGasto, 'valido' => $_SESSION['valido']));
			}
			else {
				$consulta_bd = $conexion_bd->prepare("SELECT * FROM tipo_gasto");
				$consulta_bd -> execute();

				/* Se obtiene el primer registro del conjunto de resultados
				 * como un arreglo asociativo */
				$tGasto = $consulta_bd->fetchAll(PDO::FETCH_ASSOC);

				// Se cierra la conexión con la BD.
				$conexion_bd = NULL;

				render('basicos/error1.html.twig', array('tGasto' => $tGasto, 'valido' => $_SESSION['valido']));
			}
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