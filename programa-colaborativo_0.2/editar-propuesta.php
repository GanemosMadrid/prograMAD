<?php
include_once "lib/functions.php";

	$template = $twig->loadTemplate('editar-propuesta.html');

	if (isset($_GET["id"])){

		$id =(integer)$_GET['id'];
		$buscaID=array('id'=>$id);
		$consulta_autor = "SELECT p.autor_id FROM prog_propuestas as p, users 
		WHERE p.id=:id and p.autor_id=users.id;";
		$consulta_propuestas = "SELECT p.id, p.autor_id, p.titulo,p.propuesta, p.sector, p.barrio 
		FROM prog_propuestas as p, users 
		WHERE p.id=:id and p.autor_id=users.id;";

		$autor = (integer)autor_propuesta($buscaID,$consulta_autor);
		$usuario = (integer)userid();

		//Compruebo que el autor de la propuesta sea el usuario logueado y sólo él pueda editar.
		if ($autor==$usuario || $_SESSION['id_rol'] == 2){

			$datos = array('autor'=>$autor,'user'=>autentificado(),'propuesta' => preparada($buscaID,$consulta_propuestas));
			echo $template->render($datos);
		}else{
			header('Location:propuesta.php?id='.$id);
		}
		
	
	}else{

		header('Location:index.php');
	}
