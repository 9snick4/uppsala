
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