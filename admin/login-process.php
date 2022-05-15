<?php
session_start();
include("confs/config.php");

if(isset($_POST['login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = mysqli_query($conn, "SELECT * FROM admin_login_tbl");
	$row = mysqli_fetch_assoc($sql);
	$tbl_email = $row['email'];
	$tbl_pass = $row['password'];

	if($email == $tbl_email && $password == $tbl_pass){
		$_SESSION['Admin'] = $row['role'];
		header("location: index.php");
	}else{
		echo "Somethings was wrong!";
	}


}





?>