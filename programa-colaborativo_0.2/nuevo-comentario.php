<?php
include_once "lib/functions.php";

if (isset($_POST["propuesta_id"])&& isset($_POST["usuario_id"])){
		
	    $propuesta_id=$_POST["propuesta_id"];
		$enmienda_id=$_POST["enmienda_id"];
		$usuario_id=$_POST["usuario_id"];
		$comentario=$_POST["comentario"];

		try{
			//Inserto comentario
			$conn = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASS);
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$consulta = array('enmienda_id'=>$enmienda_id,'usuario_id'=>$usuario_id,'comentario'=>$comentario);
			$result=$conn->prepare( "INSERT INTO prog_comentarios (autor_id, enmienda_id, comentario, sum_likes) 
				VALUES(:usuario_id, :enmienda_id, :comentario, 1);");
			$result->execute($consulta);

			//actualizo número de comentarios
			$consulta2 = array('propuesta_id'=>$propuesta_id);
			$result=$conn->prepare( "UPDATE prog_propuestas SET comentarios=comentarios+1 
				WHERE id=:propuesta_id;");
			$result->execute($consulta2);

			//consulto id del comentario
			$consulta_id = array('comentario'=>$comentario);
			$result=$conn->prepare( "SELECT id FROM prog_comentarios WHERE comentario = :comentario;");
			$result->execute($consulta_id);
			foreach($result as $res){
				$id = $res['id'];
			}

			//Registro más 1 al comentario
			$consulta3 = array('usuario_id'=>$usuario_id, 'comentario_id'=>$id);
			$result=$conn->prepare( "INSERT INTO prog_likes_comentarios(usuario_id, comentario_id, comentario_voto) 
				VALUES (:usuario_id,:comentario_id,1)");
			$result->execute($consulta3);

			
			$result=$conn->prepare('SELECT nombre, apellidos FROM users WHERE id = "'.$usuario_id.'"');
			$result->execute();
			foreach($result as $res){
				$nombre = $res['nombre'];
				$apellidos = $res['apellidos'];
			}
			//Array serializado para pasar datos con json.
			$output= array();
			$output[] = array('nombre' => $nombre, 'apellidos'=>$apellidos);
			echo json_encode($output);

	}catch(PDOException $e ){
			echo $e -> getMessage();
		}	
		//Cierro la conexión
		$conn = null;
		
		

}