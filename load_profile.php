<?php
   if(isset($_COOKIE["login"])){
	     include("db.php");
		  $email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
?>
<div class="col-sm-12"><center><h2 style="color:red"><b>Profile Matches</b></h2></center><br></div>
  
   <?php 
     
      
      $ur=mysqli_query($conn,"select * from matrial where Email<>'$email' ORDER BY RAND() limit 0,4");
	  while($rd=mysqli_fetch_array($ur)){
		?>
          <div class="col-sm-3">
		     <table class="table table-borderless w3-card">
			    <tr><td align="center"><img src="profile/<?php echo $rd["code"]; ?>.jpg" class="img-fluid"></td></tr>
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
			}
			?>
			</table>
		  
		  
		  </div>

        <?php		
	  }
	?>
	
     <div class="col-sm-12"><br><br></div>
	 
<?php
   }
 ?>