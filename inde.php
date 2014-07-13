<?php
require_once 'lib/twigLoad.php';

session_start(); //Iniciamos una posible sesión
	render('default/index.html.twig', array());	
?>