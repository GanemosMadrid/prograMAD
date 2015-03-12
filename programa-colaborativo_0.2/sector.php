<?php
include_once "lib/functions.php";

if(isset ($_GET['sector'])){

$tag= $_GET['sector'];
$etiqueta = str_replace ( '-' ,'-', $tag);

$template = $twig->loadTemplate('propuestas.html');

$consulta = 
'SELECT u.nombre, u.apellidos, p.id, p.titulo,p.sector,  p.comentarios, p.sum_likes, p.positivos, p.negativos, u.id_rol
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id and p.sector ="'.$tag.'"
ORDER BY p.sum_likes DESC; ';

$debatidas = 
'SELECT u.nombre, u.apellidos, p.id, p.sector, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, u.id_rol
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id and p.sector ="'.$tag.'"
ORDER BY p.comentarios DESC; ';

$recientes = 
'SELECT u.nombre, u.apellidos, p.id, p.sector, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, u.id_rol
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id and p.sector ="'.$tag.'"
ORDER BY p.id DESC; ';

$consensuadas = 
'SELECT u.nombre, u.apellidos, u.id_rol, p.sector, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, (LOG(p.positivos+p.negativos)* ((p.positivos-p.negativos) /(p.positivos+p.negativos))) log, (p.positivos /(p.positivos+p.negativos)) porcentaje
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id and p.sector ="'.$tag.'"
ORDER BY log DESC; ';



$datos = array('tag'=>$etiqueta,'user'=>autentificado(),'propuestas'=>listar($consulta), 'debatidas'=>listar($debatidas), 'recientes'=>listar($recientes), 'consensuadas'=>listar($consensuadas));
echo $template->render($datos);
}