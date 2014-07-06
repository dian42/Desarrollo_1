<? Php

    $ Nombre_bd = 'GCadmin';
    $ Host = 'localhost';
    $ Usuario = 'salome';
    $ Password = 'salome';
  
    try {
        $conexion_bd = new PDO ( " pgsql:dbname={$nombre_bd};host={$host} ", $usuario, $password );
        $usuario, $password, array( PDO::ATTR_PERSISTENT => true ));
    } 
    catch (PDOException $error) {
        
        echo $error->getMessage();
    }

  ?>