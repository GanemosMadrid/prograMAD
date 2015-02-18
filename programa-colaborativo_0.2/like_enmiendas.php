<?php
include_once "lib/functions.php";


if(isset ($_POST['cuenta'])){

	$enmienda=$_POST['enmienda'];
	$usuario=$_POST['usuario_id'];
	$cuenta=$_POST['cuenta'];

	//compruebo que se ha votado ya a esa enmienda:
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
		$consulta="UPDATE prog_likes_enmiendas SET enmienda_voto=-1 
		WHERE enmienda_id = ".$enmienda." AND usuario_id = ".$usuario.";";
		listar($consulta);
		$suma="UPDATE prog_enmiendas SET sum_likes=sum_likes+(-2) WHERE id = ".$enmienda.";";
		listar($suma);

	}elseif ($enmienda_voto==-1){
		$consulta="UPDATE prog_likes_enmiendas SET enmienda_voto=1
		WHERE enmienda_id = ".$enmienda." AND usuario_id = ".$usuario.";";
		listar($consulta);
		$suma="UPDATE prog_enmiendas SET sum_likes=sum_likes+2 WHERE id = ".$enmienda.";";
		listar($suma);

	}else{
		//Registro voto
		$consulta="INSERT INTO prog_likes_enmiendas(usuario_id, enmienda_id, enmienda_voto) 
		VALUES (".$usuario.",".$enmienda.",".$cuenta.");";
		listar($consulta);
		//sumo voto
		$suma="UPDATE prog_enmiendas SET sum_likes=sum_likes+(".$cuenta.") WHERE id = ".$enmienda.";";
		listar($suma);
	}
	

	//recuento votos
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