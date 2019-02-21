<?php
	include('db.php');
	session_start();
	if (isset($_SESSION['username']) && isset($_SESSION['trn_date'])) {
		$username = $_SESSION['username'];
		
		}
?>
<html>
<head>
	<title>Navigation</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery first, then Tether, then Bootstrap JS. -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!-- zbog gornjeg linka ajax nije htio raditi, bio je .slim.min.js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.
	js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<!-- Main CSS -->
	<link rel="stylesheet" href="main.css" type="text/css">
</head>
<body>
<div class="row">
<nav class="shadow navbar navbar-default navbar-fixed-top navbar-reverse color-c" id="nav" role="navigation">
	<div class="container-fluid sjena">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">TADb</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
        <li class=""><a href="index.php">Home</a></li>
        <li><a href="news.php">News</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Games <span class="caret"></span></a>
          <ul class="dropdown-menu color-a" role="menu">
            <li><a href="thrones.php">Thrones of Britannia</a></li>
			<li class="divider"></li>
            <li><a href="warhammer.php">Warhammer</a></li>
			<li class="divider"></li>
			<li><a href="attila.php">Attila</a></li>
			<li class="divider"></li>
			<li><a href="romeii.php">Rome II</a></li>
          </ul>
        </li>
    </ul>
<?php
	if (isset($_SESSION['username'])) {?>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="profile.php">Welcome: <?php echo $username ?></a></li>
			<li><a href="logout.php">Log Out</a></li>
		</ul>
	<?php } else { ?>
			<ul class="nav navbar-nav navbar-right">
            <li class="dropdown shadow">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Register <span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-lr animated flipInX color-a" role="menu" style="width: 300px;">
                    <div class="col-lg-12">
                        <div class="text-center"><h3><b>Register</b></h3></div>
						<form id="register-form" action="register.php" method="post" role="form" autocomplete="off">
							<div class="form-group">
								<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
							</div>
							<div class="form-group">
								<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
							</div>
							<div class="form-group">
								<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-xs-6 col-xs-offset-3">
										<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-info" value="Register Now">
									</div>
								</div>
							</div>
                            <input type="hidden" class="hide" name="token" id="token" value="7c6f19960d63f53fcd05c3e0cbc434c0">
						</form>
                    </div>
                </ul>
            </li>
            <li class="dropdown shadow">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Log In <span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-lr animated slideInRight color-a" role="menu" style="width: 300px;">
                    <div class="col-lg-12">
                        <div class="text-center"><h3><b>Log In</b></h3></div>
                        <form id="login-form" action="login.php" method="post" role="form" autocomplete="off">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-7">

                                    </div>
                                    <div class="col-xs-5 pull-right">
                                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-success" value="Log In">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">

                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="hide" name="token" id="token" value="a465a2791ae0bae853cf4bf485dbe1b6">
                        </form>
                    </div>
                </ul>
            </li>
        </ul>
		<?php } ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
<script>
	$(document).ready(function() {
	   $(".nav li.disabled a").click(function() {
		 return false;
	   });
	});
</script>
</body>
</html>