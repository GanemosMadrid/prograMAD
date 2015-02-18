<?php
include_once "lib/functions.php";


if(isset ($_POST['cuenta'])){

	$propuesta=$_POST['propuesta'];
	$usuario=$_POST['usuario_id'];
	$cuenta=$_POST['cuenta'];

	//compruebo que se ha votado ya a esa propuesta:
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
		$consulta="UPDATE prog_likes_propuesta SET propuesta_voto=-1 
		WHERE propuesta_id = ".$propuesta." AND usuario_id = ".$usuario.";";
		listar($consulta);
		$suma="UPDATE prog_propuestas SET sum_likes=sum_likes-2, positivos=positivos-1, negativos=negativos+1 WHERE id = ".$propuesta.";";
		listar($suma);

	}elseif ($propuesta_voto==-1){
		$consulta="UPDATE prog_likes_propuesta SET propuesta_voto=1
		WHERE propuesta_id = ".$propuesta." AND usuario_id = ".$usuario.";";
		listar($consulta);
		$suma="UPDATE prog_propuestas SET sum_likes=sum_likes+2, positivos=positivos+1, negativos=negativos-1 WHERE id = ".$propuesta.";";
		listar($suma);

	}else{
		//Registro voto
		$consulta="INSERT INTO prog_likes_propuesta(usuario_id, propuesta_id, propuesta_voto) 
		VALUES (".$usuario.",".$propuesta.",".$cuenta.");";
		listar($consulta);
		//sumo voto
		$suma="UPDATE prog_propuestas SET sum_likes=sum_likes+(".$cuenta.") WHERE id = ".$propuesta.";";
		listar($suma);

		if ($cuenta==1){
			$sumaPos="UPDATE prog_propuestas SET positivos=positivos+1 WHERE id = ".$propuesta.";";
			listar($sumaPos);
		}else{
			$sumaNeg="UPDATE prog_propuestas SET negativos=negativos+1 WHERE id = ".$propuesta.";";
			listar($sumaNeg);
		}
	}
	

	//recuento votos
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