<?php
include_once "lib/functions.php";

$template = $twig->loadTemplate('index.html');

$consulta = 
'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, p.sector, p.barrio, u.id_rol
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id
ORDER BY p.sum_likes DESC LIMIT 12; ';

$debatidas = 
'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, p.sector, p.barrio, u.id_rol
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id
ORDER BY p.comentarios DESC LIMIT 12; ';

$recientes = 
'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, p.sector, p.barrio, u.id_rol
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id
ORDER BY p.id DESC LIMIT 12; ';

$consensuadas = 
'SELECT u.nombre, u.apellidos, p.id, p.titulo, p.comentarios, p.sum_likes, p.sector, p.barrio, u.id_rol, p.positivos, p.negativos, (LOG(p.positivos+p.negativos)* ((p.positivos-p.negativos) /(p.positivos+p.negativos))) log, (p.positivos /(p.positivos+p.negativos)) porcentaje
FROM users AS u, prog_propuestas AS p
WHERE  `autor_id` = u.id
ORDER BY log DESC LIMIT 12; ';

$datos = array('user'=>autentificado(),'propuestas'=>listar($consulta), 'debatidas'=>listar($debatidas), 'recientes'=>listar($recientes), 'consensuadas'=>listar($consensuadas));
echo $template->render($datos);
