<?php
include_once "lib/functions.php";

if(isset ($_GET['apuesta'])){

$tag= $_GET['apuesta'];
$etiqueta = str_replace ( '-' ,'-', $tag);

$template = $twig->loadTemplate('apuesta.html');

/*
$consulta = 
'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id and p.sector ="'.$tag.'"
ORDER BY p.sum_likes DESC; ';

$debatidas = 
'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id and p.sector ="'.$tag.'"
ORDER BY p.comentarios DESC; ';

$recientes = 
'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id and p.sector ="'.$tag.'"
ORDER BY p.id DESC; ';

$consensuadas = 
'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, (LOG(p.positivos+p.negativos)* ((p.positivos-p.negativos) /(p.positivos+p.negativos))) log, (p.positivos /(p.positivos+p.negativos)) porcentaje
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id and p.sector ="'.$tag.'"
ORDER BY log DESC; ';
*/

//'propuestas'=>listar($consulta), 'debatidas'=>listar($debatidas), 'recientes'=>listar($recientes), 'consensuadas'=>listar($consensuadas)
$datos = array('tag'=>$etiqueta,'user'=>autentificado());
echo $template->render($datos);
}