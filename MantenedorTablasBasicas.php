<?php
include_once 'lib/render.php';
include_once 'lib/Conexion_BD.php';
render('header.html');

// Si se accede por GET (vía URL) se muestra el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    render('MantenedorTablasBasicas.html');
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /* Si se accede luego de enviar el formulario
* se guarda lo enviado en variables. */
    
    /*if($_POST['Opciones'] == 'leer'){
        echo "SELECT tga_nombre FROM tipo_gasto"; //Leer
    }*/

    if($_POST['Opciones'] == 'Crear'){
        render('CrearTipo.html');//Crear
        /*$descripcion = $_POST['descripcion'];*/
        echo "INSERT INTO tga_nombre VALUES ('$clavepri', '$descripcion')";
        try {
            $conexion_bd->exec("INSERT INTO tga_nombre VALUES ('$clavepri', '$descripcion')");
        }
        catch (PDOException $error) {        
            echo $error->getMessage();
        }
    } 

    if($_POST['Opciones'] == 'modificar'){
        $nueva_descripcion = $_POST['nueva_descripcion'];//modificar
        $cambio_descripcion =  $_POST['cambio_descripcion'];
        echo "UPDATE tipo_gasto SET tga_nombre = $nueva_descripcion [ WHERE <tga_nombre = $cambio_descripcion>]";
        try {
            $conexion_bd->exec("UPDATE tipo_gasto SET tga_nombre = descripcion [ WHERE <tga_nombre = $cambio_descripcion>]");
         }
        catch (PDOException $error) {        
            echo $error->getMessage();
        }
    }

    if($_POST['Opciones'] == 'eliminar'){
        $elimina_descripcion = $_POST['elimina_descripcion'];//eliminar
        echo "DELETE FROM <tipo_gasto> [ WHERE <tga_nombre = $elimina_descripcion>];";
        try {
            $conexion_bd->exec("DELETE FROM <tipo_gasto> [ WHERE <tga_nombre = $elimina_descripcion>];");
        }
        catch (PDOException $error) {        
            echo $error->getMessage();
        }
    }
}
$conexion_bd = NULL;
render('footer.html');
?>