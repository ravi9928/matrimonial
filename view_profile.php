<?php
   include("db.php");
  if(isset($_COOKIE["login"])){
	  $email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
	  $rs=mysqli_query($conn,"select * from matrial where email='$email'");
	  if($r=mysqli_fetch_array($rs)){

     
			if(isset($_REQUEST["code"])){ 
				$code=mysqli_real_escape_string($conn,$_REQUEST["code"]);
				$rp=mysqli_query($conn,"select * from matrial where code='$code'");
				if($rs=mysqli_fetch_array($rp)){
		  ?>
		
	
			<div class="col-sm-12"><br><h3 style="color:#793D00"><b><?php echo $rs["First_Name"],"&nbsp",$rs["Last_Name"];?></b></h3></div>
			<div class="col-sm-12" id="alert"><br></div>
			<div class="col-sm-4">
				<img src="profile/<?=$rs["code"]?>.jpg" class="img-fluid">
			
			</div>
			<div class="col-sm-8">
				<table class="table table-borderless">
					<tr><td>First Name :</td><td><?php echo $rs["First_Name"];?></td></tr>
					<tr><td>Last Name :</td><td><?php echo $rs["Last_Name"];?></td></tr>
					<tr><td>DOB:</td><td><?php echo $rs["Date_of_Birth"];?></td></tr>
					<tr><td>Gender:</td><td><?php echo $rs["Gender"];?></td></tr>
					<tr><td>Caste :</td><td><?php echo $rs["Caste"];?></td></tr>
					<tr><td>Religion :</td><td><?php echo $rs["Religion"];?></td></tr>
					<tr><td colspan=2><label style="color:red"><b>Send Message :</b></label><br>
					<textarea rows="3" class="form-control" id="msg" style="resize:none"></textarea><br><br>
					<button class="btn btn-danger" id="<?php echo $rs["code"]; ?>">Send</button></td></tr>
				</table>
			</div>
			<div class="col-sm-12"><br><br></div>
		
	
<?php
				}
			}
		}
    }
	else{
		header("location:index.php");
	}
 ?>

