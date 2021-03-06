<?php
require_once 'lib/twigLoad.php';
require_once 'lib/validacion_mantenedores.php';

session_start(); //Iniciamos una posible sesión

if (count($_SESSION) != 0  && $_SESSION['tipo'] == false  ) {
	include_once 'lib/conexion_bd.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	    if(isset($_POST['id'],$_POST['descripcion'])) {
			$tga_id = $_POST['id'];
			$tga_nombre = $_POST['descripcion'];
			if(Vnombre($tga_nombre) && Vid_tipo($tga_id)){	
				$insert_bd = $conexion_bd -> exec("INSERT INTO tipo_gasto VALUES ('$tga_id', '$tga_nombre')");
				//$conexion_bd = NULL;
				//print_r($insert_bd);
				$operacion = print_r($insert_bd, true);
				if($operacion){
					$consulta = $conexion_bd->prepare("SELECT * FROM tipo_gasto"); //Definimos la consulta a la base de datos.
					$consulta->execute();
					$tGasto = $consulta->fetchALL(PDO::FETCH_ASSOC); //Ejecutamos la consulta
					$conexion_bd = NULL; // se cierra la conexión a la BD
						render('basicos/index.html.twig', array('tGasto' => $tGasto, 'valido' => $_SESSION['valido']));
				}
				else{
					$consulta_bd = $conexion_bd->prepare("SELECT * FROM tipo_gasto");
					$consulta_bd -> execute();

					/* Se obtiene el primer registro del conjunto de resultados
					 * como un arreglo asociativo */
					$tGasto = $consulta_bd->fetchAll(PDO::FETCH_ASSOC);

					// Se cierra la conexión con la BD.
					$conexion_bd = NULL;
					render('basicos/error1.html.twig', array('valido' => $_SESSION['valido'],'error'=>"La operación no se pudo realizar debido a que el identificador del tipo de gasto ingresado ya existe"));
				}
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
		//no cacho de aki pa abajo ya cambie el create 
	}elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
			//$consulta = $conexion_bd->prepare("SELECT * FROM tipo_gasto WHERE tga_id = '$tga_id'"); //Definimos la consulta a la base de datos.
			//$consulta->execute();
			//$tGasto = $consulta->fetch(PDO::FETCH_ASSOC); //Ejecutamos la consulta
			$conexion_bd = NULL; // se cierra la conexión a la BD
			//render('basicos/create.html.twig', array());
			render('basicos/create.html.twig', array('valido' => $_SESSION['valido']));
	}
} else {
	if (count($_SESSION) != 0 && $_SESSION['tipo'] == true ) {
		render('default/index.html.twig', array('valido' => $_SESSION['valido']));
	}else
		render('login/index.html.twig', array());
}
?>