<form metod="POST" action="templates\InsertDB.php" class="needs-validation" novalidate>
	<div class="form-group">
		<label for="gamer-textfield">Gamer Name</label>
		<input type="text" class="form-control" id="gamer-textfield" placeholder="City" requried>
		<div class="invalid-feedback">
			Gamer is required.
		</div>
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