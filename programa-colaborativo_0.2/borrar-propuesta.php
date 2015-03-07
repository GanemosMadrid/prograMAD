<?php
include_once "lib/functions.php";

if (isset($_SESSION["id_rol"]) && $_SESSION["id_rol"] == 2){
	$id = $_GET["id"];
	
	try{
		$conn = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASS);
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$cadena = array('id'=>$id);
		$result=$conn->prepare( "DELETE FROM prog_propuestas WHERE id = :id");
		$result->execute($cadena);
	} catch(PDOException $e ){
		echo $e -> getMessage();
	}
	//Cierro la conexión
	$conn = null;
	
	header('Location: index.php');
} else {
	header('Location: index.php');
}