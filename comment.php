<?php

include("admin/confs/config.php");

if(isset($_POST['comment_submit'])){
	$article_id = $_POST['article_id'];
	$name       = $_POST['name'];
	$email      = $_POST['email'];
	$comment    = $_POST['comment'];

$sql = "INSERT INTO comment_tbl (article_id, name, email, comment,created_date, modified_date) VALUES ( '$article_id', '$name', '$email', '$comment', now(), now())";
mysqli_query($conn, $sql);
header("location:article_detail.php?Id=$article_id");

	/*
	echo $article_id . "<br>";
	echo $name . "<br>";
	echo $email . "<br>";
	echo $comment . "<br>";
	*/
}

?>