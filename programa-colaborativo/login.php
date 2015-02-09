<?php
include_once "lib/functions.php";

$template = $twig->loadTemplate('login.html');

//Compruebo si hay sesión de error (creada al fallar la contraseña)
if (isset($_SESSION["error"])){
    
    $datos = array("error"=>$_SESSION["error"]);
    unset($_SESSION['error']);

}else{
	$datos = array();
	
}

echo $template->render($datos);

