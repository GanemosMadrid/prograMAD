<?php
include_once "lib/functions.php";
include_once "lib/Pagination.class.php";


$template = $twig->loadTemplate('propuestas.html');

	//Se establece la página (basado en <_GET>)
    $page = isset($_GET['page']) ? ((int) $_GET['page']) : 1;
	
	$resultadosPorPagina = 20;
	$empezarPor = ($page - 1) * $resultadosPorPagina;

$total = 'SELECT count(id) AS total FROM prog_propuestas';

$consulta = 
'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, p.sector, p.barrio, u.id_rol
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id
ORDER BY p.sum_likes DESC LIMIT '. $empezarPor .', '. $resultadosPorPagina .'; ';

$debatidas = 
'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, p.sector, p.barrio, u.id_rol
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id
ORDER BY p.comentarios DESC LIMIT '. $empezarPor .', '. $resultadosPorPagina .'; ';

$recientes = 
'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, p.sector, p.barrio, u.id_rol
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id
ORDER BY p.id DESC LIMIT '. $empezarPor .', '. $resultadosPorPagina .'; ';

/*$consensuadas = 
'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.sector, p.barrio, p.positivos, p.negativos, u.id_rol, (LOG(p.positivos+p.negativos)* ((p.positivos-p.negativos) /(p.positivos+p.negativos))) log, (p.positivos /(p.positivos+p.negativos)) porcentaje
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id
ORDER BY log DESC LIMIT '. $empezarPor .', '. $resultadosPorPagina .'; ';*/

$consensuadas = 'SELECT u.nombre, u.apellidos, u.id_rol, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, p.sector, p.barrio
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id AND p.sum_likes BETWEEN 8 AND 20
ORDER BY p.id DESC LIMIT '. $empezarPor .', '. $resultadosPorPagina .'; ';
	
	//Paginación
	$numeroPropuestas = listar($total);

    $pagination = (new Pagination());
    $pagination->setCurrent($page);
	$pagination->setRPP($resultadosPorPagina);
    $pagination->setTotal($numeroPropuestas['0']['total']);

    $paginado = $pagination->parse();
	
	
	//echo print_r($numeroPropuestas) . "Todas: ".$numeroPropuestas['0']['total'];

$datos = array('user'=>autentificado(),'propuestas'=>listar($consulta), 'debatidas'=>listar($debatidas), 'recientes'=>listar($recientes), 'consensuadas'=>listar($consensuadas), 'paginado'=>$paginado, 'totalPropuestas' =>$numeroPropuestas['0']['total']);
echo $template->render($datos);