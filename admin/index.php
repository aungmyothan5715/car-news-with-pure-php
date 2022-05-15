<?php
include("confs/admin_auth.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Article List for Admin Page</title>

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
				<a href="#" class="navbar-brand" id="admin-dash"> Adminstration Dashboard </a>
				<button id="toggler" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
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
						<li class="nav-item" id="Authentication">
						    <a class="nav-link text-success" href="contact_us.php">Contact</a>
						</li>

						<li class="nav-item" id="Authentication">
						    <a class="nav-link text-success" href="about.php">About</a>
						</li>

						<li class="nav-item" id="Authentication">
						    <a class="nav-link text-success" href="logout.php">Logout</a>
						</li>

						<li class="nav-item" id="Authentication">
						    <a class="nav-link text-success" href="new_article.php">Create new article</a>
						</li>
	            	</ul>
			    </div>


                <!-- Right Side Of Navbar -->
			    <ul class="navbar-nav ml-auto" id="user-auth">

						 <!-- For Authenticated User -->
						<li class="nav-item">
							<a class="nav-link" id="user-profile" data-bs-toggle="modal" data-bs-target="#user-profile-detail">
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

	</div> <!--End Sticky navbar -->

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

            <?php 
            	include("confs/config.php" );
            	$result = mysqli_query($conn, "SELECT * FROM about_cars ORDER BY about_cars.created_date DESC");
            ?>

            <?php while($row = mysqli_fetch_assoc($result)) : ?>

			<div class="post col-sm-3 p-0 mt-1 mb-1 bg-dark text-light">
				<div class="card-body">
					<h5 class="card-title"><?php echo $row['title'];?></h5>
					<div class="card-subtitle mb-2 text-mutted small">
						
						<a class="card-link shadow-sm p-1 mt-2 mb-1" href="article_detail_admin.php?articleId=<?php echo $row['id']; ?> ">[ View ]</a>
						<a class="card-link shadow-sm p-1 mt-2 mb-1" href="edit_article.php?Id=<?php echo $row['id']; ?>">[ Edit ]</a>
						<a class="card-link shadow-sm p-1 mt-2 mb-1" id="delete_link" data-bs-toggle="modal" data-bs-target="#delete_modal" href="">
							[ Delete ]
						</a>
					</div>

					<img src="covers/<?php echo $row['image'] ?>" class="card-img" style="width:100%;height:100%;">

					<p class="card-text">
						<?php echo $row['excerpt']; ?>
					</p>
				</div>
			</div>
			
					<!-- Modal for Delete Confrim box  -->
			<div class="modal fade" id="delete_modal">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title m-auto">Confirm?</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body justify-content-center">
									<h6 class="text-center">Are you sure to delete this post?</h6>
								
									<a class="btn btn-danger"
									 href="delete_article.php?id=<?php echo $row['id']; ?>">
									Delete
									</a>
								</div>
								
							</div>
						</div>
					</div>
			<?php endwhile; ?>

		</div> <!-- End row to show Article list -->
			
	</div>

	
		
	<div class="footer bg-dark" style="width:100%;line-height:50px;color:white;text-align:center;margin:0px;padding:3px">
		<p>Copyright:2021, Develop by Team.</p>
	</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$("#user-profile").click(function(){
				$("#user-profile-detail").show();
			});

			$("#delete_link").click(function(){
				$("#delete_modal").show();
			});

		});
	</script>


</body>
</html>