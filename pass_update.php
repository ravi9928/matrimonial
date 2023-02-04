<?php
	if(isset($_COOKIE["login"])){
		include("db.php");
		$email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
	
		$rs=mysqli_query($conn,"SELECT * from matrial where Email='$email'");
		if($r=mysqli_fetch_array($rs)){
			$cp=$r["Password"];
			
			if(isset($_REQUEST["np"]) && isset($_REQUEST["rp"])){
				$np=mysqli_real_escape_string($conn,$_REQUEST["np"]);
				$rp=mysqli_real_escape_string($conn,$_REQUEST["rp"]);
				
				if($cp==$np){
					echo "same";
				}
				else if($np==$rp){
					if(mysqli_query($conn,"update matrial set Password='$np' where 	Email='$email'")>0){
						echo "changed";
					}	
					else{
						echo "not_changed";
					}
				}
			}	
		}	
	}