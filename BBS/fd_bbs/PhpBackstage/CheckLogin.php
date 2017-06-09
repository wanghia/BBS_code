<?php
	session_start();
	$username=$_SESSION['username'];
	$password=$_SESSION['password'];
	
	if($username==''||$password=='')
	{
		header('Location:../../login/login.php');
	}
?>