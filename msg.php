<?php
	Include("db.php");
	if(isset($_COOKIE["login"])){
		$femail=mysqli_real_escape_string($conn,$_COOKIE["login"]);
		$rs=mysqli_query($conn,"select * from matrial where email='$femail'");
		if($rf=mysqli_fetch_array($rs)){
			$fcode=$rf["code"];
		
			if(isset($_REQUEST["code"]) && isset($_REQUEST["msg"])){
				$tcode=mysqli_real_escape_string($conn,$_REQUEST["code"]);
				$msg=mysqli_real_escape_string($conn,$_REQUEST["msg"]);
				
				$rs=mysqli_query($conn,"select * from matrial where code='$tcode'");
				if($rf=mysqli_fetch_array($rs)){
				$temail=$rf["Email"];
				}
				$sn=0;
				$code="";
				
				$sn=0;
				$rs=mysqli_query($conn,"select MAX(sn) from inboxjq");
				if($r=mysqli_fetch_array($rs)){
					
					 $sn=$r[0];
				}
				$sn++;
				 $a=array();
				for($i='A'; $i<='Z'; $i++ ){
					array_push($a,$i);
					if($i='Z')
						break;
					}
				for($i='a'; $i<='z'; $i++ ){
					array_push($a,$i);
					if($i='z')
						break;
					}	
				for($i=0; $i<=9; $i++ ){
					array_push($a,$i);	
				}
				
				$b=array_rand($a,6);
				for($i=0; $i<sizeof($b); $i++ ){
					$code=$code.$a[$b[$i]];
				}	
				$code=$code."_".$sn; 
				$d=date("d M,Y");
				
				if(mysqli_query($conn,"insert into inboxjq values($sn,'$code','$temail','$tcode','$femail','$fcode','$msg','$d')")>0){
				echo "sent";
				}
 
			}
		}
	} 
	else{
		header("location:front_page.php");
	}
 ?>