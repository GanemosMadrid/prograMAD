<?php
include_once "lib/functions.php";

	$template = $twig->loadTemplate('editar-propuesta.html');

	if (isset($_GET["id"])){

		$id =(integer)$_GET['id'];
		$buscaID=array('id'=>$id);
		$propuesta = "SELECT * FROM prog_propuestas, users 
		WHERE prog_propuestas.id=:id and prog_propuestas.autor_id=users.id ";
		
		$datos = array('user'=>autentificado(),'propuesta' => preparada($buscaID,$propuesta));
		echo $template->render($datos);
	}
}
?>