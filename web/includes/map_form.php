<form id="reg-form" class="needs-validation">
	<div class="form-group">
		<label for="map-textfield">Map Name</label>
		<input type="text" class="Map-control" name="map-textfield" id="map-textfield" placeholder="Map" requried>
		<div class="invalid-feedback">
			Map is required.
		</div>
		<input type="text" class="d-none" name="form-id" id="form-id" value="m">
		<button class="btn btn-primary" onclick="postForm()" type="button">Submit</button>
	</div>
</form>

