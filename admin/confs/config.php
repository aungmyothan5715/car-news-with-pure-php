<?php

$server_host = "localhost";
$server_name = "root";
$server_pass = "";
$db_name     = "car_new";

$conn = mysqli_connect($server_host, $server_name, $server_pass);
mysqli_select_db($conn, $db_name);

if(!$conn){
	echo "Database connection was failed.";
}

?>