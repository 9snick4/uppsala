<form metod="POST" action="templates\InsertDB.php" class="needs-validation" novalidate>
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
		<button class="btn btn-primary" type="submit">Submit</button>
	</div>
</form>