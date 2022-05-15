<?php

include("confs/config.php");

if(isset($_POST['submit'])){
	$id = $_POST['id'];
	$title = $_POST['title'];
	$excerpt = $_POST['excerpt'];
	$body = $_POST['body'];
	$cover = $_FILES['cover'] ['name'];
	$tmp = $_FILES['cover'] ['tmp_name'];
	$type = $_FILES['cover'] ['type'];

	if($cover) {
		move_uploaded_file($tmp, "covers/$cover");
		$sql = "UPDATE about_cars SET title = '$title', excerpt = '$excerpt', body = '$body', image = '$cover', modified_date = NOW() WHERE id = $id ";
	}else{

		$sql = "UPDATE about_cars SET title = '$title', excerpt = '$excerpt', body = '$body', image = '$cover', modified_date = NOW() WHERE id = $id ";
	}

	mysqli_query($conn, $sql);
	header("location: article_list.php");
}




?>