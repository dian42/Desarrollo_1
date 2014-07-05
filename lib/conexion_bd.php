<?php
$nombre_bd = 'GCadmin';
$host = 'localhost';
$usuario = 'Cheli';
$password = 'pepin123';

try {
    $conexion_bd = new PDO("pgsql:dbname={$nombre_bd};host={$host}",
        $usuario, $password, array(
            PDO::ATTR_PERSISTENT => true
        ));
} catch (PDOException $error) {
    echo $error->getMessage();
}
?>
