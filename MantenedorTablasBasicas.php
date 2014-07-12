<?php
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';



// Se prepara la consulta y luego se ejecuta.
$consulta_bd = $conexion_bd->prepare("SELECT * FROM tipo_gasto");
$consulta_bd -> execute();

/* Se obtiene el primer registro del conjunto de resultados
 * como un arreglo asociativo */
$tGasto = $consulta_bd->fetchAll(PDO::FETCH_ASSOC);

// Se cierra la conexión con la BD.
$conexion_bd = NULL;

render('basicos/index.html.twig',array('tGasto' => $tGasto));
?>
