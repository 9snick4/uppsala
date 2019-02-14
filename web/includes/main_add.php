
<div class="container">
	<div class="justify-content-center">
		<div class="row display-4">
			Add new cities and maps
		</div>
		<div class="row dropdown">
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Select the item to insert
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" onclick="showForm('m');">New Map</a>
				<a class="dropdown-item" onclick="showForm('c');">New City</a>
				<a class="dropdown-item" onclick="showForm('g');">New Gamer</a>
				<a class="dropdown-item" onclick="showForm('a');">Add City into Map</a>
			</div>
		</div>
		<div id="form-placeholder">
		</div>
	</div>
</div>

<script src="javascript/jqueryshow.js"></script>


