<?php

$host_name = "localhost";
$user_name = "root";
$user_pass = "";
$db_name = "db_online_shop";

$conn = mysqli_connect($host_name, $user_name, $user_pass, $db_name);

if(!$conn) {
	die("Connection Error : " . mysqli_connect_error());
} else {
	// echo "Connection Successful.";
}


