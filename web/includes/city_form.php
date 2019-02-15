<form class="needs-validation" id="reg-form">
	<div class="form-group">
		<label for="city-textfield">City Name</label>
		<input type="text" class="form-control" id="city-textfield" placeholder="City" requried>
		<div class="invalid-feedback">
			City is required.
		</div>
		<label for="latitude-textfield">Latitude</label>
		<input type="number" class="form-control" id="latitude-textfield" placeholder="Latitude" requried>
		<div class="invalid-feedback">
			Latitude is required.
		</div>
		<label for="longitude-textfield">Longitude</label>
		<input type="number" class="form-control" id="longitude-textfield" placeholder="Longitude" requried>
		<div class="invalid-feedback">
			Longitude is required.
		</div>
		<label for="population-textfield">Population</label>
		<input type="number" class="form-control" id="population-textfield" placeholder="Population" requried>
		<div class="invalid-feedback">
			Population is required.
		</div>
		<label for="extension-textfield">Extension</label>
		<input type="number" class="form-control" id="extension-textfield" placeholder="Extension" requried>
		<div class="invalid-feedback">
			Extension is required.
		</div>
		<label for="elevation-textfield">Elevation</label>
		<input type="number" class="form-control" id="elevation-textfield" placeholder="Elevation" requried>
		<div class="invalid-feedback">
			Elevation is required.
		</div>
        <input type="text" class="d-none" id="form-id" value="c">
		<button class="btn btn-primary" type="submit" id="form-btn">Submit</button>
	</div>
</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
$(function() {
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
});
</script>