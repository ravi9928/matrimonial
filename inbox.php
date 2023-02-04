
<?php
	if(isset($_COOKIE["login"])){
		include("db.php");
		$email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
		 
		$id=0;
		$n=2;
		if(isset($_REQUEST["num"])){
			  $id=intval($_REQUEST["num"]);
		}
		$start=$id*$n;
		$count=0;	
?>		
		<div class="row">
			<div class="col-sm-12"><b style="color:blue;font-size:30px;text-align:center">Inbox</b></div>
		<?php
		$rec=mysqli_query($conn,"SELECT * from inboxjq where to_email='$email' order by sn desc limit $start,$n " );
		  while($sm=mysqli_fetch_array($rec)){
					
			            $count++;
					    $femail=$sm[4];
						$fr=mysqli_query($conn,"SELECT * from matrial where Email='$femail'" );
						if($rf=mysqli_fetch_array($fr)){
						?>	
							
							<div class="col-sm-12"><br><br></div>
							<div class="col-sm-1"></div>
							   <div class="col-sm-3">
							       <center><img class="img-fluid" src="profile/<?php echo $rf["code"];?>.jpg"></center>
							   
							   </div>
							   <div class="col-sm-8" id="view_msg">
							       <h3 class="user-msg" id="<?php echo $rf["code"];?>" style="cursor:pointer"><?php echo $rf["First_Name"];?></h3>
								   <p><?php echo $sm["msg"];?></p>
								   <button class="w3-button w3-blue" rel="<?php echo $rf["code"];?>">Message/View Profile</button>
							   </div>
							   <div class="col-sm-12"><br><br></div>
							</div>
						<?php	
						}
						
		  }
		  if($count==$n){
			?>
				<div class="col-sm-12"><center><button class="w3-btn w3-blue" id="<?=($id+1)?>">Load More</button></center></div>
				
            <?php			
		  }
	}
	else{
		header("location:front_page.php");
	}
?>
