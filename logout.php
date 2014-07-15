<?php
require_once 'lib/twigLoad.php';

session_start(); //Iniciamos una posible sesión
if (count($_SESSION) != 0) {
    session_destroy();
	render('default/index.html.twig', array());
} else {
	render('default/index.html.twig', array());
}

?>