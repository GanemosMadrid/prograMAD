<?php
include_once "lib/functions.php";

$template = $twig->loadTemplate('propuesta.html');
if(isset ($_GET['id'])){
	
	$id =$_GET['id'];
	$buscaID=array('id'=>$id);
	$propuesta = "SELECT  p.id, p.autor_id,p.titulo, p.propuesta, p.sum_likes, p.barrio, p.sector,
	(p.positivos /(p.positivos+p.negativos)) porcentaje, p.comentarios,
	u.nombre, u.apellidos, u.id as user_id, u.id_rol
		FROM prog_propuestas p INNER JOIN users u ON p.autor_id=u.id
		WHERE p.id=:id";
	
	$enmiendas = 'SELECT u.nombre, u.apellidos, e.id, e.enmienda, e.sum_likes, e.autor_id, u.id_rol
		FROM prog_enmiendas e INNER JOIN users u ON e.autor_id=u.id
		WHERE e.propuesta_id =:id
		ORDER BY e.sum_likes DESC, e.propuesta_id ASC';

	$id_enmiendas = listarpreparada($buscaID,'SELECT e.id
		FROM prog_enmiendas AS e
		WHERE e.propuesta_id =:id');
	
	

	$comentarios = 'SELECT c.enmienda_id, u.nombre, u.apellidos, c.id, c.comentario, c.sum_likes, c.autor_id, u.id_rol
					FROM prog_enmiendas AS e, users AS u, prog_comentarios AS c
					WHERE c.enmienda_id = e.id
					AND c.autor_id = u.id';
	
	$id_propuesta =$_GET['id'];
	$ID_prop=array('id'=>$id_propuesta);
	$consulta_autor = "SELECT p.autor_id FROM prog_propuestas as p, users 
		WHERE p.id=:id and p.autor_id=users.id;";
	$autor_id = autor_propuesta($ID_prop,$consulta_autor);
	$usuario_id = userid();
	
	//Compruebo que el autor de la propuesta sea el usuario logueado (para enlace editar)
		if ($autor_id==$usuario_id){
			$autor=array('autor_id'=>$autor_id);
			$usuario=array('usuario_id'=>$usuario_id);
		}else{
			$usuario=array('usuario_id'=>$usuario_id);
			$autor=array();
		}
	$id_tag = listarpreparada($buscaID,'SELECT p.sector
		FROM prog_propuestas AS p
		WHERE p.id =:id');
	
	$tag="";
	$consulta="";
	$debatidas="";
	$recientes=""; 
	$consenduadas =""; 
	if(empty($id_tag[0]['sector'])){
		$id_tag = listarpreparada($buscaID,'SELECT p.barrio
		FROM prog_propuestas AS p
		WHERE p.id =:id');
	//	var_dump($id_tag);
		$tag=$id_tag[0]['barrio'];
	//	var_dump($tag);

		$consulta = 
		'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, u.id_rol
		FROM users AS u, prog_propuestas AS p
		WHERE  `autor_id` = u.id and p.barrio ="'.$tag.'"
		ORDER BY p.sum_likes DESC; ';

		$debatidas = 
		'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, u.id_rol
		FROM users AS u, prog_propuestas AS p
		WHERE  `autor_id` = u.id and p.barrio ="'.$tag.'"
		ORDER BY p.comentarios DESC; ';

		$recientes = 
		'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, u.id_rol
		FROM users AS u, prog_propuestas AS p
		WHERE  `autor_id` = u.id and p.barrio ="'.$tag.'"
		ORDER BY p.id DESC; ';

		$consensuadas = 
		'SELECT u.nombre, u.apellidos, u.id_rol, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, (LOG(p.positivos+p.negativos)* ((p.positivos-p.negativos) /(p.positivos+p.negativos))) log, (p.positivos /(p.positivos+p.negativos)) porcentaje
		FROM users AS u, prog_propuestas AS p
		WHERE  `autor_id` = u.id and p.barrio ="'.$tag.'"
		ORDER BY log DESC; ';

	}else{
//		var_dump($id_tag);
		$tag=$id_tag[0]['sector'];
		$consulta = 
		'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, u.id_rol
		FROM users AS u, prog_propuestas AS p
		WHERE  `autor_id` = u.id and p.sector ="'.$tag.'"
		ORDER BY p.sum_likes DESC; ';

		$debatidas = 
		'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, u.id_rol
		FROM users AS u, prog_propuestas AS p
		WHERE  `autor_id` = u.id and p.sector ="'.$tag.'"
		ORDER BY p.comentarios DESC; ';

		$recientes = 
		'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, u.id_rol
		FROM users AS u, prog_propuestas AS p
		WHERE  `autor_id` = u.id and p.sector ="'.$tag.'"
		ORDER BY p.id DESC; ';

		$consensuadas = 
		'SELECT u.nombre, u.apellidos, u.id_rol, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, (LOG(p.positivos+p.negativos)* ((p.positivos-p.negativos) /(p.positivos+p.negativos))) log, (p.positivos /(p.positivos+p.negativos)) porcentaje
		FROM users AS u, prog_propuestas AS p
		WHERE  `autor_id` = u.id and p.sector ="'.$tag.'"
		ORDER BY log DESC; ';
	}
	

	
		

}


$datos = array('autor'=>$autor,'id'=>$buscaID,'user'=>autentificado(),'propuesta' => preparada($buscaID,$propuesta), 'enmiendas'=>listarpreparada($buscaID,$enmiendas), 'comentarios'=>listarpreparada($id_enmiendas, $comentarios),'propuestas'=>listar($consulta), 'debatidas'=>listar($debatidas), 'recientes'=>listar($recientes), 'consensuadas'=>listar($consensuadas));

echo $template->render($datos);
?>