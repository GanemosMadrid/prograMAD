<?php
include_once "config.php";
include_once "PasswordHash.php";

//La coloco aquí para asegurar que se ejecuta siempre una única vez.
session_start();

//Usuarios

//Alta de usuarios
function alta($nombre, $apellidos, $email, $password, $ip){

	// Creamos el objeto que nos permitirá gestionar nuestro hash
	$hasher = new PasswordHash(8, FALSE);
	$hash = $hasher->HashPassword($password);

	try{
			$conn = new PDO('mysql:host=localhost;dbname=NOMBREDB', 'USUARIO', 'PASSWORD');
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$user = array('nombre'=>$nombre,'apellidos'=>$apellidos,'email'=>$email,'pass'=>$hash,'ip'=>$ip);
			$result=$conn->prepare( "INSERT INTO users(nombre, apellidos, email, password, ip) 
				VALUES(:nombre, :apellidos, :email, :pass, :ip);");
			$result->execute($user);
			header( 'Location: login.php' );
		}catch(PDOException $e ){
			echo $e -> getMessage();
		}	
		
		$conn = null; 
}

//Login
function login($email, $pass){

	// Creamos el objeto que nos permitirá gestionar nuestro hash
	$hasher = new PasswordHash(8, FALSE);
	try{
			$conn = new PDO('mysql:host=localhost;dbname=NOMBREDB', 'USUARIO', 'PASSWORD');
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$user = array('email'=>$email);
			$result=$conn->prepare( "SELECT password FROM users WHERE email=:email;");
			$result->execute($user);
			foreach ($result as $cont) {
				$password = $cont['password'];
				$user_id =$cont['id'];
			}	
			//comprueba que usuario y contraseña coinciden y crea sesión de usuario.
			if ($hasher->CheckPassword($pass, $password)) {
				if (!isset($_SESSION["usuario"])){
	    			$_SESSION["usuario"] = $email;
				}
				if (isset ($_SESSION['error'])){
					unset($_SESSION['error']);
				}
			//Envía al index
			header( 'Location: index.php' );
    	
			} else {
			//Si no coinciden envía a login con sesión de error.
				$_SESSION["error"] = "error";
			    header( 'Location: login.php' );
			}
		}catch(PDOException $e ){
			echo $e -> getMessage();
		}	
		
		$conn = null; 

}

//logout
function logout() {
		unset($_SESSION['usuario']);
		header( 'Location: index.php' );
}

//Busca todos los datos del usuario identificado

function autentificado(){
	if (isset($_SESSION["usuario"])){
		$usuario=$_SESSION["usuario"];
		try{
			$conn = new PDO('mysql:host=localhost;dbname=NOMBREDB', 'USUARIO', 'PASSWORD');
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $user=array($usuario);
            $consulta= "SELECT * FROM users WHERE email=?;";
            $result= $conn->prepare($consulta);
            $result->execute($user);
			foreach($result as $res){
				$nombre = $res['nombre'];
				$apellidos = $res['apellidos'];
				$id = $res['id'];
			}
		}catch(PDOException $e ){
			echo $e -> getMessage();
		}	
			
		return array("nombre"=>$nombre, "apellidos"=>$apellidos, "id"=>$id);
	}
}

//Búsquedas

//Recibe una consulta SQL y tras ejecutarla devuelve el resultado de la misma
function listar($consulta){
	
	$propuesta=array();
	try{
		$conn = new PDO('mysql:host=localhost;dbname=NOMBREDB', 'USUARIO', 'PASSWORD');
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
		$resultado = $conn -> query($consulta);  
		$resultado->setFetchMode(PDO::FETCH_ASSOC);
		$propuesta = $resultado->fetchall();
		$conn = null;
		
	}catch(PDOException $e ){
		$propuesta =  $e->getMessage();
	}	
	return $propuesta;
}

//Ejecuta una búsqueda preparada que devuelve un resultado único. 
//Usar siempre que se reciban datos del usuario.
function preparada($prep, $consulta){
	
	try{
		$conn = new PDO('mysql:host=localhost;dbname=NOMBREDB', 'USUARIO', 'PASSWORD');
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$result = $conn->prepare($consulta);
		$result->execute($prep);
		$propuesta = $result->fetch(PDO::FETCH_ASSOC);
		$conn = null;
	}catch(PDOException $e ){
		$propuesta =  $e->getMessage();
	}
	
	return $propuesta;
}

//Ejecuta una sentencia preparada que devuelve varios resultados
//Usar siempre que se reciban datos del usuario.
function listarpreparada($prep, $consulta){
	
	try{
		$conn = new PDO('mysql:host=localhost;dbname=NOMBREDB', 'USUARIO', 'PASSWORD');
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$result = $conn->prepare($consulta);
		$result->execute($prep);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$propuesta = $result->fetchall();
		$conn = null;
	}catch(PDOException $e ){
		$receta =  $e->getMessage();
	}
	
	return $propuesta;
}

//Consulta el autor de la propuesta
function autor_propuesta($buscaID,$consulta_autor){

	try{
		$conn = new PDO('mysql:host=localhost;dbname=NOMBREDB', 'USUARIO', 'PASSWORD');
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$result = $conn->prepare($consulta_autor);
		$result->execute($buscaID);
		foreach ($result as $res){
			$autor=$res['autor_id'];
		}	
		
	}catch(PDOException $e ){
		$result =  $e->getMessage();
	}
	$conn = null;
	$autor=(int)($autor);
	return $autor;
}

//consigue el id del usuario

function userid(){
	if(isset($_SESSION["usuario"])){
		//Busco el usuario
		try{
			$usuario=$_SESSION["usuario"];
			$conn = new PDO('mysql:host=localhost;dbname=NOMBREDB', 'USUARIO', 'PASSWORD');
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $user=array($usuario);
            $consulta= "SELECT id FROM users WHERE email=?;";
            $result= $conn->prepare($consulta);
            $result->execute($user);
			foreach($result as $idusuario){
				$userid = $idusuario['id'];
			}
		}catch(PDOException $e ){
			echo $e -> getMessage();
		}	
		
		$conn = null; 
		$userid=(int)($userid);
		return $userid;
	}
}

//Propuestas

//nueva propuesta
function nueva_propuesta($titulo, $propuesta, $sector, $barrio ){

	$autor = userid();
	try{
			$conn = new PDO('mysql:host=localhost;dbname=NOMBREDB', 'USUARIO', 'PASSWORD');
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$cadena = array('autor'=>$autor, 'titulo'=>$titulo, 'propuesta'=>$propuesta,'sector'=>$sector,'barrio'=>$barrio);
			$result=$conn->prepare( "INSERT INTO prog_propuestas(autor_id, titulo, propuesta, sum_likes, positivos, negativos, comentarios, sector, barrio) 
				VALUES(:autor, :titulo, :propuesta, 1, 1, 0, 0, :sector, :barrio);");
			$result->execute($cadena);
	}catch(PDOException $e ){
			echo $e -> getMessage();
		}	
		
		$conn = null;

	//consigo el id de la propuesta
	try{
			$conn = new PDO('mysql:host=localhost;dbname=NOMBREDB', 'USUARIO', 'PASSWORD');
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$cadena = array('autor'=>userid(), 'titulo'=>$titulo, 'propuesta'=>$propuesta);
			$result=$conn->prepare( "SELECT id FROM prog_propuestas WHERE propuesta = :propuesta and autor_id =:autor and titulo= :titulo;");
			$result->execute($cadena);
			foreach($result as $res){
				$id = $res['id'];
			}
			//redirije a la propuesta una vez grabada en la base de datos
			header( 'Location: propuesta.php?id='.$id );
		}catch(PDOException $e ){
			echo $e -> getMessage();
		}	
		
		$conn = null; 
}

//Editar propuesta

function editar_propuesta($titulo, $propuesta, $sector, $barrio, $id){

	try{
			$conn = new PDO('mysql:host=localhost;dbname=NOMBREDB', 'USUARIO', 'PASSWORD');
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$cadena = array('titulo'=>$titulo, 'propuesta'=>$propuesta,'id'=>$id, 'sector'=>$sector,'barrio'=>$barrio);
			$result=$conn->prepare( "UPDATE prog_propuestas SET titulo =:titulo, propuesta=:propuesta, sector=:sector, barrio=:barrio 
				WHERE id=:id;");
			$result->execute($cadena);
			//redirije a la propuesta una vez editada
			header( 'Location: propuesta.php?id='.$id );
	}catch(PDOException $e ){
			echo $e -> getMessage();
		}	
		
		$conn = null;
}