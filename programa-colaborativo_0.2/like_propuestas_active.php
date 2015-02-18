<?php
include_once "lib/functions.php";


if(isset ($_POST['propuesta'])){

	$propuesta=$_POST['propuesta'];
	$usuario=$_POST['usuario_id'];
	
	try{
	$conn = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASS);
	$consulta = "SELECT propuesta_voto FROM prog_likes_propuesta 
	WHERE propuesta_id = ".$propuesta." AND usuario_id = ".$usuario.";";
	$result = $conn->prepare($consulta);
	$result->execute();
	foreach($result as $res){
		$propuesta_voto=$res['propuesta_voto'];
	}

	if ($propuesta_voto==1){
		$consulta="DELETE FROM prog_likes_propuesta WHERE propuesta_id = ".$propuesta." AND usuario_id = ".$usuario.";";
		listar($consulta);
		$suma="UPDATE prog_propuestas SET sum_likes=sum_likes-1, positivos=positivos-1 WHERE id = ".$propuesta.";";
		listar($suma);

	}if ($propuesta_voto==-1){
		$consulta="DELETE FROM prog_likes_propuesta WHERE propuesta_id = ".$propuesta." AND usuario_id = ".$usuario.";";
		listar($consulta);
		$suma="UPDATE prog_propuestas SET sum_likes = sum_likes+1, negativos = negativos-1 WHERE id = ".$propuesta.";";
		listar($suma);

	}

	
	$consulta = "SELECT sum_likes FROM prog_propuestas WHERE id = ".$propuesta.";";
	$result = $conn->prepare($consulta);
	$result->execute();
	//Se crea array vacío
	$output= array();
	foreach($result as $res){
		$like=$res['sum_likes'];
	}
	//Array serializado para pasar datos con json.
	$output[] = array('sum_likes' => $like);
	echo json_encode($output);
		
	}catch(PDOException $e ){
		echo $e -> getMessage();
	}	

}