<form class="needs-validation" id="reg-form">
	<div class="form-group">
		<label for="city-textfield">City Name</label>
		<input type="text" class="form-control" id="city-textfield" name="city-textfield" placeholder="City" requried>
		<div class="invalid-feedback">
			City is required.
		</div>
		<label for="latitude-textfield">Latitude</label>
		<input type="number" step="0.01" class="form-control" name="latitude-textfield" id="latitude-textfield" placeholder="Latitude" requried>
		<div class="invalid-feedback">
			Latitude is required.
		</div>
		<label for="longitude-textfield">Longitude</label>
		<input type="number" step="0.01" class="form-control"  name="longitude-textfield" id="longitude-textfield" placeholder="Longitude" requried>
		<div class="invalid-feedback">
			Longitude is required.
		</div>
		<label for="population-textfield">Population</label>
		<input type="number" class="form-control"  name="population-textfield" id="population-textfield" placeholder="Population" requried>
		<div class="invalid-feedback">
			Population is required.
		</div>
		<label for="extension-textfield">Extension</label>
		<input type="number" class="form-control"  name="extension-textfield" id="extension-textfield" placeholder="Extension" requried>
		<div class="invalid-feedback">
			Extension is required.
		</div>
		<label for="elevation-textfield">Elevation</label>
		<input type="number" class="form-control"  name="elevation-textfield" id="elevation-textfield" placeholder="Elevation" requried>
		<div class="invalid-feedback">
			Elevation is required.
		</div>
        <input type="text" class="d-none" id="form-id" value="c">
		<button class="btn btn-primary" type="submit" id="form-btn" onclick="postForm()">Submit</button>
	</div>
</form>

