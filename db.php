<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "register";
$con = mysqli_connect($servername, $username, $password);
mysqli_select_db($con, $database);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
