<form metod="POST" action="templates\InsertDB.php" class="needs-validation">
	<div class="form-group">
		<label for="city-textfield">City Name</label>
		<select class="custom-select" size="3" id="city-textfield">
			<?php
				require("templates/dbConnect.php");
				$db = get_db();
				foreach ($db->query("SELECT cityid, cityName FROM city ORDER BY cityname") as $row)
				{
					echo '<option value='.$row["cityid"].'>'.$row["cityname"].'</option>';
				}
			?>
		</select>
		<label for="city-textfield">City Name</label>
		<select class="custom-select" size="3" id="city-textfield">
			<?php
				require("templates/dbConnect.php");
				$db = get_db();
				foreach ($db->query("SELECT mapid, mapName FROM map ORDER BY mapname") as $row)
				{
					echo '<option value='.$row["mapid"].'>'.$row["mapName"].'</option>';
				}
			?>
		</select>
		<input type="text" class="d-none" id="form-id" value="a">
		<button class="btn btn-primary" type="submit">Submit</button>
	</div>
</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>