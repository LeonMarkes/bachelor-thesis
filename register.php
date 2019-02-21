<?php
	require('db.php');
	if (isset($_REQUEST['username'])) {
		$username = stripslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($con,$username);
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		$trn_date = date("Y-m-d H:i:s");
		$result = mysqli_query($con,"INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')");
		if ($result) {
			header("Location: index.php");
		}
		else {
			echo "Please try to register again.";
		}
	}
?>