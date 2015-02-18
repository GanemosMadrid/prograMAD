<?php
include_once "lib/functions.php";

if (isset($_POST["email_forgot"])){
	$email=$_POST["email_forgot"];
	forgot($email);
	

}