<div class="container">
	<div class="row align-items-center">
		<h2>Select the list to display</h2>
		<select class="select" autofocus onchange="window.location.replace('templates/querylist.php?table=' + this.value);">
			<option value="m">Maps</option>
			<option value="c">Cities</option>
			<option value="g">Games</option>
			<option value="u">Gamers</option>
		</select> 

	</div>
</div>