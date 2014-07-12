<?php
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';

session_start(); //Iniciamos una posible sesión
if (isset($_SESSION['usuario']))
	render('login.html.twig', array('usuario' => $_SESSION['usuario']));
else {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Consulta si el metodo por el cual se envió el formulario es post
		if(isset($_POST['user'], $_POST['pass'])) {
		    $user = $_POST['user']; //generamos la variable donde se pasan los datos del formulario, en este caso usuario
		    $pass = $_POST['pass']; //generamos la variable donde se pasan los datos del formulario, en este caso contraseña
			$consulta_cop = $conexion_bd->prepare(" SELECT cop_run , cop_clave, cop_nombres
													FROM copropietario 
													WHERE cop_run = $user AND
														  cop_clave = '$pass'"); //Definimos la consulta a la base de datos.
			$consulta_cop->execute(); //Ejecuta la consulta
			$consult_cp = $consulta_cop->fetch(PDO::FETCH_ASSOC); //Ejecutamos la consulta
			$consulta_adm = $conexion_bd->prepare(" SELECT adm_run, adm_password, adm_name 
													FROM administrador 
													WHERE adm_run = $user AND
														  adm_password = '$pass'"); //Definimos la consulta a la base de datos.
			$consulta_adm->execute(); //Ejecutamos la consulta
			$consult_ad = $consulta_adm->fetch(PDO::FETCH_ASSOC); //Saca el primer registro
	//comprobamos que los datos obtenidos de la consulta, correspondan con los ingresados por usuario.
			if($user == $consult_cp['cop_run'] && $pass == $consult_cp['cop_clave']){
				$_SESSION['usuario'] = $consult_cp['cop_nombres']; //Guarda el nombre del usuario en la sesión
				$_SESSION['tipo'] = 0; //Guarda el tipo de usuario, en este caso 0 para copropietario.
				$datos = $conexion_bd->prepare(" SELECT con_nombre, pro_numero
												 FROM cop_pro, propiedad, conjunto
												 WHERE cpr_cop_id = $user AND
													   cpr_pro_id = pro_id AND
													   pro_con_id = con_id AND
													   cpr_eco_id = 'A' "); // Consulta que guarda en la sesion las propiedades correspondiente a cada usuario
				$datos->execute();//Ejecutamos la consulta
				$datos_cop = $datos -> fetchAll(PDO::FETCH_ASSOC); //Saca todos los datos obtenidos
				$_SESSION['datos'] = $datos_cop; //guardamos en la sesión los datos de conjunto y las propiedades asociadas
				render('login.html.twig', array()); //redireccionamos a la direccion asignada y se le envia el usuario
			}
			else {
				if ($user == $consult_ad['adm_run'] && $pass == $consult_ad['adm_password']){
					$_SESSION['usuario'] = $consult_cp['adm_name']; //Guarda el nombre del usuario en la sesión
					$_SESSION['tipo'] = 1; //Guarda el tipo de usuario, en este caso 0 para copropietario.
					$datos = $conexion_bd -> prepare(" SELECT con_nombre FROM conjunto WHERE con_adm_run = $user");
					$datos -> execute(); //Ejecutamos la consulta
					$datos_adm = $datos -> fetchAll(PDO::FETCH_ASSOC); //Saca todos los datos obtenidos
					$_SESSION['datos'] = $datos_adm; //guardamos en la sesión los datos de conjunto y las propiedades asociadas
					render('login.html.twig', array());//redireccionamos a la direccion asignada,con 
				}
				else {
					echo "Usuario o contraseña incorrectos"; 
					include_once 'vistas/login.html';
				}
			}
		}
		$conexion_bd = NULL; // se cierra la conexión a la BD.
	}
	else
		include_once 'vistas/login.html';
}
?>