<?php
require_once 'lib/twigLoad.php';

session_start(); //Iniciamos una posible sesión



if (count($_SESSION) != 0 && $_SESSION['tipo'] == false ) {
		render('default/inicio.html.twig', array('valido' => $_SESSION['valido'] ));
}else {
	if (count($_SESSION) != 0 && $_SESSION['tipo'] == true ) {
		render('default/inicio.html.twig', array('valido' => $_SESSION['valido'] ));
	}else
		render('default/index.html.twig', array());
}
?>