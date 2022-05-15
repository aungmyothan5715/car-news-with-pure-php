<?php
include("admin/confs/config.php");
if(isset($_GET['Id'])){
	$id = $_GET['Id'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Article Details</title>


<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="css/style.css">

<style type="text/css">
	div.collapse ul{
        text-align: center;
        margin-left: 30px;
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
	            			<a class="nav-link text-success" href="Services.php">Services</a>
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
							<ul class="side-nav shadow-sm m-3 p-3">
								<li class="navl-link shadow-sm p-2 m-auto"> User Role:: Manager </li>
								<li class="nav-link shadow-sm p-2 m-auto"> Live:: Yangon </li>
								<li class="nav-link shadow-sm p-2 m-auto"> Edu:: Graduated</li>
								<li class="nav-link shadow-sm p-2 m-auto"> Logout</li>
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

	<div class="container shadow-sm" id="container" style="background-color:gray;margin-top:15px;">
		<div class="row" style="margin-bottom:15px;">

			<div class="col-md-7 m-auto">

				<?php include("admin/confs/config.php"); ?>

				<?php 
					if(isset($_GET['Id'])){
					$id = $_GET['Id'];
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
						<img src="admin/covers/<?php echo $row['image']; ?>" class="card-img mb-2" style="width:100%;height: 100%;">
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
							<div class="form-control rounded">
								<h6 class="card-title mt-1 mb-3">Your comment is here...</h6>

								<?php 
								include("admin/confs/config.php");
								$comment_sql = mysqli_query($conn, "SELECT * FROM comment_tbl
								WHERE article_id = $id
								ORDER BY comment_tbl.created_date DESC LIMIT 5");
								?>

								<?php while($comment_row = mysqli_fetch_assoc($comment_sql)) : ?>

								By <b><i> <?php echo $comment_row['name']; ?> </i> :</b>	
								<i class="small"></i>
								<p class="mb-1 small"> <?php echo $comment_row['comment']; ?> </p>
								<br>
								<?php endwhile; ?>

							</div>
						</div>
						<p class="mt-3"><i>Your email will not be public.</i></p>
						<h6 class="card-title">Write Comment...</h6>
						<form action="comment.php" method="post">
							<input type="hidden" name="article_id" id="article_id" class="form-control" value="<?php echo $row['id']; ?>">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" class="form-control" required="required name" placeholder="Enter your name...">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" id="email" class="form-control" required="required email" placeholder="Enter your email...">
							</div>
							<div class="form-group">
								<label for="comment">Comment</label>
								<textarea class="form-control" name="comment" id="comment" placeholder="Somethings write..." required="required text"></textarea>
							</div>
							<br>
							<button class="btn btn-warning" type="submit" name="comment_submit" id="comment_submit">Add Comment</button>
						</form>
					</div>
				</div>


			</div> <!-- End Col md-6 to show Article Detail -->

			<div class="col-md-5 m-0 p-3 bg-dark text-light shadow-sm" style="margin-top: 6px;">
				<h4 class="title mb-3 mt-3 text-center"><i> Latest Post </i></h4>
				<?php 
				include("admin/confs/config.php");
				$sql = mysqli_query($conn, "SELECT * FROM about_cars ORDER BY about_cars.created_date DESC LIMIT 7");
				?>

				<?php while( $all = mysqli_fetch_assoc($sql)) : ?>
				<p style="text-align:justify-content;"> >
					<a href="article_detail.php?Id=<?php echo $all['id']; ?>" class="card-link p-2 mb-3" style="text-align:justify">
						 <?php echo $all['excerpt']; ?> 
					</a>
				</p><br>
				<?php endwhile; ?>
				<hr>

				<div class="about">
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
				<div class="contact-us">
					<div class="card-body text-center">
						<h5 class="card-title"><a href="contact_us.php"> Contact Us </a></h5>
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

	<div class="footer bg-dark" style="width:100%;line-height:50px;color:white;text-align:center;margin:0px;padding:3px">
		<p style="font-size:15px;">&copy; <?php echo date("Y") ?>. All right reserved.</p>
	</div>
	
</body>
</html>