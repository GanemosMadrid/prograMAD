<?php
include_once "lib/functions.php";


if(isset ($_POST['cuenta'])){

	$comentario=$_POST['comentario'];
	$usuario=$_POST['usuario_id'];
	$cuenta=$_POST['cuenta'];

	//compruebo qé se ha votado a ese comentario:
	try{
	$conn = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASS);
	$consulta = "SELECT comentario_voto FROM prog_likes_comentarios 
	WHERE comentario_id = ".$comentario." AND usuario_id = ".$usuario.";";
	$result = $conn->prepare($consulta);
	$result->execute();
	foreach($result as $res){
		$comentario_voto=$res['comentario_voto'];
	}

	//Si el voto es positivo
	if ($comentario_voto==1){
		$consulta="UPDATE prog_likes_comentarios SET comentario_voto=-1 
		WHERE comentario_id = ".$comentario." AND usuario_id = ".$usuario.";";
		listar($consulta);
		$suma="UPDATE prog_comentarios SET sum_likes=sum_likes+(-2) WHERE id = ".$comentario.";";
		listar($suma);

	//Si el voto es negativo
	}elseif ($comentario_voto==-1){
		$consulta="UPDATE prog_likes_comentarios SET comentario_voto=1
		WHERE comentario_id = ".$comentario." AND usuario_id = ".$usuario.";";
		listar($consulta);
		$suma="UPDATE prog_comentarios SET sum_likes=sum_likes+2 WHERE id = ".$comentario.";";
		listar($suma);

	}else{
		//Si no existe, registro voto
		$consulta="INSERT INTO prog_likes_comentarios(usuario_id, comentario_id, comentario_voto) 
		VALUES (".$usuario.",".$comentario.",".$cuenta.");";
		listar($consulta);
		//sumo voto
		$suma="UPDATE prog_comentarios SET sum_likes=sum_likes+(".$cuenta.") WHERE id = ".$comentario.";";
		listar($suma);
	}
	

	//recuento votos
	$consulta = "SELECT sum_likes FROM prog_comentarios WHERE id = ".$comentario.";";
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