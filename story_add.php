<?php
 if(isset($_COOKIE["login"])){
       
	   
	  if(empty($_POST["cname"]) || empty($_POST["about"])){
			  header("location:profile.php?empty=1");
	  }
	  else{
		  $conn=mysqli_connect("localhost","root","","project1");
		 $sn=0;
		 $code="";
		 $cname=$_POST["cname"];
		 $about=$_POST["about"];
		 $email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
			$sn=0;
			
			$rs=mysqli_query($conn,"select MAX(sn) from story");
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
			for($i=0; $i<=sizeof($b); $i++ ){
				$code=$code.$a[$b[$i]];
			}	
			
				 //for image upload
			$code=$code."_".$sn; // use code which generated
			$target = "story/";  
			$target = $target.$code.".jpg";  // ecb/sdfksdf73655jh.jpg
			//$pic=($_FILES['photo']['name']);
			//$size=(($_FILES['photo']['size'])/1024)/1024;
			if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)){ 
				
				if(mysqli_query($conn,"insert into story values($sn,'$code','$email','$cname','$about')")>0){
			 
				header("location:profile.php");	
				}
				else{
					   header("location:profile.php?not_inserted=1");
				}
			} 
			else{ 
				header("location:profile.php?img_err=1");
			} 
			//image upload end
	  }
	}
	  ?>