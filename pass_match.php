<?php
	if(isset($_COOKIE["login"])){
		include("db.php");
		$email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
	
		if(isset($_REQUEST["cp"])){
			$cp=mysqli_real_escape_string($conn,$_REQUEST["cp"]);
			$rs=mysqli_query($conn,"SELECT * from matrial where Email='$email'");
			if($r=mysqli_fetch_array($rs)){
				if($cp==$r["Password"]){
				 echo "success";	
				}
			}
		}
	}	
?> 