<?php
include_once 'lib/render.php';
include_once 'lib/conexion_bd.php';
render('header.html');

// Si se accede por GET (vía URL) se muestra el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    render('nuevaPelicula.html');
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /* Si se accede luego de enviar el formulario
* se guarda lo enviado en variables. */
    $nombre = $_POST['nombre'];
    $fechaEstreno = $_POST['fecha'];
    $tienda = $_POST['tienda'];
    $director = $_POST['director'];
    $genero = $_POST['genero'];
    $duracion = $_POST['duracion'];
    echo "INSERT INTO pelicula VALUES (DEFAULT, '$nombre', '$fechaEstreno', $tienda, '$genero', $duracion, $director)";
    try {
        $conexion_bd->exec("INSERT INTO pelicula VALUES (DEFAULT, '$nombre', '$fechaEstreno', $tienda, '$genero', $duracion, $director)");
    } 
    catch (PDOException $error) {
        
        echo $error->getMessage();
    }
}

$conexion_bd = NULL;
render('footer.html');
?>