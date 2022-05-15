<?php
include("confs/admin_auth.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Article</title>


<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="../css/style.css">
<style type="text/css">

	.container{
		margin: 0 auto;
	}

	#form-row{
		margin: 0 auto;
		margin-top: 1px;
		background-color: #c1c1;
	}
	#navbar-row{
		background-color: #c1c1c1;
		margin:0;
		padding: 0;
	}
	
	#label{
		font-weight: bold;
		font-size: 20px;
	}
	#body {
		height: 130px;
	}
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

	<nav class="navbar navbar-expend-sm navbar-dark bg-dark text-light shadow-sm">
					
		<div class="container-fluid">

			<a href="index.php" class="navbar-brand" id="admin-dash"> Adminstration Dashboard </a>

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

						
		</div>

	</nav>
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

	<div class="container">

		<div class="row shadow-sm" id="form-row">

			<?php  
			include("confs/config.php");

			if(isset($_GET['Id'])){
				$id = $_GET['Id'];
				$result = mysqli_query($conn, "SELECT * FROM about_cars WHERE id = $id");
				$row = mysqli_fetch_assoc($result);
			}

			?>

			<div class="col-sm-6 mt-3 mb-3 p-3 shadow-sm bg-light">
				<form action="update_article.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $row['id'] ?> ">
					<div class="form-group">
						<label for="title" id="label">Title</label>
						<input type="text" name="title" id="title" class="form-control" value="<?php if(isset($row['title'])){ echo $row['title']; }?>">
					</div>

					<div class="form-group">
						<label for="excerpt" id="label">Excerpt</label>
						<textarea name="excerpt" id="excerpt" class="form-control"><?php if(isset($row['excerpt'])){ echo $row['excerpt'];} ?></textarea>
					</div>

					<div class="form-group">
						<label for="body" id="label">Body</label>
						<textarea name="body" id="body" class="form-control"><?php if(isset($row['body'])){ echo $row['body']; } ?></textarea>
					</div>

					<div class="form-group">
						<label for="cover" id="label">Cover</label>
						<input type="file" name="cover" id="cover" class="form-control">
					</div>
					<br>

					<div class="form-group">
						<input type="submit" name="submit" id="submit" value="Update Article" class="btn btn-success form-control">
					</div>
				</form>
			</div>

			<div class="col-sm-6 ml-5 mt-3 mb-3 shadow-sm bg-light">
				
				<div class="post col-sm-10 p-3 m-auto bg-light">
					<div class="card-body">
						<h5 class="catd-title"><?php if(isset($row['title'])) { echo $row['title']; } ?></h5>

						<div class="card-subtitle mb-2 text-mutted small">
							<?php if(isset($row['created_date'])){ echo $row['created_date']; } ?>
						</div>

						<?php if(isset($row['image'])) : ?>
						<img src="covers/<?php echo $row['image']; ?>" class="card-img" style="width:100%;height:100%;">
						<?php endif; ?>

						<p class="card-text">
							<?php if(isset($row['excerpt'])){ echo $row['excerpt']; } ?>
						</p>

					</div>
				</div>
			</div>
			

		</div>


	</div>



	<script type="text/javascript">
		$(document).ready(function(){
			$("#user-profile").click(function(){
				$("#user-profile-detail").show();
			});
		});
	</script>

	

</body>
</html>