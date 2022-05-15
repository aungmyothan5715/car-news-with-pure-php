<?php

include("confs/admin_auth.php");
include("confs/config.php");

if(isset($_POST['submit'])){
	
	$title = $_POST['title'];
	$excerpt = $_POST['excerpt'];
	$body = $_POST['body'];
	$cover = $_FILES['cover'] ['name'];
	$tmp = $_FILES['cover'] ['tmp_name'];
	$type = $_FILES['cover'] ['type'];

	if($cover) {
		move_uploaded_file($tmp, "covers/$cover");
	}

	$sql = " INSERT INTO about_cars ( title, excerpt, body, image, created_date, modified_date) VALUES ( '$title', '$excerpt', '$body', '$cover', now(), now() )";

	mysqli_query($conn, $sql);
	header("location: index.php");


}



?>