<?php
if(!empty($_POST["main_unit_key"]) && !empty($_POST["gm"])) {
		require('db.php');
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
		switch($_POST['gm']) {
		case "warhammer":
		$game = "unit_cards_warhammer";
		$table = "warhammer_units";
		break;
		case "attila":
		$game = "unit_cards_attila";
		$table = "attila_units";
		break;
		case "romeii":
		$game = "unit_cards_romeii";
		$table = "romeii_units";
		break;
		case "thrones":
		$game = "unit_cards_thrones";
		$table = "thrones_units";
		break;
	}
		$result = mysqli_query($con,"SELECT * FROM " . $table . " WHERE main_unit_key='" . $_POST["main_unit_key"] . "'");
		while($row = mysqli_fetch_array($result)) {
			echo "<table>";
			echo "<tr><th>" . $row['unit_name'] . "</th></tr>";
			echo "<tr></tr>";
			echo "<tr><td>" . $row['main_unit_key'] . "</td></tr>";
			echo "<tr><td>" . $row['class'] . "</td></tr>";
			echo "<tr><td><img src='img/icon-coin' />  " . $row['recruitment_cost'] . "</td></tr>";
			echo "</table>";
			}
}
?>