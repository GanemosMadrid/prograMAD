<?php
include_once "lib/functions.php";

$template = $twig->loadTemplate('propuesta.html');
if(isset ($_GET['id'])){
	
	$id =$_GET['id'];
	$buscaID=array('id'=>$id);
	$propuesta = "SELECT  p.id, p.autor_id,p.titulo, p.propuesta, p.sum_likes,p.barrio, p.sector,
	(p.positivos /(p.positivos+p.negativos)) porcentaje, p.comentarios,
	u.nombre, u.apellidos, u.id as user_id
		FROM prog_propuestas as p, users as u
		WHERE p.id=:id and p.autor_id=u.id ";
	
	$enmiendas = 'SELECT u.nombre, u.apellidos, e.id, e.enmienda, e.sum_likes, e.autor_id
		FROM prog_enmiendas AS e, users AS u
		WHERE e.propuesta_id =:id
		AND e.autor_id = u.id 
		ORDER BY e.sum_likes DESC, e.propuesta_id ASC';

	$id_enmiendas = listarpreparada($buscaID,'SELECT e.id
		FROM prog_enmiendas AS e
		WHERE e.propuesta_id =:id');


	$comentarios = 'SELECT c.enmienda_id, u.nombre, u.apellidos, c.id, c.comentario, c.sum_likes, c.autor_id
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
			
		}	
}
$datos = array('autor'=>$autor,'id'=>$buscaID,'user'=>autentificado(),'propuesta' => preparada($buscaID,$propuesta), 'enmiendas'=>listarpreparada($buscaID,$enmiendas), 'comentarios'=>listarpreparada($id_enmienda, $comentarios));

echo $template->render($datos);
?>