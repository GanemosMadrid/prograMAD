<?php
include_once "lib/functions.php";

if (isset($_POST["propuesta_id"])&& isset($_POST["usuario_id"])){
	    $propuesta_id=$_POST["propuesta_id"];
		$usuario_id=$_POST["usuario_id"];
		$enmienda=$_POST["enmienda"];

		try{
			//Inserto enmienda
			$conn = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASS);
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$consulta = array('propuesta_id'=>$propuesta_id,'usuario_id'=>$usuario_id,'enmienda'=>$enmienda);
			$result=$conn->prepare( "INSERT INTO prog_enmiendas (autor_id, propuesta_id, enmienda, sum_likes) 
				VALUES(:usuario_id, :propuesta_id, :enmienda , 1);");
			$result->execute($consulta);

			//actualizo número de comentarios
			$consulta2 = array('propuesta_id'=>$propuesta_id);
			$result=$conn->prepare( "UPDATE prog_propuestas SET comentarios=comentarios+1 
				WHERE id=:propuesta_id;");
			$result->execute($consulta2);

			//consulto id de la enmienda
			$consulta_id = array('propuesta_id'=>$propuesta_id,'enmienda'=>$enmienda, 'usuario_id'=>$usuario_id);
			$result=$conn->prepare( "SELECT id FROM prog_enmiendas WHERE propuesta_id=:propuesta_id and enmienda = :enmienda and autor_id=:usuario_id;");
			$result->execute($consulta_id);
			foreach($result as $res){
				$id = $res['id'];
			}

			//Registro más 1 al comentario
			$consulta3 = array('usuario_id'=>$usuario_id, 'enmienda_id'=>$id);
			$result=$conn->prepare( "INSERT INTO prog_likes_enmiendas(usuario_id, enmienda_id, enmienda_voto) 
				VALUES (:usuario_id,:enmienda_id,1)");
			$result->execute($consulta3);

			//devuelvo los datos para la actualización jquery
			$consulta4 = array('id'=>$propuesta_id, 'usuario_id'=>$usuario_id);
			$result=$conn->prepare('SELECT nombre, apellidos FROM users WHERE id = "'.$usuario_id.'"');
			$result->execute();
			foreach($result as $res){
				$nombre = $res['nombre'];
				$apellidos = $res['apellidos'];
			}

			$output= array();

			foreach($result as $res){
				$nombre = $res['nombre'];
				$apellidos = $res['apellidos'];
			}
			//Array serializado para pasar datos con json.
			$output[] = array('nombre' => $nombre, 'apellidos'=>$apellidos);
			echo json_encode($output);

	}catch(PDOException $e ){
			echo $e -> getMessage();
		}	
		//Cierro la conexión
		$conn = null;
		
		

}