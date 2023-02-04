 <?php 
     
      include("db.php");
      $ur=mysqli_query($conn,"SELECT * from story ORDER BY RAND() limit  0,3");
	  while($sm=mysqli_fetch_array($ur)){
		?>
         <div class="col-sm-4">
     <div class="card">
	   <div class="card-header"><h5 style="color:#28D7B4"><?php echo $sm["cname"];?></h5></div>
	   <div class="card-body"><img src="story/<?php echo $sm["code"];?>.jpg" class="card-img-top"></div>
	   <div class="card-footer">
        <p class="card-text" id="r<?php echo $sm["code"];?>"><?php echo $sm["about"];?></p>
		 <a id="view_more" rel="<?php echo $sm["code"];?>" style="cursor:pointer;color:red">view more</a>
	  </div>
	 
	 </div>
	</div>
	 

        <?php		
	  }
	?>
	
     <div class="col-sm-12"><br></div>