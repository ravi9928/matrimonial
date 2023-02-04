<?php
	if(isset($_COOKIE["login"])){
		include("db.php");
		?> 
		<div class="col-sm-12" id="palert"><br></div>
		<div class="col-sm-12"><br><h3 style="color:red"><b>Password:<b></h3></div>
		<div class="container">
		    <div class="row">
				<div class="col-sm-12">
				<label>New Password:-</label><br>
				<input type="password" class="form-control" id="np" required><br>
				<label>Re-type New Password:-</label><br>
				<input type="password" class="form-control" id="rp" required><br>
				<button type="button" class="btn btn-success">Change</button><br><br><br>
				</div>
			</div>
		</div>
		
		<?php
	}
		
		?>