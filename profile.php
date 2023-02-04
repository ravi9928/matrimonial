<?php
    include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
	  $email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
	  $rs=mysqli_query($conn,"select * from matrial where email='$email'");
	  if($r=mysqli_fetch_array($rs)){
		  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>VADIC MATRIMONY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://kit.fontawesome.com/5dc79dff6a.js" crossorigin="anonymous"></script>
  
  <script>
		setInterval(function(){
			   $("#matches").load("load_profile.php");
		   },3000); 

		   //for edit profile
			 $(document).on("click",".btn.btn-warning",function(){
				var code=$(this).attr("id");
				alert(code);
				("#user").load("modal_ed.php");
			 });	
		   
		   
			//for open random profiles
		$(document).on("click",".strong",function(){
		 var v=$(this).attr("rel");
			  $.post(
			  "view_profile.php",{code:v},function(data){
				 $("#user").html(data);
			 }); 
		}); 
	 // for message 
	 $(document).on("click",".btn.btn-danger",function(){
		var msg=$("#msg").val();
		var code=$(this).attr("id");
		
		$.post(
			"msg.php",{msg:msg,code:code},function(data){
				if(data.trim()=="sent"){
				$("#msg").val("");
				$("#alert").html("<h3 style='color:blue'>Message Sent</h3>");
				}
		});
	 });
	 //for search
	 $(document).on("click",".btn.btn-info",function(){
		 var gender=$("#gender").val();
		 var caste=$("#caste").val();
		 var religion=$("#religion").val();
		  $("#main-block").css("background-image","");
		  $.post(
			"search.php",{gender:gender,caste:caste,religion:religion},function(data){
				$("#user").html(data);
			});
	 });
	     //for view profile from search 
	  $(document).on("click",".btn.btn-dark",function(){
			   var code=$(this).attr("id");
			   $.post(
			      "view_profile.php",{code:code},function(data){
					  $("#user").html(data);
	         });
	  });	 
		//for inbox
		 $(document).on("click","#inbox",function(){
			$("#user").load("inbox.php");
			
			   $("#main-block").css("background-image","");
			   
		 });
		 //load more in inbox
		$(document).on("click",".w3-btn.w3-blue",function(){
			var num=$(this).attr("id");
			 $(this).fadeOut(10);
			$.post(
			   "inbox.php",{num:num},function(data){
				   $("#user").append(data);
				   
			   }
			);
			
	    });	
		//load more in favpoorites profiles
		$(document).on("click",".w3-btn.w3-dark.1",function(){
			var num=$(this).attr("id");
			 $(this).fadeOut(10);
			$.post(
			   "fav_profiles.php",{num:num},function(data){
				   $("#user").append(data);
				   
			   }
			);
			
	    });			
		//view profile from inbox
		$(document).on("click",".w3-button.w3-blue",function(){
			   var code=$(this).attr("rel");
			   $.post(
			      "view_profile.php",{code:code},function(data){
					  $("#user").html(data);
				  });
		});	
		 
		//change password
		 $(document).on("click","#change_pass",function(){
			$("#user").load("change_pass.php");
			   $("#main-block").css("background-image","");
			   
		 });
		 //password check
		 $(document).on("click",".btn.btn-secondary",function(){
			 var cp=$("#cp").val();
			 $.post(
			      "pass_match.php",{cp:cp},function(data){
					  if(data.trim()=="success"){
					    $("#user").load("passnew.php");  
					  }
					  else{
						  $("#palert").html("<h4 style='background-color:red;color:white'>Wrong password</h4>"); 
					  }
	         });
			   
		 });
		  //new pass=retyp pass
		  $(document).on("click",".btn.btn-success",function(){
			  var np=$("#np").val();
			  var rp=$("#rp").val();
				if(np==rp){
					$.post(
					  "pass_update.php",{np:np,rp:rp},function(data){
						  if(data.trim()=="same"){
							  $("#palert").css("background-color","#FF5B5B");
							  $("#palert").html("<h4 style='color:white'>New password can not same as old password</h4>");
						  }
						  else if(data.trim()=="changed"){
							  $("#palert").css("background-color","#359F58");
							  $("#palert").html("<h4 style='color:white'>Password Changed</h4>");
							  $("#np").val("");
							  $("#rp").val("");
						  }
						  else{
							  $("#palert").html("<h4 style='color:red'>Password not Changed</h4>");
						  
						  }
					 });
				}
				else{
					$("#palert").css("background-color","red");
						  $("#palert").html("<h4 style='color:white'>password not matching</h4>");
						 
				}
				
		  }); 
		  
		 
		 //for logout
		 $(document).on("click","a",function(){
			   var v=$(this).text();
			   if(v=="Logout"){
				   $.post(
					  "view_profile.php",{},function(data){
						  	window.open("http://localhost/matrimonial/logout.php");
				 });
			   }
			    //for add story
			   if(v=="Add story"){
				   $("#user").load("story_form.php");
			   }
			   //my favorites
			   if(v=="My favorites"){
				    $("#user").load("fav_profiles.php");
			   }
		});
		
		//for favorites
		 $(document).on("click",".fa.fa-heart",function(){
			  var code=$(this).attr("id");
			   $.post(
			      "fav.php",{code:code},function(data){
					  if(data.trim()=="success"){
					    $("#"+code).css('color','red');
					  }
					  else if(data.trim()=="delete"){
						   $("#"+code).css('color','black');
					  }
	         });
		 });
		
  </script>
  <style>
	.fa.fa-heart{
		cursor:pointer;
	}
	.strong{
		cursor:pointer;
	}
	.table{
		font-family:arial;
	}
  </style>
</head>
<body>

	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
	  <!-- Brand/logo -->
	  <a class="navbar-brand" href="#"><img src="images/mat_l.jpg" style="width:70px;height:50px"></a>
	 
	  <!-- Navbar links -->
	  <div class="collapse navbar-collapse" id="collapsibleNavbar"> 
		<ul class="navbar-nav">
		  <li class="nav-item">
			<a class="nav-link" href="profile.php">My Profile</a>
		  </li>
		  <li class="nav-item">
		  <a class="nav-link" style="cursor:pointer" id="inbox">Inbox</a>
		</li>
		</ul>
	 </div>
	  
	  <!-- Links -->
	  <ul class="navbar-nav">
	   <li class="nav-item">
		  <a class="nav-link" style="cursor:pointer">My favorites</a>
		</li>
	  <li class="nav-item">
		  <a class="nav-link" style="cursor:pointer">Add story</a>
		</li>
		 <li class="nav-item">
			<a class="nav-link" style="cursor:pointer" id="change_pass">Change Password</a>
		 </li>
		 <li class="nav-item">
		  <a class="nav-link" style="cursor:pointer">Logout</a>
		</li>
		
	  </ul>
	  
	</nav>
   
   
<div class="container-fluid">
	<div class="row" style="background-image:url(images/bg4.jpg);height:auto">
		<div class="col-sm-12">
		
			<div class="container">
				<div class="row" style="margin-top:80px;">
					<div class="col-sm-8">
						<div class="row w3-card"  style="background-color:white" id="user">
						<div class="col-sm-12" style="background-color:#D3ABC2"><br><h3 style="color:#793D00"><b><?php echo $r["First_Name"],"&nbsp",$r["Last_Name"];?></b></h3></div>
						<div class="col-sm-12" class="alert"><br></div>
							<div class="col-sm-4">
							<img src="profile/<?php echo $r["code"];?>.jpg" class="img-fluid">
							</div>
							<div class="col-sm-8">
								<table class="table table-hover table-borderless">
									<tr><td>First Name :</td><td><?php echo $r["First_Name"];?></td></tr>
									<tr><td>Last Name :</td><td><?php echo $r["Last_Name"];?></td></tr>
									<tr><td>DOB:</td><td><?php echo $r["Date_of_Birth"];?></td></tr>
									<tr><td>Gender:</td><td><?php echo $r["Gender"];?></td></tr>
									<tr><td>Caste :</td><td><?php echo $r["Caste"];?></td></tr>
									<tr><td>Religion :</td><td><?php echo $r["Religion"];?></td></tr>
									
								</table>
							</div>	
							<div class="col-sm-12"><br><br></div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="w3-card" style="background-color:#D3ABC2">
							<div class="card-body">
								<label><h3 style="color:#793D00"><b>Looking For:</b></h3></label><br>
								<label>Gender:</label>
								<select id="gender" class="form-control">
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select><br>
								<label>Caste:</label>
								<select id="caste" class="form-control">
									<option value="Gupta">Gupta</option>
									<option value="Kumawat">Kumawat</option>
									<option value="Rajput">Rajput</option>
									<option value="Goyal">Goyal</option>
									<option value="Sinha">Sinha</option>
									<option value="Singh">Singh</option>
									<option value="Khan">Khan</option>
								</select><br>
								<label>Religion:</label>
								<select id="religion" class="form-control">
									<option value="Hindu">Hindu</option>
									<option value="Muslim">Muslim</option>
									<option value="Sikh">Sikh</option>
									<option value="Parsi">Parsi</option>
									<option value="Buddhism">Buddhism</option>
									<option value="other">Other</option>
								</select><br><br>
								<button class="btn btn-info">Search</button>
							</div>		
						</div>
					</div>
					<div class="col-sm-12"><br><br></div>
				</div>
			</div>	
			
		</div>
	</div>
</div>	

<div class="row" id="matches">
	<div class="col-sm-12"><center><h2 style="color:red"><b> Profile Matches</b><h2></center></div>
	<div class="col-sm-12"><br></div>
	<?php
		$rp=mysqli_query($conn,"select * from matrial where email<>'$email' limit 0,4");
		while($rd=mysqli_fetch_array($rp)){
			?>
		<div class="col-sm-3">	
			<table class="table table-borderless w3-card">
			<tr><td align="center"><img src="profile/<?php echo $rd["code"];?>.jpg" class="img-fluid"></td></tr>
			<?php
			$code=$rd["code"];
			$rs=mysqli_query($conn,"select * from favorites where code='$code' AND email='$email'");
			if($r=mysqli_fetch_array($rs)){
				?>
				<tr><td align="center"><strong class="strong" rel="<?php echo $rd["code"];?>" style="cursor:pointer"><?php echo $rd["First_Name"];?></strong></td><td><i class="fa fa-heart" style="color:red" id="<?php echo $rd["code"];?>"></i></td></tr>
			<?php
			}
			else{
				?>
				<tr><td align="center"><strong class="strong" rel="<?php echo $rd["code"];?>" style="cursor:pointer"><?php echo $rd["First_Name"];?></strong></td><td><i class="fa fa-heart" id="<?php echo $rd["code"];?>"></i></td></tr>
			<?php
			}//style="width:260px;height:175px"
			?>
			</table>
		</div>
		<?php
		}
		?>
		 <div class="col-sm-12"><br><br></div>
</div>

<?php
		}
	} 
      ?>
</body>
</html>