<?php
include_once "lib/functions.php";

if (isset($_POST["titulo"])&& isset($_POST["propuesta"])){
	    $titulo=($_POST["titulo"]);
		$prop=($_POST["propuesta"]);
		$propuesta= strip_tags($prop, '<br><b><em><ul><ol><li><a>');
		$sector=$_POST["sector"];
		$barrio=$_POST["barrio"];

		nueva_propuesta($titulo, $propuesta, $sector, $barrio);

}