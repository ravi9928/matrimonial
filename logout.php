<?php
include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
	setcookie("login",$email,time()-1);
		        header("location:index.php?logout=1");
	}
	
?>