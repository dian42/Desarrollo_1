<?php
require_once 'vendor/autoload.php';

function render($plantilla, $parametros) {
    Twig_Autoloader::register();
    $directorioVistas = 'vistas';
    $loader = new Twig_Loader_Filesystem($directorioVistas);
    $twig = new Twig_Environment($loader, array(
        'cache' => 'cache',
        'debug' => true
    ));

    $template = $twig->loadTemplate($plantilla);
    echo $template->render($parametros);
}
?>
