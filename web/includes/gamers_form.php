<form id="reg-form" class="needs-validation">
	<div class="form-group">
		<label for="gamer-textfield">Gamer Name</label>
		<input type="text" class="form-control" name="gamer-textfield" id="gamer-textfield" placeholder="Name" requried>
		<div class="invalid-feedback">
			Gamer is required.
		</div>
		<input type="text" class="d-none" name="form-id" id="form-id" value="g">
		<button class="btn btn-primary" onclick="postForm()" type="button">Submit</button>
	</div>
</form>
