<?php
	require('db.php');
	session_start();
	if (isset($_POST['username'])) {
		$username = stripslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($con,$username);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		$query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$trn_date = "SELECT trn_date FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
		if ($rows == 1) {
			$_SESSION['username'] = $username;
			$_SESSION['trn_date']= $trn_date;
			header("Location: index.php");
		} else {
			echo "Incorrect username or password, please try again.";
		}
	}
?>