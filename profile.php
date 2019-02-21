<!DOCTYPE html>
<html lang="en">
<head>
	<title>Total All Database</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- Main CSS -->
	<link rel="stylesheet" href="main.css" type="text/css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body class="bg">
	<div class="container container-fluid">
	
	<h1></h1>
<?php include("navigation.php"); ?>

	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
		<div class="shadow col-lg-6 col-md-6 col-sm-6 col-xs-12 well-a color-a" id="sadrzaj">
		<img src="img/new-user.jpg" style="width: 20%;"/>
		<form>
			<input type="file" onchange="readURL(this);" />
			<input type="submit" value="submit" />
		</form>
			<img id="slika" src="#" alt="Image" />
				<?php 
				$trn_date = $_SESSION['trn_date'];
				echo $trn_date; 
				?>
		</div>	
	</div>
	</div> 

<?php include("footer.php"); ?>
	<!-- jQuery first, then Tether, then Bootstrap JS. -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<script src="bg_img_fader.js"></script>
	<!-- Main JS -->
	<script src="js/main.js">		
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#slika')
						.attr('src', e.target.result)
						.width(150)
						.height(200);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}
	</script>
</body>
</html>		