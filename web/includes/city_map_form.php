<form id="reg-form" class="needs-validation">
	<div class="form-group">
		<label for="city-textfield">City Name</label>
		<select class="custom-select" size="3" id="city-select" name="city-select">
			<?php
				require("../templates/dbConnect.php");
				$db = get_db();
				foreach ($db->query("SELECT cityid, cityName FROM city ORDER BY cityname") as $row)
				{
					echo '<option value='.$row["cityid"].'>'.$row["cityname"].'</option>';
				}
			?>
		</select>
		<label for="map-textfield">Map Name</label>
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
		<button class="btn btn-primary" type="submit" onclick="postForm()">Submit</button>
	</div>
</form>