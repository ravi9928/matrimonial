<?php
	include("db.php");
	if(isset($_COOKIE["login"])){
		$email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
		$id=0;
		$n=2;
		if(isset($_REQUEST["num"])){
			  $id=intval($_REQUEST["num"]);
		}
		$start=$id*$n;
		$count=0;	?>
			<div class="col-sm-12"><b style="color:blue;font-size:30px;text-align:center">Favorite profiles</b></div>
			<?php
		$rm=mysqli_query($conn,"select * from favorites where email='$email' order by sn desc limit $start,$n ");
		while($r=mysqli_fetch_array($rm)){
			$count++;
			$code=mysqli_real_escape_string($conn,$r[2]);
			$rp=mysqli_query($conn,"select * from matrial where code='$code'");
			if($rs=mysqli_fetch_array($rp)){
			?>
			<div class="col-sm-12"><br></div>
			<div class="col-sm-4">
				<img src="profile/<?=$rs["code"]?>.jpg" class="img-fluid">
			
			</div>
			<div class="col-sm-8">
				<table class="table table-borderless">
					<tr><td>Name :<b><?php echo "   ".$rs["First_Name"]." ".$rs["Last_Name"];?></b></td></tr>
					<tr><td>Gender:<b><?php echo "  ".$rs["Gender"];?></b></td></tr>
					<tr><td class="strong" rel=<?php echo $r["code"];?>><button class="btn btn-info 112">View profile</button></td>
						<?php
				$code=$r["code"];
				$rt=mysqli_query($conn,"select * from favorites where code='$code' AND email='$email'");
				if($rq=mysqli_fetch_array($rt)){
					?>
					<td align="right"><i class="fa fa-heart" style="color:red" id="<?php echo $rq["code"];?>"></i></td>
				<?php
				}
				else{
					?>
					<td align="right"><i class="fa fa-heart" id="<?php echo $rq["code"];?>"></i></td>
				<?php
				}
				?></tr>
					
				</table>
			</div>
			<div class="col-sm-12"><br><br></div>
			<?php
			}
		}
		if($count==$n){
			?>
				<div class="col-sm-12"><center><button class="w3-btn w3-dark 1" id="<?=($id+1)?>">Load More</button></center></div>
				
            <?php			
		  }
    }
	else{
		header("location:index.php");
	}
 ?>