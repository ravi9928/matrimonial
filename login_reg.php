<?php 
    if(isset($_REQUEST["pass"])&& isset($_REQUEST["email"])&& isset($_REQUEST["pass"])){
		$email=$_REQUEST["email"];
		$pass=$_REQUEST["pass"];
		$conn=mysqli_connect("localhost","root","","project1");
		$rs=mysqli_query($conn,"select * from matrial where email='$email'" );
		if($r=mysqli_fetch_array($rs)){
        	if($r["Password"]==$pass){
				setcookie("login",$email,time()+3600);
				   echo "success";
		    }
			else{
				echo " Wrong Password";
			}
    	}
        else{
			echo "Enter a valid email";
		}
		
		
		
	}	
?>