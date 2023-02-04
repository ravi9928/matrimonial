<?php
	if(isset($_COOKIE["login"])){
		include("db.php");
		$email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
		
		if(isset($_REQUEST["gender"]) && isset($_REQUEST["caste"]) && isset($_REQUEST["religion"])){
			$gender=mysqli_real_escape_string($conn,$_REQUEST["gender"]);
			$caste=mysqli_real_escape_string($conn,$_REQUEST["caste"]);
			$religion=mysqli_real_escape_string($conn,$_REQUEST["religion"]);
			?>
				<div class="col-sm-12"><b align="center" style="color:blue;font-size:30px;align:center">Search Result</b></div>
				<div class="col-sm-12"><br><br></div>
			<?php
			$rs=mysqli_query($conn,"select * from matrial where Email<>'$email' AND Gender='$gender' AND Caste='$caste' AND Religion='$religion' order by sn limit 0,4");
			while($r=mysqli_fetch_array($rs)){
					?>
					
					<div class="col-sm-4">
						<img src="profile/<?php echo $r["code"];?>.jpg" class="img-fluid">
					</div>
					<div class="col-sm-8">
						<table class="table table-borderless">
							<tr><td>First Name :</td><td><?php echo $r["First_Name"];?></td></tr>
							<tr><td>Last Name :</td><td><?php echo $r["Last_Name"];?></td></tr>
							<tr><td>DOB:</td><td><?php echo $r["Date_of_Birth"];?></td></tr>
							<tr><td>Gender:</td><td><?php echo $r["Gender"];?></td></tr>
							<tr><td>Caste :</td><td><?php echo $r["Caste"];?></td></tr>
							<tr><td>Religion :</td><td><?php echo $r["Religion"];?></td></tr>
							<tr><td colspan=2 align=center><button class="btn btn-dark" id="<?php echo $r["code"]; ?>">Full Profile</button></td></tr>
						</table>
						<div class="col-sm-12"><br><br></div>
					</div>
					
					
				
					<?php
			}	
		}
	}
	else{
		header("location:front_page.php");
	}
?>