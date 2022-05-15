<?php


echo "Hello, I am Register Process .." . "<br><br>";

if(isset($_POST['register'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$role = $_POST['role'];

	echo $name . "<br>" . $email . "<br>" . $password . "<br>" . $role;
}




?>