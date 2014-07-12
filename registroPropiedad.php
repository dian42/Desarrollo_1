<?php
//session_start();
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['conjunto'], $_POST['numero'], $_POST['propietario'], $_POST['m2'],  $_POST['alicuota'], $_POST['fecha_compra'])) {
	    $conjunto = $_POST['conjunto'];
	    $numero = $_POST['numero'];
	    $propietario = $_POST['propietario'];
	    $m2 = $_POST['m2'];
	    $fecha_compra = $_POST['fecha_compra'];
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
			render('Rpropiedad/registroPropiedad.html.twig', array('conjunto' => $consult_propiedad));
			print '<script language="JavaScript">';
			print 'alert("asdasd");';
			print '</script>';
		}
	}
		else {
			$consulta_cop = $conexion_bd -> exec (" INSERT INTO propiedad
													values (default, '$numero', $m2, $alicuota, $conjunto)"); //Definimos la consulta a la base de datos.
			echo "PROPIEDAD INGRESADA SATISFACTORIAMENTE";
		}

}
else {
	$con = $conexion_bd->prepare("SELECT * FROM conjunto");
	$con -> execute();
	$consult_propiedad = $con -> fetchAll(PDO::FETCH_ASSOC); //Saca el todas las propiedades asociadas a un conjunto
	render('Rpropiedad/registroPropiedad.html.twig', array('conjunto' => $consult_propiedad));
}
$conexion_bd = NULL; // se cierra la conexión a la BD.
?>