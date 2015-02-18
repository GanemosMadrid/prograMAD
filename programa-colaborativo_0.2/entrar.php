<?php
include_once "lib/functions.php";

if (isset($_POST["email_login"])&& isset($_POST["pass_login"])){

	$email=$_POST["email_login"];
	$email=addslashes($_POST["email_login"]);
	$pass=$_POST["pass_login"];

	login($email, $pass);

}