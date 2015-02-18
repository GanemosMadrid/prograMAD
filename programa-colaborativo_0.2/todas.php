<?php
include_once "lib/functions.php";


$template = $twig->loadTemplate('propuestas.html');

$consulta = 
'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, p.sector, p.barrio
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id
ORDER BY p.sum_likes DESC; ';

$debatidas = 
'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, p.sector, p.barrio
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id
ORDER BY p.comentarios DESC; ';

$recientes = 
'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, p.sector, p.barrio
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id
ORDER BY p.id DESC; ';

$consensuadas = 
'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.sector, p.barrio, p.positivos, p.negativos, (LOG(p.positivos+p.negativos)* ((p.positivos-p.negativos) /(p.positivos+p.negativos))) log, (p.positivos /(p.positivos+p.negativos)) porcentaje
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id
ORDER BY log DESC; ';



$datos = array('user'=>autentificado(),'propuestas'=>listar($consulta), 'debatidas'=>listar($debatidas), 'recientes'=>listar($recientes), 'consensuadas'=>listar($consensuadas));
echo $template->render($datos);