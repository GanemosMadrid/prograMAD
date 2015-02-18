<?php
include_once "lib/functions.php";


if(isset ($_POST['enmienda'])){

	$enmienda=$_POST['enmienda'];
	$usuario=$_POST['usuario_id'];

	try{
	$conn = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASS);
	$consulta = "SELECT enmienda_voto FROM prog_likes_enmiendas 
	WHERE enmienda_id = ".$enmienda." AND usuario_id = ".$usuario.";";
	$result = $conn->prepare($consulta);
	$result->execute();
	foreach($result as $res){
		$enmienda_voto=$res['enmienda_voto'];
	}

	if ($enmienda_voto==1){
		$consulta="DELETE FROM prog_likes_enmiendas WHERE enmienda_id = ".$enmienda." AND usuario_id = ".$usuario.";";
		listar($consulta);
		$suma="UPDATE prog_enmiendas SET sum_likes=sum_likes+(-1) WHERE id = ".$enmienda.";";
		listar($suma);

	}if ($enmienda_voto==-1){
		$consulta="DELETE FROM prog_likes_enmiendas WHERE enmienda_id = ".$enmienda." AND usuario_id = ".$usuario.";";
		listar($consulta);
		$suma="UPDATE prog_enmiendas SET sum_likes=sum_likes+1 WHERE id = ".$enmienda.";";
		listar($suma);

	}



	
	$consulta = "SELECT sum_likes FROM prog_enmiendas WHERE id = ".$enmienda.";";
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