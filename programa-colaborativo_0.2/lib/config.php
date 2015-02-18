<?php
//Protegido por seguridad

//Datos de configuración
$root ="root";
$passwd_admin ="root";


//Configuración Twig - Motor de plantillas
//Cargador de Twig
//Realpath nos da la ruta absoluta de ese directorio.
require_once realpath(dirname(__FILE__)."/../vendor/twig/twig/lib/Twig/Autoloader.php");

//Clase::método estático (Con 4 puntos), frente a objeto flecha método
Twig_Autoloader::register();

//Una instancia del cargador (le pasamos donde están las vistas
$loader = new Twig_Loader_Filesystem(realpath(dirname(__FILE__)."/../vistas"));

$twig = new Twig_Environment($loader);

?>