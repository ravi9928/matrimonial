<?php   
	include("db.php");
if(isset($_COOKIE["login"])){
		
	if(isset($_REQUEST["code"])){
		$sn=0;
		$email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
		$code=mysqli_real_escape_string($conn,$_REQUEST["code"]);
		$max=mysqli_query($conn,"select MAX(sn) from favorites");
		if($mx=mysqli_fetch_array($max)){
			$sn=$mx[0];
		}
		$sn++;
		$rs=mysqli_query($conn,"select * from favorites where code='$code' AND email='$email'");
			if($r=mysqli_fetch_array($rs)){
				mysqli_query($conn,"DELETE FROM favorites WHERE code='$code' AND email='$email'");
				echo "delete";
				
			}
			else if(mysqli_query($conn,"insert into favorites values($sn,'$email','$code')")>0){
				echo "success";
			}
	}
}
	?>