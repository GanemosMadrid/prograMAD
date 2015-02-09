<?php
include_once "lib/functions.php";

$template = $twig->loadTemplate('index.html');
$datos = array('user'=>autentificado());
echo $template->render($datos);
