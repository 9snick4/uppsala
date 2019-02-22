<script src="javascript/bonvoyage.js"> </script>
<div class="container" id="board-placeholder"></div>
<?php


	require("phpobjects/city.php");
	$citiesDeck = array();
	//if(!isset($_SESSION["gameid"]))
	//{
	require("templates/dbConnect.php");
	$db = get_db();
	$pdo=$db->prepare("SELECT nextval('game_gameid_seq')");
	$pdo->execute();
	$_SESSION["gameid"] = $pdo->fetch(PDO::FETCH_BOTH)[0];
	$_SESSION["gamerid"] = $_GET["gamer_select"];
	$_SESSION["mapid"] = $_GET["map_select"];
	$db = get_db();
	foreach ($db->query("SELECT city.cityid, cityname,latitude,longitude,citypopulation,Extension,Elevation FROM city ORDER BY random() LIMIT 15") as $row)
	{
		$city = new City($row["cityid"], $row["cityname"], $row["latitude"],$row["longitude"],$row["citypopulation"],$row["Extension"], $row["Elevation"]);
		array_push($citiesDeck, $city);
	}
	//}
?>

<script>
//beginning setup
var stringCitiesDeck = "<?php echo json_encode($citiesDeck); ?>";
var citiesDeck = JSON.parse(stringCitiesDeck);
var table = $('#board-placeholder');
var center = citiesDeck.pop();
var longitudeCities = new Array(); //beginning to end of array = south to north
var latitudeCities =  new Array(); //beginning to end of array = east to west
var citiesInPlay =  new Array();
longitudeCities.push(center);
latitudeCities.push(center);
citiesInPlay.push(longitudeCities);
citiesInPlay.push(latitudeCities);
draw(citiesInPlay,center, table);
Cookies.set("board", citiesInPlay);
Cookies.set("center", center);
</script>

<!-- latitude-modal -->
<div class="modal fade" id="latitude-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">North or south?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
		<form id="reg-form-gamer" class="needs-validation">
			<div class="form-group">
				<button class="btn btn-secondary" onclick="playCard('n');">North</button>
				<button class="btn btn-secondary" onclick="playCard('s');">South</button>
			</div>
		</form>
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- longitude-modal -->
<div class="modal fade" id="longitude-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">North or south?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
		<form id="reg-form-gamer" class="needs-validation">
			<div class="form-group">
				<button class="btn btn-secondary" onclick="playCard('e');">East</button>
				<button class="btn btn-secondary" onclick="playCard('w');">West</button>
			</div>
		</form>
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- center-modal -->
<div class="modal fade" id="center-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">North, south, East or West?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
		<form id="reg-form-gamer" class="needs-validation">
			<div class="form-group">
        <button class="btn btn-secondary" onclick="playCard('n');">North</button>
				<button class="btn btn-secondary" onclick="playCard('s');">South</button>
				<button class="btn btn-secondary" onclick="playCard('e');">East</button>
				<button class="btn btn-secondary" onclick="playCard('w');">West</button>
			</div>
		</form>
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>