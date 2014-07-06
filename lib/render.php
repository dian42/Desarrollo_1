<?php
function render($archivo_plantilla) {
    $directorio_plantillas = 'vistas/';
    if (file_exists($directorio_plantillas . $archivo_plantilla)) {
        include($directorio_plantillas . $archivo_plantilla);
    } else {
        throw new Exception("Plantilla '{$archivo_plantilla}' no fue encontrada " .
           "en directorio '{$directorio_plantillas}'");
    }
}
?>