<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body>

	<h1 class="text-center text-white">Contact Us</h1>
	<?php
	include("confs/config.php");

	$result = mysqli_query($conn, "SELECT * FROM contact_us");
	
	?>

	<div class="container">
		<div class="table-reponsive text-white">
			<table class="table talbe-striped table-hover table-bordered text-center text-white">
				<thead>

					<tr>
						<th>Id</th>
						<th>Email</th>
						<th>Suggestion</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
					while($row = mysqli_fetch_assoc($result)) :
					?>
					<tr>

						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['suggestion']; ?></td>
						<td>
							<a href="#">
								[ Delete ]
							</a>
							<a href="#">[ Reply ]</a>
						</td>
					</tr>

					<?php endwhile; ?>
					
				</tbody>
			</table>
		</div>
	</div>

</body>
</html>