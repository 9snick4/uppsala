<div class="container">
	<div class="justify-content-center">
		<div class="row display-4">
			New game
		</div>
		<form id="reg-form" class="needs-validation" method="GET" action="play.php">
			<div class="form-group">
				<label for="gamer-select">Who's playing?</label>
				<select class="custom-select" size="3" id="gamer-select" name="gamer-select">
					<?php
						require("../templates/dbConnect.php");
						$db = get_db();
						foreach ($db->query("SELECT gamerid, gamername FROM name ORDER BY gamername") as $row)
						{
							echo '<option value='.$row["cityid"].'>'.$row["cityname"].'</option>';
						}
					?>
				</select>
				<label for="map-select">Which map do you want to play with?</label>
				<select class="custom-select" size="3" id="map-select" name="map-select">
					<?php
						$db = get_db();
						foreach ($db->query("SELECT mapid, mapName FROM map ORDER BY mapname") as $row)
						{
							echo '<option value='.$row["mapid"].'>'.$row["mapname"].'</option>';
						}
					?>
				</select>
				<input type="text" class="d-none" name="form-id" id="form-id" value="a">
				<button class="btn btn-primary" type="submit">Let's play!</button>
			</div>
		</form>
	</div>
</div>