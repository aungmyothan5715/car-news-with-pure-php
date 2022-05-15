<?php

include("confs/config.php");
if(isset($_GET['id'])){
	$id = $_GET['id'];

	$sql = "DELETE FROM about_cars WHERE id=$id";
	mysqli_query($conn, $sql);
	header("location: index.php");
}

?>