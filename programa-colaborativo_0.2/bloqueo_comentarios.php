<?php
include_once "lib/functions.php";

//Para que el usuario no pueda votar 2 veces los comentarios
if(isset ($_POST['usuario_id'])){

	$usuario=$_POST['usuario_id'];

	try{
	$conn = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASS);
	$consulta = "SELECT * FROM prog_likes_comentarios
	WHERE usuario_id=".$usuario.";";
	$result = $conn->prepare($consulta);
	$result->execute();
	//Se crea array vacío
	$output= array();
	foreach($result as $res){
		$like=$res['comentario_voto'];
		$id_enm=$res['comentario_id'];
		//Si el voto es positivo
		if ($like==1){
			$block="com-fav";
			$id=$id_enm;
		}
		//Si el voto es negativo
		if ($like==-1){
			$block="com-con";
			$id=$id_enm;
		}
	$output[] = array('activo' => $block, 'id' =>$id);
	}

	

	//Array serializado para pasar datos con json.
	
	echo json_encode($output);
		
	}catch(PDOException $e ){
		echo $e -> getMessage();
	}
}