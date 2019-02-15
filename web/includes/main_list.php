
<div class="container">
	<div class="justify-content-center">
		<div class="row display-4">
			List of cities and maps
		</div>
		<div class="row dropdown">
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Select the list to display
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" onclick="showAjaxList('m');">Maps</a>
				<a class="dropdown-item" onclick="showAjaxList('c');">Cities</a>
				<a class="dropdown-item" onclick="showAjaxList('g');">Games</a>
				<a class="dropdown-item" onclick="showAjaxList('u');">Gamers</a>
			</div>
		</div>
		<div class="row" id="table-placeholder">
		</div>
	</div>
</div>

<script src="javascript/jqueryshow.js"></script>

<!-- map-modal -->
<div class="modal fade" id="map-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Edit map table</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
		<form id="reg-form-map" class="needs-validation">
			<div class="form-group">
				<label for="map-textfield">Map Name</label>
				<input type="text" class="Map-control" name="map-textfield" id="map-textfield" placeholder="Map" requried>
				<div class="invalid-feedback">
					Map is required.
				</div>
				<input type="text" class="d-none" name="form-id" id="form-id" value="m">
				<input type="text" class="d-none" name="row-id" id="row-id" value="">
			</div>
		</form>
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" onclick="postUpdate('#reg-form-map');">Edit</button>
		<button class="btn btn-secondary" onclick="postDelete('#reg-form-map');">DELETE</button>
      </div>
    </div>
  </div>
</div>

<!-- gamer-modal -->
<div class="modal fade" id="gamer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Edit gamer table</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
		<form id="reg-form-gamer" class="needs-validation">
			<div class="form-group">
				<label for="gamer-textfield">Gamer Name</label>
				<input type="text" class="form-control" name="gamer-textfield" id="gamer-textfield" placeholder="Name" requried>
				<div class="invalid-feedback">
					Gamer is required.
				</div>
				<input type="text" class="d-none" name="form-id" id="form-id" value="g">
				<input type="text" class="d-none" name="row-id" id="row-id"  value="">
			</div>
		</form>
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" onclick="postUpdate('#reg-form-gamer');">Edit</button>
		<button class="btn btn-secondary" onclick="postDelete('#reg-form-gamer');">DELETE</button>
      </div>
    </div>
  </div>
</div>

<!-- city-modal -->
<div class="modal fade" id="city-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Edit city table</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
		<form class="needs-validation" id="reg-form-city">
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
				<input type="text" class="d-none" name="form-id" id="form-id" value="c">
				<input type="text" class="d-none" name="row-id" id="row-id" value="">
			</div>
		</form>
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" onclick="postUpdate('#reg-form-city');">Edit</button>
		<button class="btn btn-secondary" onclick="postDelete('#reg-form-city');">DELETE</button>
      </div>
    </div>
  </div>
</div>