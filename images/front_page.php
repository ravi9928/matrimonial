<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <script src="https://kit.fontawesome.com/5dc79dff6a.js" crossorigin="anonymous"></script>
  
  <script>
     $(document).ready(function(){
		 $("a").click(function(){
		    v=$(this).text();
			if(v=="Login" || v=="Registration"){
			 $.post(
                "login.php",{rec:v},function(data){
					$("#record").html(data);  
					
			 });
			}
			
		 });
	 
	 });
  </script>
  
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#"><img src="images/mat_l.jpg" style="width:70px;height:50px"></a>
 
  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar"> 
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"> About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contacts</a>
      </li>
    </ul>
 </div>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" style="cursor:pointer">Login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="cursor:pointer">Registration</a>
    </li>
  </ul>
 </nav>
 
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-8" id="record">
	  <div id="demo" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
		  <ul class="carousel-indicators">
			<li data-target="#demo" data-slide-to="0" class="active"></li>
			<li data-target="#demo" data-slide-to="1"></li>
			<li data-target="#demo" data-slide-to="2"></li>
		  </ul>

		  <!-- The slideshow -->
		  <div class="carousel-inner">
			<div class="carousel-item active">
			  <img src="images/mat1.jpg" class="image-fluid">
			</div>
			<div class="carousel-item">
			  <img src="images/mat2.jpg" class="image-fluid">
			</div>
			<div class="carousel-item">
			  <img src="images/mat3.jpg" class="image-fluid">
			</div>
		  </div>

		  <!-- Left and right controls -->
		  <a class="carousel-control-prev" href="#demo" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		  </a>
		  <a class="carousel-control-next" href="#demo" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		  </a>

		</div>
    </div>
	<div class="col-sm-4"><img src="images/mat_l.jpg" style="width:430px;height:600px"></div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
  <div class="col-sm-12">
	<center></i><h2 style="color:#0E3C92;margin-top:50px">Find your Special Someone</h2></center>
	</div>
  </div>
  <div class="row"style="margin-top:30px">
    <div class="col-sm-1"></div>
	<div class="col-sm-3"><center><i class="fas fa-user-plus" style="font-size:100px;color:#2EC1D1"></i><h3 style="color:#28D7B4">Sign Up</h3>Register for free & put up your Profile</center></div>
	<div class="col-sm-4"><center><i class="fas fa-handshake" style="font-size:100px;color:#2EC1D1"></i><h3 style="color:#28D7B4">Connect</h3>Select & Connect with Matches you like Interact</center></div>
	<div class="col-sm-3"><center><i class="fas fa-comments-dollar" style="font-size:100px;color:#2EC1D1"></i><h3 style="color:#28D7B4">Interact</h3>Become a Premium Member & Start a Conversation</center></div>
    <div class="col-sm-1"></div>
  </div>
</div>
<!--card-->
<div class="container-fluid" style="background-color:#C1C0BF;margin-top:50px">
  <div class="row">
    <div class="col-sm-12">
	<center></i><h2 style="color:#0E3C92">6 Million Success Stories & Counting</h2></center>
	</div>
  </div>
  <div class="row" style="margin-top:30px;background-color:#C1C0BF">
    <div class="col-sm-4">
     <div class="card">
	   <div class="card-header"><h5 style="color:#28D7B4">Shweta & Rajiiv</h5></div>
	   <div class="card-body"><img src="images/c1.jpg" class="card-img-top"></div>
	   <div class="card-footer">
        <p class="card-text">I made profile on shaadi.com in pursuit to find my perfect match. So, I connected with Sweta. We talked to each other to know the compatibility, likes and experience.  who is passionate about her career</p>
	  </div>
	 </div>
	</div>
	<div class="col-sm-4">
     <div class="card">
	   <div class="card-header"><h5 style="color:#28D7B4">Mohit & Priyanka</h5></div>
	   <div class="card-body"><img src="images/c2.jpg" class="card-img-top"></div>
	   <div class="card-footer">
        <p class="card-text">They say that matches are made in heaven and you will find them when it's the right time ! I believed the same and joined Shaadi.com. I was looking for a partner who is passionate about her career...</p>
	   </div>
	 </div>
	</div>
	<div class="col-sm-4">
     <div class="card">
	  <center>
	   <div class="card-header"><h5 style="color:#28D7B4">Vivek & Anubhuti</h5></div>
	   <div class="card-body"><img src="images/c3.jpg" class="card-img-top"></div>
	   <div class="card-footer">
	   <p class="card-text">Our parents talked over Shaadi.com after we mutually liked each other, that was the first step towards our success story & we are very thankful for such a wonderful concept Shaadi.com has...</p>
	   </div>
	   </center>
	 </div>
	</div>
  </div>
</div>

<div class="container-fluid" style="margin-top:50px">
  <div class="row">
    <div class="col-sm-12" style="background-color:#E3391C;color:white">
	<center style="margin-top:20px"><h3>Your story is waiting to happen!&nbsp;&nbsp<button class="btn btn-danger" style="border:double">Get Started</button></center></h3>
	
	</div>
  </div>
</div>
<br><br>
The World's No.1 Matrimonial Service
Search by City, Profession & Community
</body>
</html>
