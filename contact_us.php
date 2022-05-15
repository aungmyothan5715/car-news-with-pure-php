<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">

	#contact_us{
		margin-top: 45px;
		margin-bottom: 45px;
		color: #ffffff;
		background-color: #c1c1c1c1;
		padding: 15px;
		border-radius: 5px;
	}
	#contact_us h3.form, p.form, label{
		font-style: italic;
		font-family: cursive;;
	}
	textarea{
		height: 150px;
	}
</style>
</head>
<body>

	<div class="sticky" id="navbar">
		<nav class="navbar navbar-expand-md navbar-dark bg-dark text-light shadow-sm">
			<div class="container">
				<a href="index.php" class="navbar-brand" id="logo">Car News</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
					<span class="navbar-toggler-icon"></span>
				</button>
		

	            <div class="collapse navbar-collapse" id="navbarSupportedContent">
	            	<!-- Left Side Of Navbar -->
	            	<ul class="navbar-nav mr-auto" id="nav">
	            		<li class="nav-item">
	            			<a class="nav-link text-success" href="index.php">Home</a>
	            		</li>
	            		<li class="nav-item">
	            			<a class="nav-link text-success" href="services.php">Services</a>
	            		</li>

	            		 <!-- Authentication Links -->
						<li class="nav-item">
							<a class="nav-link text-success" href="contact_us.php">Contact</a>
						</li>

						<li class="nav-item">
							<a class="nav-link text-success" href="about.php">About</a>
						</li>
	            	</ul>
			    </div>


                <!-- Right Side Of Navbar 
			    <ul class="navbar-nav ml-auto" id="user-auth">

						  For Authenticated User 
						<li class="nav-item">
							<a id="user-profile" class="nav-link" data-bs-toggle="modal" data-bs-target="#user-profile-detail">
								<span class="caret">
									<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
									</svg>
								</span>
							</a>
						</li>
		
				</ul>
				-->


			</div> <!-- Container for navbar -->
	    </nav>




	</div> <!--End Sticky navbar -->

	<?php

include("admin/confs/config.php");
if(isset($_POST['submit'])){
	$email  = $_POST['email_address'];
	$suggestion  = $_POST['suggestion'];
	$success_msg = "";

	$sql = "INSERT INTO contact_us ( email, suggestion, created_date, modified_date) VALUES ( '$email', '$suggestion', now(), now())";
	mysqli_query($conn, $sql);
	if($conn){
		$success_msg = "Your suggestion was sent successfully.";
	}
}

?>


	<div class="container">
		<div class="row justify-content-center">
			<form action="" method="post" class="col-md-6" id="contact_us">
				<h3 class="text-center form">Contact Me</h3>
				<p class="text-center form">Contact Our site what you want to say anythings and suggestion.</p>
				<?php
				if(isset($success_msg)) : { ?>
					<p class="bg-success text-light p-3">
						<?php echo $success_msg; ?> 
						<a href="index.php" style="list-style-type:none;text-decoration:none;color:blue;">
							Back to home <<<
						</a>
					</p>
				
				<?php } endif; ?>
				<div class="form-group">
					<label for="email">Your email</label>
					<input type="email" name="email_address" class="form-control" required="required" placeholder="Enter your email...">
				</div>
				<br>
				<div class="form-group">
					<label for="suggestion">Your suggestion...</label>
					<textarea name="suggestion" class="form-control" required="required" placeholder="Write somethings....."></textarea>
				</div>
				<br>
				<input type="submit" name="submit" value="Submit" class="form-control bg-primary text-light">
			</form>
		</div>
	</div>


	<div class="footer bg-dark" style="width:100%;line-height:50px;color:white;text-align:center;margin:0px;padding:3px">
		<p>&copy; <?php echo date("Y") ?>. All right reserved.</p>
	</div>

</body>
</html>