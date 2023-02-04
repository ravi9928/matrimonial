<?php
if(isset($_REQUEST["v"])){
	$v=$_REQUEST["v"];
	if($v=="SignIn"){
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>VEDIC MATRIMONY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <script src="https://kit.fontawesome.com/5dc79dff6a.js" crossorigin="anonymous"></script>
  
  <script>
			$(document).ready(function(){
				$(".btn.btn-primary").click(function(){
					var v=$(this).text();
					email=$("#email").val(); 
					pass=$("#pass").val(); 
					if(v=="Login"){
						$.post(
							"login_reg.php",{rec:v,email:email,pass:pass},function(data){
								if(data=="success"){
									window.open("http://localhost/matrimonial/profile.php");
								}
								
						});	
					}
				});	
			});
  </script>
</head>
<body> 

        <div class="col-sm-12" style="margin-top:40px">
        <div class="shadow-lg p-3 mb-5 bg-white rounded">	
	  		<h3 style="color:primary">Login</h3>
		   <!-- <form method="post" action="login_reg.php"> --> 
				<label>Email : </label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tie"></i></span>
					</div>  
					<input type="email" class="form-control" id="email" placeholder="Enter Email" required><br>
				</div>
				
				<label>Password : </label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
					</div> 
					<input type="password" class="form-control" id="pass" placeholder="Enter Password" required><br>
				</div>
				
				<button class="btn btn-primary">Login</button>
			<!--</form-->
		</div>
		</div>
		<?php  
	}

    }
?>

</body>
</html>