<?php
	include("includes/connect.php");
	define("ADMINUSERNAME","admin");
	define("ADMINPASS","admin");

	$adminusername= mysqli_real_escape_string($link, $_POST['username']);
	$adminpass = mysqli_real_escape_string($link,$_POST['password']);
	$auth = 'admin_in';

	if (!verifyCredentials($adminusername,$adminpass)){
		header("location:"."index.php");
	} else {
		$row = mysqli_fetch_array($query);
		setcookie("adminid",$row["id"]);
		setcookie("adminpass",$adminpass);
		setcookie("auth",$auth);
		header("location:"."home.php");
	}

	function verifyCredentials($adminusername,$adminpass)
	{
		if($adminusername==ADMINUSERNAME&&$adminpass==ADMINPASS){
			return true;
		}else{
			return false;
		}
	}
?>
