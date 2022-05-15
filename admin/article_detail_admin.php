<?php
include("confs/admin_auth.php");
?>
<?php
include("confs/config.php");
if(isset($_GET['articleId'])){
	$id = $_GET['articleId'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Article Details for Admin page</title>


<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="../css/style.css">

<style type="text/css">
	a#admin-dash{
		margin-left:5px;
		font-family:fantasy;
		font-weight:bold;
		font-style: italic;
	}
	a#admin-dash:hover{
		color: purple;
	}
</style>
</head>
<body>

	<div class="sticky" id="navbar">
		<nav class="navbar navbar-expand-md navbar-dark bg-dark text-light shadow-sm">
			<div class="container">
				<a href="index.php" class="navbar-brand" id="admin-dash">Adminstration Dashboard</a>
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


                <!-- Right Side Of Navbar -->
			    <ul class="navbar-nav ml-auto" id="user-auth">

						 <!-- For Authenticated User -->
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


			</div> <!-- Container for navbar -->
	    </nav>

	</div> <!-- End Sticky nav -->


	    			<!-- Modal for User Profile Detail -->

	<div class="modal fade" id="user-profile-detail">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title m-auto">User Profile Detail</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<img src="default_cover/default.jpg" class="d-block mx-auto"
							 style="border:3px solid purple;border-radius: 50%;height:150px;width:150px;margin-bottom: 7px;">
							 <h5 class="text-center" style="margin-bottom:15px;">Aung Myo Than</h5>
							<ul class="list-group">
								<li class="list-group-item text-mutted"> User Role:: Manager </li>
								<li class="list-group-item text-mutted"> Live:: Yangon </li>
								<li class="list-group-item text-mutted"> Edu:: Graduated</li>
								<li class="list-group-item text-mutted"><a href="logout.php">Logout</a></li>
							</ul>
						</div>
								
				</div>
		</div>
	</div>



<!-- <div class="carousel slide p-3 shadow-sm bg-light" id="carouselExampleControls" data-bd-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="image/p3.jpg" class="d-block" alt="" style="width:100%;height:300px">
			</div>
		</div>
	</div>
-->

	<div class="container shadow-sm" id="container" style="">
		<div class="row">

			<div class="col-md-7 m-auto">

				<?php include("confs/config.php"); ?>

				<?php 
					if(isset($_GET['articleId'])){
					$id = $_GET['articleId'];
					$result = mysqli_query($conn, "SELECT * FROM about_cars WHERE id = $id ");
					$row = mysqli_fetch_assoc($result);

			        }
			    ?>
			
				<div class="post-detail mb-2 p-3 m-0 bg-dark text-light scrolled">
					<div class="card-body">
						<h5 class="card-title"> <?php if(isset($row['title'])){ echo $row['title']; } ?> </h5>
						<div class="card-subtitle mb-2 text-mutted small">
							<?php if(isset($row['created_date'])){ echo $row['created_date']; } ?>
						</div>
						<?php if(isset($row['image'])): ?>
						<img src="covers/<?php echo $row['image']; ?>" class="card-img mb-2" style="width:100%;height: 100%;">
						<a class="d-flex justify-content-center align-items-center" href="img_detail.php?imgId=<?php echo $row['id']; ?>">
							Image details >>>
						</a>
						<?php endif; ?>
						<br>

						<p class="card-text" style="text-align:justify"> <?php if(isset($row['body'])){ echo $row['body']; } ?> </p>

					</div>
				</div>
				<!-- This is for Article Detail's Comment -->

				<div class="comment p-3 m-0 bg-dark text-light">
					<div class="card-body">
						<div class="form-group">
							<div class="form-control">
								By <b>Alice:</b>	
								<i class="small">1min ago</i>
								<p class="mb-3 small"> This is my first comment.</p>
								<br>
								By <b>John:</b>	
								<i class="small">2min ago</i>
								<p class="mb-3 small"> It is so cool.</p>
								<br>
								By <b>Bob:</b>	
								<i class="small">3min ago</i>
								<p class="mb-3 small"> This is my first comment too.</p>
								<br>

							</div>
						</div>
						<h6 class="card-title mt-3">Write Comment...</h6>
						<form>
							<input type="hidden" name="article_id" id="article_id" value="article_detail_admin.php?articleId=<?php echo $row['id'];?>">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" class="form-control" required="required name" placeholder="Enter name...">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" id="email" class="form-control" required="required email" placeholder="Enter you email...">
							</div>
							<div class="form-group">
								<label for="comment">Comment</label>
								<textarea class="form-control" name="comment" id="comment"></textarea>
							</div>
							<br>
							<button class="btn btn-warning" type="submit" name="comment-submit" id="comment-submit">Add Comment</button>
						</form>
					</div>
				</div>


			</div> <!-- End Col md-6 to show Article Detail -->

			<div class="col-md-5 m-0 p-1 bg-dark text-light shadow-sm" style="margin-top: 6px;">
				<h4 class="title mb-3 mt-3 text-center">Latest Post</h4>
				<?php 
				include("confs/config.php");
				$sql = mysqli_query($conn, "SELECT * FROM about_cars ORDER BY about_cars.created_date DESC LIMIT 7");
				?>

				<?php while( $all = mysqli_fetch_assoc($sql)) : ?>
				<p style="text-align:justify-content;"> >
					<a href="article_detail_admin.php?articleId=<?php echo $all['id']; ?>" class="card-link p-2 mb-3" style="text-align:justify">
						<?php echo $all['excerpt']; ?> 
					</a>
				</p><br>
				<?php endwhile; ?>


				<div class="about shadow-sm">
					<div class="card-body text-center">
						<h5 class="card-title"><a href="#"> About </a></h5>
						<p class="card-text" style="text-align:justify;padding:3px;">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					</div>	
				</div>
				<br>
				<div class="contact-us shadow-sm">
					<div class="card-body text-center">
						<h5 class="card-title"><a href="#"> Contact Us </a></h5>
						<p class="card-text" style="text-align:justify;padding:3px;">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					</div>	
				</div>

			</div>
		</div> <!-- End row to show Article Detail -->
	</div>

	<div class="footer bg-dark" style="width:100%;line-height:75px;color:white;text-align:center;margin:0px;padding:3px">
		<p> Copyright: <?php echo date("Y"); ?>, Develop by Team. </p>
	</div>
	
</body>
</html>