<!DOCTYPE html>
<html>
<head>
	<title>Admin Login From Page</title>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<style type="text/css">
	body{
		background-color: gray;
	}
	.container{
		margin: ;
		background-color: ;

	}
	#wrap{
		margin: 75px auto;
		background-color: #fff;
		padding: 25px;
	}

</style>

</head>
<body>

	<div class="container m-auto">
		<div class="wrap col-sm-5" id="wrap">
			
			<form action="register_process.php" method="post">
				<h4 class="title m-2 p-2 text-center" id="title">Admin Register</h4>
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="role">Role</label>
					<input type="text" name="role" id="role" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="Profile">Profile Iamge</label>
					<input type="file" name="profile_image" id="profile_image" class="form-control">
				</div>
				<br>
				<input type="submit" name="register" id="submit" class="btn btn-primary form-control" value="Register">
				<br>
			</form>
			<p class="card-text ml-0 mt-1 p-2"><i> If you have already account? </i><a class="card-link" href="login.php">Login</a></p>
		</div>
	</div>

</body>
</html>