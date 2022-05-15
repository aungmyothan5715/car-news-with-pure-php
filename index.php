<!DOCTYPE html>
<html>
<head>
	<title>Article List for User</title>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


<style type="text/css">

	body{
		background-color:gray;
	}
	#container{

		background-color: gray;

	}
	
	div.sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
		width: 100%;
		display: block;
		transition: top 0.3s;
        padding: 0px;
        width: 100%;
        background-color: #ffffff;
         
    }
    #logo{
    	margin-left:0px;
    	font-size: 25px;
    	font-family:fantasy;
    	font-style: italic;
    }
    #logo:hover{
    	color: blue;

    }
    div.collapse ul{
    	text-align: center;
    	margin-left: 30px;
    }
    div.collapse ul li{
    	margin-right: 20px;
    	font-style: italic;
    	font-family: fantasy;
    }

    div.collapse ul li:hover{
    	border-bottom:1px solid gray;
    	
    }

    @media(max-width:900px){

    	div.sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
		width: 100%;
		display: block;
		transition: top 0.3s;
        padding: 0px;
        width: 100%;
        background-color: #ffffff;
         
    	}

    	#user-auth{
    		display: none;
    	}
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
  
	<div class="container shadow-sm" id="container" style="">
		<div class="row" style="margin-top:15px;">
			<?php 
			include("admin/confs/config.php");
			$result = mysqli_query($conn, "SELECT * FROM about_cars ORDER BY about_cars.created_date DESC");

			?>
			<?php while( $row = mysqli_fetch_assoc($result)):   ?>
			<div class="col-sm-3 p-0 mt-1 bg-dark text-light">
				<div class="card-body">
					<h5 class="catd-title"></h5>
					<div class="card-subtitle mb-2 text-mutted small">
						<!-- Output date and time <?php echo $row['created_date'] ?> -->
					</div>

					<img src="admin/covers/<?php echo $row['image']; ?>" class="card-img" style="width:100%;height:100%;">

					<p class="card-text">
						<?php echo $row['excerpt'] ?>
					</p>

					<a class="card-link" href="article_detail.php?Id=<?php echo $row['id']; ?>">More Details</a>
					
				</div>
			</div>
			<?php endwhile; ?>

		</div> <!-- End row to show Article list -->
		<hr>

		<div class="row" style="margin-bottom: 15px;">
			
				<div class="about col-md-6 bg-dark text-light">
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
				<div class="contact-us col-md-6 bg-dark text-light">
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
			
	</div>

	<div class="footer bg-dark" style="width:100%;line-height:50px;color:white;text-align:center;margin:0px;padding:3px">
		<p>&copy; <?php echo date("Y") ?>. All right reserved.</p>
	</div>


	<script type="text/javascript">
		
		$(document).ready(function(){
			$("#user-profile").click(function(){
				$("#user-profile-detail").show();
			});
		});


		function editBtn(id){
			console.log(id);
		}

	</script>
	

</body>
</html>