<?php
if($_GET['main_unit_key'] && $_GET['gm']) {
		require('db.php');
		if (mysqli_connect_errno())
			{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		switch($_GET['gm']) {
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
		$result = mysqli_query($con,"SELECT * FROM " . $table . " WHERE main_unit_key='" . $_GET["main_unit_key"] . "'");
		while($row = mysqli_fetch_array($result)) {
		echo "<table class='shadow color-b well-a'>";
		echo "<tr>
				<th>
					Unit name:
				</th>
				<th></th>
				<th>
					" . $row['unit_name'] . "
				</th>
			</tr>";
		echo "<tr>
				<td>
					Main unit key:
				</td>
				<td class='td-css-a'></td></td>
				<td>
					" . $row['main_unit_key'] . "
				</td>
			</tr>";
		echo "<tr>
				<td>
					Soldiers:
				</td>
				<td class='td-css-a'></td></td>
				<td>
					" . $row['soldiers'] . "
				</td>
			</tr>";
		echo "<tr>
				<td>
					Category:
				</td>
				<td class='td-css-a'></td></td>
				<td>
					" . $row['category'] . "
				</td>
			</tr>";
		echo "<tr>
				<td>
					Class:
				</td>
				<td class='td-css-a'></td></td>
				<td>
					" . $row['class'] . "
				</td>
			</tr>";
		echo "<tr>
				<td>
					Recruitment cost:
				</td>
				<td class='td-css-a'></td></td>
				<td>
					" . $row['recruitment_cost'] . "
				</td>
			</tr>";
		echo "<tr>
				<td>
					Upkeep cost:
				</td>
				<td class='td-css-a'></td></td>
				<td>
					" . $row['upkeep_cost'] . "
				</td>
			</tr>";
		echo "<tr>
				<td>
					Melee attack:
				</td>
				<td class='td-css-a'></td></td>
				<td>
					" . $row['melee_attack'] . "
				</td>
			</tr>";
		echo "<tr>
				<td>
					Charge bonus:
				</td>
				<td class='td-css-a'></td></td>
				<td>
					" . $row['charge_bonus'] . "
				</td>
			</tr>";
		echo "<tr>
				<td>
					Missile damage:
				</td>
				<td class='td-css-a'></td></td>
				<td>";
				if($row['missile_damage'] == null || $row['missile_damage'] == 0) { echo "-"; }else{ echo $row['missile_damage']; }
				echo "</td>
			</tr>";
		echo "<tr>
				<td>
					Unit range:
				</td>
				<td class='td-css-a'></td></td>
				<td>";
				if($row['unit_range'] == null || $row['unit_range'] == 0) { echo "-"; }else{ echo $row['unit_range']; }
				echo "</td>
			</tr>";
		echo "<tr>
				<td>
					Ammunition:
				</td>
				<td class='td-css-a'></td></td>
				<td>";
				if($row['ammunition'] == null || $row['ammunition'] == 0) { echo "-"; }else{ echo $row['ammunition']; }
				echo "</td>
			</tr>";
		echo "<tr>
				<td>
					Melee defence:
				</td>
				<td class='td-css-a'></td></td>
				<td>
					" . $row['melee_defence'] . "
				</td>
			</tr>";
		echo "<tr>
				<td>
					Armour:
				</td>
				<td class='td-css-a'></td></td>
				<td>
					" . $row['armour'] . "
				</td>
			</tr>";
		echo "<tr>
				<td>
					Health:
				</td>
				<td class='td-css-a'></td></td>
				<td>
					" . $row['health'] . "
				</td>
			</tr>";
		echo "<tr>
				<td>
					Morale:
				</td>
				<td class='td-css-a'></td></td>
				<td>
					" . $row['morale'] . "
				</td>
			</tr>";
		echo "</table>";
			}
}
?>