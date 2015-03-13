<?php
include_once "lib/functions.php";

if (isset($_POST["email_signup"])&& isset($_POST["pass_signup"])){
		//Con addslashes escapo las comillas, la barra invertida y NUL (el byte NULL).
	    $nombre=$_POST["nombre"];
		$nombre=addslashes($_POST["nombre"]);
		$apellidos=$_POST["apellidos"];
		$apellidos=addslashes($_POST["apellidos"]);
		$email=$_POST["email_signup"];
		$email=addslashes($_POST["email_signup"]);
		$pass=$_POST["pass_signup"];
		$password=addslashes($_POST["pass_signup"]);
		
		//Obtengo la IP
		if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
    		$ip=$_SERVER['HTTP_CLIENT_IP'];
		} elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
    		$ip=$_SERVER['REMOTE_ADDR'];
		}
		
		if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
		if(!$captcha){
          header('Location: login.php?page=error-captcha');
		  exit;
        }
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LerPwMTAAAAAJVePZthqzb4kc2fQZefhdQeDEyL&response=".$captcha."&remoteip=". $ip);
        if($response.success==false){
          header('Location: login.php?page=error-captcha');
		  exit;
        } else{
          alta ($nombre, $apellidos, $email, $password, $ip);
        }

}