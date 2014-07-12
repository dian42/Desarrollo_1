<?php
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';



// Se prepara la consulta y luego se ejecuta.
$consulta_bd = $conexion_bd->prepare('SELECT * FROM tipo_gasto');
$consulta_bd -> execute();

/* Se obtiene el primer registro del conjunto de resultados
 * como un arreglo asociativo */
$result = $consulta_bd->fetchAll(PDO::FETCH_ASSOC);

// Se cierra la conexión con la BD.
$conexion_bd = NULL;
print_r($result);
render('prueba.html.twig', array('tipos' => $result));
?>
