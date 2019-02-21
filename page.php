<?php
if($_GET['id'] && $_GET['gm']) {
	switch($_GET['gm']) {
		case "warhammer":
		$game = "unit_cards_warhammer";
		$table = "warhammer_factions";
		$t = "warhammer_units";
		break;
		case "attila":
		$game = "unit_cards_attila";
		$table = "attila_factions";
		$t = "attila_units";
		break;
		case "romeii":
		$game = "unit_cards_romeii";
		$table = "romeii_factions";
		$t = "romeii_units";
		break;
		case "thrones":
		$game = "unit_cards_thrones";
		$table = "thrones_factions";
		$t = "thrones_units";
		break;
	}
	require('db.php');
	$title = ucwords(str_replace("_", " ", $_GET['id']));
	$result = mysqli_query($con, "SELECT DISTINCT " . $_GET['id'] . " FROM " . $table);
	$counter = 0;
	?>
	
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title; ?></title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- Main CSS -->
	<link rel="stylesheet" href="main.css?version=9" type="text/css" />
</head>
<body">
<!-- pogledaj JavaScript i jQuery u skripti na kraju ove stranice -->
<div id="divtoshow" class="hovercard" style="position: fixed;display:none;"></div>
<div></div>
	<div class="container container-fluid">
	<h1></h1>
	<div class="row">
	<?php include("navigation.php"); ?>
	</div>
	<div class="row">
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><div id="toggle" class="p-3 mb-2 color-b rounded shadow text-center">Show/hide faction info</div></div>
	<div class="shadow col-lg-6 col-md-8 col-sm-8 col-xs-12 well color-a" id="sadrzaj">
	<div class="row text-center">
	<h2><img class="" style="width: 8%;" id="<?php echo $_GET['id']; ?>" src="img/<?php echo $_GET['gm']; ?>/<?php echo $_GET['id']; ?>.png"/>     <?php echo $title; ?>   <img class="" style="width: 8%;" id="<?php echo $_GET['id']; ?>" src="img/<?php echo $_GET['gm']; ?>/<?php echo $_GET['id']; ?>.png"/> </h2><br /></div>
	
	<div id="info">
		<div class="row">
			<div class="col-lg-1 col-md-1"></div>
			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 color-b rounded well-a shadow">
				<?php
					$textFile = file_get_contents("text/" . $_GET['gm'] . "/" . $_GET['id'] . "/" . $_GET['id'] . ".txt");
					echo $textFile;
				?>
				<div class="text-center">
					<img src="text/<?php echo $_GET['gm']; ?>/<?php echo $_GET['id']; ?>/<?php echo $_GET['id']; ?>.png" class="img-rounded img-responsive centered" id="<?php echo $_GET['id']; ?>">
				</div>
			</div>
			<div class="col-lg-1 col-md-1"></div>
		</div>
	</div>
	<div class="row height"> </div>
	<div class="row">
		<div class="shadow table table-responsive color-b p-2 rounded">
		<?php 
			while ($row = mysqli_fetch_array($result)) {
					$result_sort = mysqli_query($con, "SELECT * FROM " . $t . " WHERE main_unit_key='" . $row[0] . "'");
					$row_a = mysqli_fetch_array($result_sort);
					if($row[0] == "null") {
						continue;
					}else{
						
						?>
			<div id="unit" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 unit-icon-crop">
				<span class="unit-text"><?php echo $row_a['soldiers']; ?></span>
				
				<img src="img/<?php echo $game; ?>/<?php echo $_GET['id']; ?>/<?php echo $row[0]; ?>.png" id="<?php echo $row[0]; ?>" alt="<?php echo $row[0]; ?>" data-panelid="<?php echo $_GET['gm']; ?>"  onmouseover="hoverdiv(event, 'divtoshow');" onmouseout="hoverdiv(event,'divtoshow')"/>
				
			</div>
					<?php
					}
				unset($row[0]);
			}
			?>
		</div>
	</div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" id="showstats"></div>
	</div>
	</div>
</div>
</div>
<?php include("footer.php"); ?>
	<!-- jQuery first, then Tether, then Bootstrap JS. -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!-- zbog gornjeg linka ajax nije htio raditi, bio je .slim.min.js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.
	js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<script src="bg_img_fader.js"></script>
	<!-- Main JS -->
<script>
$(document).ready(function(){
	
	$("div#toggle").click(function(){
		$("#info").toggle();
	});

	$("img").click(function(){
		var main_unit_key = $(this).attr('id');
		var gm = $(this).attr('data-panelid');
		$.ajax({
		url: 'show.php',
		data: { main_unit_key:main_unit_key, gm:gm },
		type: 'get',
		success:function(data){
		$("#showstats").html(data);
		},
		error:function(){
			alert("ERROR!!!");
		}
		});
	});
	
	$("img").hover(function(){
		var main_unit_key = $(this).attr('id');
		var gm = $(this).attr('data-panelid');
		$.ajax({
		url: 'hovercard.php',
		data: { main_unit_key:main_unit_key, gm:gm },
		type: 'post',
		success:function(data){
		$("#divtoshow").html(data);
		},
		error:function(){
			alert("ERROR!!!");
		}
		});
	});
});
	
	function hoverdiv(e,divid){
    var left  = e.clientX  + "px";
    var top  = e.clientY  + "px";
    var div = document.getElementById(divid);
    div.style.left = left;
    div.style.top = top;
    $("#"+divid).toggle();
    return false;
}

</script>
</body>
</html>
<?php }else{
		header('Location: index.php');
	}?>