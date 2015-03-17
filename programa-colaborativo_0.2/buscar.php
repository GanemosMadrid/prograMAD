<?php
include_once "lib/functions.php";
include_once "lib/Pagination.class.php";

$template = $twig->loadTemplate('buscar.html');

$busqueda = "";
$cadenaBusqueda = "";
$propuestas = array();
$paginado = "";
$page = isset($_POST['page']) ? ((int) $_POST['page']) : 1;
if(isset($_POST['buscar'])){
	if(!empty($_POST['buscar'])){
		$busqueda = $_POST['buscar'];
		//var_dump($page);
		//var_dump($busqueda);
		//Se recorren las palabras que forman la cadena de búsqueda
		$arrayBusqueda = explode(" ", $busqueda);
		foreach($arrayBusqueda as $clave => $palabra){
			if(strlen($palabra) < 4 || strlen($palabra) > 15){
				//Filtro de palabras poco relevantes para la busqueda
				unset($arrayBusqueda[$clave]);
			} else {
				//Filtro de palabras peligrosas para la base de datos
				if(strpos(strtolower($palabra),'insert') !== false || strpos(strtolower($palabra),'update') !== false 
						|| strpos(strtolower($palabra),'delete') !== false || strpos(strtolower($palabra),'=') !== false){
					unset($arrayBusqueda[$clave]);
				}
			}
		}
		$cadenaBusqueda = implode(" ", $arrayBusqueda);
	
		$resultadosPorPagina = 20;
		$empezarPor = ($page - 1) * $resultadosPorPagina;
		
		$total = "SELECT count(id) AS total FROM prog_propuestas WHERE MATCH(titulo, propuesta) AGAINST('". $cadenaBusqueda ."')";
		
		$consulta = "SELECT p.id, p.titulo, p.comentarios, p.sum_likes, p.positivos, p.negativos, p.sector, p.barrio, 
			u.nombre, u.apellidos, u.id_rol
			FROM prog_propuestas p INNER JOIN users u ON p.autor_id = u.id
			WHERE MATCH(p.titulo, p.propuesta) AGAINST('". $cadenaBusqueda ."') LIMIT ". $empezarPor .", ". $resultadosPorPagina .";";
		
		//Consultas y paginación
		$numeroPropuestas = listar($total);
		$propuestas = listar($consulta);
		//var_dump($numeroPropuestas);
		$pagination = (new Pagination());
		$pagination->setCurrent($page);
		$pagination->setRPP($resultadosPorPagina);
		$pagination->setTotal($numeroPropuestas['0']['total']);

		$paginado = $pagination->parse();
	}
	
}
//echo($cadenaBusqueda);

$datos = array('user'=>autentificado(), 'buscar'=>$busqueda, 'page'=>$page, 'propuestas'=>$propuestas, 'paginado'=>$paginado);

echo $template->render($datos);