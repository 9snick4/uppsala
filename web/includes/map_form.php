<form metod="POST" action="templates\InsertDB.php" class="needs-validation">
	<div class="form-group">
		<label for="map-textfield">Map Name</label>
		<input type="text" class="Map-control" id="Map-textfield" placeholder="Map" requried>
		<div class="invalid-feedback">
			Map is required.
		</div>
		<input type="text" class="d-none" id="form-id" value="m">
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