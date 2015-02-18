<?php
include_once "lib/functions.php";

$template = $twig->loadTemplate('nueva-propuesta.html');
if (!isset($_SESSION["usuario"])){
	header( 'Location: login.php' );
}else{
$datos = array('user'=>autentificado());
echo $template->render($datos);
}